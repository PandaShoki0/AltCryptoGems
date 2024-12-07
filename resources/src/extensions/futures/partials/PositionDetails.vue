<template>
  <div v-if="position !== null">
    <div class="text-lg font-semibold mb-2">{{ position.symbol }}</div>
    <div class="flex flex-wrap gap-3">
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The initial margin required for this position'"
        >
          {{ $t("Initial Margin") }}
        </div>
        <div class="text-lg">{{ position.initialMargin }}</div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The maintenance margin required for this position'"
        >
          {{ $t("Maintenance Margin") }}
        </div>
        <div class="text-lg">{{ position.maintenanceMargin }}</div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The average entry price of the current position.'"
        >
          {{ $t("Entry Price") }}
        </div>
        <div class="text-lg">{{ position.entryPrice }}</div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="
            'The latest mark price of this contract, used for Unrealized PNL calculation. If the mark price reaches the liquidation price, the position will be liquidated.'
          "
        >
          {{ $t("Mark Price") }}
        </div>

        <div
          class="text-lg"
          :class="
            marketStore.bestAsk > position.entryPrice
              ? 'text-success'
              : 'text-danger'
          "
          v-if="marketStore.bestAsk !== null"
        >
          {{ marketStore.bestAsk }}
        </div>
        <div v-else>-</div>
      </div>
      <!-- Add the remaining position details components here -->
    </div>
    <div class="flex flex-wrap gap-3 mt-3">
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="
            'If the mark price of the contract falls below this price (when long) or rises above this price (when short), your position will be liquidated.'
          "
        >
          {{ $t("Liquidation Price") }}
        </div>
        <div :class="liquidationPriceClass">
          {{ position.liquidationPrice }}
        </div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The leverage used for this position'"
        >
          {{ $t("Leverage") }}
        </div>
        <div class="text-lg">x{{ position.leverage }}</div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="
            'The unrealized profit and loss and the return on equity calculated based on the mark price of the position.'
          "
        >
          {{ $t("Unrealized PNL (ROE)") }}
        </div>
        <div
          :class="[
            unrealizedPnl && unrealizedPnl.pnl > 0
              ? 'text-success'
              : 'text-danger',
            'flex items-center',
          ]"
          v-if="marketStore.bestAsk !== null"
        >
          <span class="text-lg">{{
            unrealizedPnl
              ? unrealizedPnl.pnl + " " + $route.params.currency
              : "-"
          }}</span>
          <span
            class="text-xs ml-1"
            v-tooltip="
              unrealizedPnl
                ? 'Percentage: ' + unrealizedPnl.percentage + '%'
                : '-'
            "
            >({{ unrealizedPnl ? unrealizedPnl.percentage + "%" : "-" }})</span
          >
        </div>
        <div v-else>-</div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="
            'Your current position on the platform. If positive, you are long. If negative, you are short.'
          "
        >
          {{ $t("Amount") }}
        </div>
        <div class="text-lg text-success">{{ position.contracts }} lot</div>
      </div>
    </div>
    <div class="flex flex-wrap gap-3 mt-3">
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The date and time when the position was opened'"
        >
          {{ $t("Date") }}
        </div>
        <div class="text-lg">
          <to-date
            v-if="position.created_at !== undefined"
            :time="position.created_at"
            :full="true"
          />
        </div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The number of contracts in the position'"
        >
          {{ $t("Contracts") }}
        </div>
        <div class="text-lg">{{ position.contracts }}</div>
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The take profit and stop loss levels for the position'"
        >
          {{ $t("Take Profit / Stop Loss") }}
        </div>
        <div class="text-lg">
          {{ position.takeProfit || "-" }} /
          {{ position.stopLoss || "-" }}
        </div>
        <!-- <template v-else
          >
          <Button
            @click="marketStore.showModal('takeProfitStopLoss')"
            size="xs"
            color="light"
            >+ Add</Button
          >
        </template> -->
      </div>
      <div class="flex-1 shadow p-2 bg-white dark:bg-gray-800 rounded">
        <div
          class="text-sm text-gray-600 dark:text-gray-400"
          v-tooltip="'The take profit and stop loss levels for the position'"
        >
          {{ $t("Close Position") }}
        </div>
        <div class="space-x-2" v-if="marketStore.bestAsk !== null">
          <Button
            size="xs"
            color="light"
            :loading="loading"
            :disabled="loading"
            @click="closePosition('market')"
          >
            <i
              v-if="!loading"
              class="bi bi-x"
              style="margin-right: 0 !important;"
            ></i>
            {{ $t("Market") }}
          </Button>
          <Button
            size="xs"
            color="light"
            :loading="loading"
            :disabled="loading"
            @click="closePosition('limit')"
          >
            <i
              v-if="!loading"
              class="bi bi-x"
              style="margin-right: 0 !important;"
            ></i>
            {{ $t("Limit") }}
          </Button>
        </div>
        <div v-else>-</div>
      </div>
    </div>
  </div>
</template>

<script>
  import { ref, computed } from "vue";
  import { Button } from "flowbite-vue";
  import toMoney from "@/partials/toMoney.vue";
  import toDate from "@/partials/toDate.vue";

  export default {
    components: {
      Button,
      toMoney,
      toDate,
    },
    props: {
      position: {
        type: Object,
        default: null,
      },
      marketStore: {
        type: Object,
        required: true,
      },
    },
    emits: ["liquidation"],
    setup(props, { emit }) {
      const loading = ref(false);

      const closePosition = (type) => {
        props.marketStore.closePositionType = type;
        props.marketStore.showModal("closePositionMarket");
      };

      const unrealizedPnl = computed(() => {
        if (props.position && props.marketStore.bestAsk !== undefined) {
          const entryPrice = parseFloat(props.position.entryPrice);
          const bestAsk = parseFloat(props.marketStore.bestAsk);
          const leverage = parseFloat(props.position.leverage);
          const contracts = parseFloat(props.position.contracts);

          // Calculate the unrealized PNL based on the difference between entry price and market price
          const pnl = (bestAsk - entryPrice) * contracts * leverage;

          // Calculate the percentage of loss in currency
          const percentage = (pnl / (entryPrice * contracts)) * 100;
          if (percentage < -90) {
            emit("liquidation", true);
          } else {
            emit("liquidation", false);
          }

          // Return the calculated unrealized PNL and percentage as an object
          return {
            pnl: pnl.toFixed(8),
            percentage: percentage.toFixed(2),
          };
        }

        return null;
      });

      const liquidationPriceClass = computed(() => {
        if (props.position && props.marketStore.bestAsk !== undefined) {
          const markPrice = parseFloat(props.marketStore.bestAsk);
          const liquidationPrice = parseFloat(props.position.liquidationPrice);
          const leverage = parseFloat(props.position.leverage);

          // Calculate the difference between the mark price and liquidation price
          const priceDifference = Math.abs(markPrice - liquidationPrice);

          // Calculate the danger threshold based on the leverage and price difference
          const dangerThreshold = leverage * priceDifference;

          // Define the class mappings for different danger levels
          const dangerClasses = {
            "text-danger": dangerThreshold <= 0.1, // Customize the danger level and class
            "text-warning": dangerThreshold > 0.1 && dangerThreshold <= 0.5, // Customize the warning level and class
            "text-normal": dangerThreshold > 0.5, // Customize the normal level and class
          };

          // Find the appropriate class based on the danger threshold
          const selectedClass = Object.keys(dangerClasses).find(
            (cls) => dangerClasses[cls]
          );

          // Return the selected class (defaulting to an empty string if no class is found)
          return selectedClass || "";
        }

        return "";
      });

      return {
        loading,
        closePosition,
        unrealizedPnl,
        liquidationPriceClass,
      };
    },
  };
</script>
