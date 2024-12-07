<template>
  <form class="space-y-5 text-center" @submit.prevent="submitForm">
    <template v-if="formType == 'limit'">
      <PriceInput
        v-model="price"
        :order-type="orderType"
        :pair-name="pair"
        @get-best-price="getBestPrice"
      />
    </template>

    <AmountInput
      v-model="amount"
      :order-type="orderType"
      :form-type="formType"
      :min-amount="minAmount"
      :max-amount="maxAmount"
      :precision-amount="precisionAmount"
      :currency-name="currency"
      type="lot"
      :lot-size="lotSize"
      @calculate-total="calculateTotal"
      @calculate-percentage="calculatePercentage"
    />

    <TotalInput
      v-model="total"
      :taker-fee="fee"
      :maker-fee="fee"
      :order-type="orderType"
      :disabled="true"
      :pair-name="pair"
    />

    <Leverage
      v-if="
        platform.futures &&
        platform.futures.leverage_range === 'slider_leverage'
      "
      :minLeverage="minLeverage"
      :maxLeverage="maxLeverage"
      v-model="leverage"
      @calculateTotal="calculateTotal"
    />

    <Button
      :id="buttonId"
      :color="buttonColor"
      outline
      size="sm"
      class="w-full"
      :class="formType + 'Type'"
      :loading="marketStore.loading"
      :disabled="marketStore.loading || !orderAvailability"
    >
      {{ buttonText }}
    </Button>
  </form>
</template>

<script>
  import { ref, computed, watch } from "vue";
  import { Button } from "flowbite-vue";
  import { useI18n } from "vue-i18n";
  import AmountInput from "@/partials/order/AmountInput.vue";
  import TotalInput from "@/partials/order/TotalInput.vue";
  import PriceInput from "@/partials/order/PriceInput.vue";
  import { useMarketStore } from "@/store/market";
  import Leverage from "./Leverage.vue";

  export default {
    components: {
      Button,
      AmountInput,
      TotalInput,
      PriceInput,
      Leverage,
    },
    props: {
      orderType: String,
      formType: String,
      currency: String,
      pair: String,
      fee: [Number, String],
    },
    emits: ["OrderPlaced", "leverage"],
    setup(props, { emit }) {
      const { t } = useI18n();
      const marketStore = useMarketStore();

      const minAmount = ref(0.0001);
      const lotSize = ref(1);
      const minLeverage = ref(1);
      const maxLeverage = ref(1);
      const marketLoaded = ref(false);
      const provider = window.provider;
      const platform = window.plat;

      watch(
        () => marketStore.future,
        (newValue) => {
          if (newValue && newValue.limits.amount.min) {
            minAmount.value = Number.parseFloat(newValue.limits.amount.min);
          }
          if (newValue && newValue.contractSize) {
            lotSize.value = Number.parseFloat(newValue.contractSize);
          }
          if (newValue && newValue.limits.leverage.min) {
            minLeverage.value = Number.parseFloat(newValue.limits.leverage.min);
            maxLeverage.value = Number.parseFloat(newValue.limits.leverage.max);
            emit("leverage", maxLeverage.value);
          }
          marketLoaded.value = true;
        },
        { immediate: true }
      );

      const maxAmount = computed(
        () =>
          Number.parseFloat(marketStore?.future?.limits?.amount?.max) || 10000
      );
      const leverage = ref(1);

      const precisionAmount = computed(() => {
        if (marketStore.future && marketStore?.future?.precision?.amount) {
          const precision = Number.parseFloat(
            marketStore?.future?.precision?.amount
          );
          if (Number.isInteger(precision)) {
            return precision;
          } else {
            // Check if the precision is in scientific notation
            const sciNotationMatch = precision
              .toString()
              .match(/(\d+(\.\d+)?)[eE][+-]\d+/);
            if (sciNotationMatch) {
              const decimalPart = (
                parseFloat(sciNotationMatch[1]).toString().split(".")[1] || ""
              ).length;
              const exponent = parseInt(sciNotationMatch[0].split(/e|E/)[1]);
              return decimalPart + Math.abs(exponent);
            } else {
              return precision.toString().split(".")[1].length;
            }
          }
        }
        return 6;
      });

      const amount = ref(minAmount.value ?? 0);
      const total = ref(0);
      const price = ref(0);

      const buttonId = computed(
        () =>
          props.formType +
          (props.orderType === "buy" ? "OrderBtnBuy" : "OrderBtnSell")
      );
      const buttonColor = computed(() =>
        props.orderType === "buy" ? "green" : "red"
      );
      const orderAvailability = computed(() =>
        props.formType == "market"
          ? props.orderType === "buy"
            ? marketStore.bestAsk > 0
            : marketStore.bestBid > 0
          : true
      );
      const buttonText = computed(() =>
        orderAvailability.value
          ? props.orderType === "buy"
            ? t("Buy/Long")
            : t("Sell/Short")
          : "Loading Orderbook..."
      );

      const leverageAmount = computed(() => {
        if (
          platform.futures &&
          platform.futures.leverage_range === "fixed_leverage"
        ) {
          return platform.futures.fixed_leverage_amount;
        } else if (
          platform.futures &&
          platform.futures.leverage_range === "one_leverage"
        ) {
          return maxLeverage.value;
        } else {
          return leverage.value;
        }
      });

      const submitForm = async () => {
        try {
          await marketStore.executeTrade(
            props.orderType,
            props.formType,
            props.formType === "market" ? bestPrice.value : price.value,
            amount.value,
            props.currency,
            props.pair,
            leverageAmount.value,
            marketStore.future.id,
            lotSize.value
          );
          emit("OrderPlaced");
        } catch (error) {
          $toast.error("Error executing trade:", error);
        }
      };

      const calculateTotalAmount = (amount, percent) => {
        const priceTotal =
          props.formType === "market" ? bestPrice.value : price.value;

        const feeMultiplier = props.fee / 100;
        const totalAmount = (amount * (percent / 100)) / priceTotal;
        const fee = totalAmount * feeMultiplier;
        return parseFloat(totalAmount - fee).toFixed(precisionAmount.value);
      };

      watch(amount, () => {
        calculateTotal();
      });

      watch(price, () => {
        calculateTotal();
      });

      const calculatePercentage = (percent) => {
        if (!props.currency && !props.pair) {
          $toast.error(
            `Create ${
              props.orderType === "buy" ? props.pair : props.currency
            } Wallet First`
          );
          return;
        }
        if (!marketStore.bestBid && !marketStore.bestAsk) {
          $toast.error("Waiting For Orderbook...");
          return;
        }

        const walletBalanceCurrency = parseFloat(marketStore.currencyBalance);
        const walletBalancePair = parseFloat(marketStore.pairBalance);

        if (price.value === 0) {
          price.value = bestPrice.value;
        }
        if (props.orderType === "buy") {
          total.value = parseFloat((walletBalancePair * percent) / 100).toFixed(
            precisionAmount.value
          );
          const totalWithoutFee = total.value / (1 + props.fee / 100);
          amount.value = parseFloat(
            totalWithoutFee /
              (props.formType === "market" ? bestPrice.value : price.value)
          ).toFixed(precisionAmount.value);
        } else {
          amount.value = parseFloat(
            (walletBalanceCurrency * percent) / 100
          ).toFixed(precisionAmount.value);
          const totalWithoutFee =
            amount.value *
            lotSize.value *
            (props.formType === "market" ? bestPrice.value : price.value);
          total.value = parseFloat(
            totalWithoutFee * (1 - props.fee / 100)
          ).toFixed(precisionAmount.value);
        }

        calculateTotal();
      };

      const calculateTotal = () => {
        let balance, symbol;
        if (props.orderType === "buy") {
          symbol = props.pair;
        } else {
          symbol = props.currency;
        }
        balance = marketStore.pairBalance;

        if (balance === null) {
          return;
        }

        if (props.formType === "market" && marketStore.bestBid === null) {
          $toast.error("No spot price detected, Make a limit order first");
          return;
        }

        const currentPrice =
          props.formType === "market" || price.value === 0
            ? bestPrice.value
            : price.value;

        const orderAmount = amount.value * lotSize.value * currentPrice;

        const totalWithFees = calculateTotalWithFees(orderAmount);

        if (balance < totalWithFees) {
          $toast.error(
            `Order amount higher than your ${symbol} wallet balance with fees`
          );
          return;
        }

        total.value = totalWithFees.toFixed(8);
      };

      const calculateTotalWithFees = (orderAmount) => {
        const feeAmount = (orderAmount * props.fee) / 100;
        return orderAmount + feeAmount;
      };

      const bestPrice = computed(
        () => marketStore[props.orderType === "buy" ? "bestAsk" : "bestBid"]
      );

      const getBestPrice = () => {
        const priceToSet =
          props.orderType === "buy"
            ? marketStore.bestAsk || marketStore.bestBid
            : marketStore.bestBid || marketStore.bestAsk;
        price.value = priceToSet;
        calculateTotal();
      };

      return {
        marketStore,
        submitForm,
        buttonId,
        buttonColor,
        orderAvailability,
        buttonText,
        calculatePercentage,
        calculateTotalAmount,
        calculateTotal,
        minAmount,
        maxAmount,
        precisionAmount,
        amount,
        total,
        price,
        getBestPrice,
        leverage,
        minLeverage,
        maxLeverage,
        lotSize,
        provider,
        platform,
      };
    },
  };
</script>
