<template>
  <div
    class="border border-gray-100 bg-white shadow dark:border-gray-700 dark:bg-gray-900"
    style="margin: 0 -20px;"
  >
    <ul
      id="myTab"
      class="nf flex-cols -mb-px flex overflow-x-hidden bg-gray-200 dark:bg-gray-800"
      role="tablist"
    >
      <li>
        <a
          id="position-tab"
          class="inline-block py-2 pl-3 pr-4 text-xs font-medium"
          :class="
            !isActive('position')
              ? 'cursor-pointer border-transparent bg-gray-200 text-gray-400 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300'
              : 'border-gray-300 bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300'
          "
          type="button"
          role="tab"
          aria-controls="position"
          aria-selected="false"
          @click.prevent="setActive('position')"
        >
          {{ $t("Open Position") }}</a
        >
      </li>
      <li>
        <a
          id="open-orders-tab"
          class="inline-block py-2 pl-3 pr-4 text-xs font-medium"
          :class="
            !isActive('open-orders')
              ? 'cursor-pointer border-transparent bg-gray-200 text-gray-400 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300'
              : 'border-gray-300 bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300'
          "
          type="button"
          role="tab"
          aria-controls="open-orders"
          aria-selected="false"
          @click.prevent="setActive('open-orders')"
        >
          {{ $t("Open Orders") }}</a
        >
      </li>
      <li>
        <a
          id="orders-tab"
          class="inline-block py-2 pl-3 pr-4 text-xs font-medium"
          :class="
            !isActive('orders')
              ? 'cursor-pointer border-transparent bg-gray-200 text-gray-400 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300'
              : 'border-gray-300 bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300'
          "
          type="button"
          role="tab"
          aria-controls="orders"
          aria-selected="false"
          @click.prevent="setActive('orders')"
        >
          {{ $t("Order History") }}</a
        >
      </li>
    </ul>
    <div
      id="position"
      class="pt-3"
      :class="isActive('position') ? '' : 'hidden'"
      role="tabpanel"
      style="min-height: 300px;"
    >
      <div class="overflow-x-auto px-4 pb-2">
        <PositionDetails
          v-if="position !== null"
          :position="position"
          :marketStore="marketStore"
          @liquidation="handleLiquidate"
        />
        <template v-else>
          <div
            class="text-center flex justify-center items-center flex-col w-full"
          >
            <img height="128" width="128" src="/assets/empty.svg" alt="" />
            <div class="mt-4 text-gray-600 dark:text-gray-400">
              {{ $t("No Open Position Found") }}
            </div>
          </div>
        </template>
      </div>
    </div>

    <div
      id="open-orders"
      class="pt-3"
      :class="isActive('open-orders') ? '' : 'hidden'"
      role="tabpanel"
      style="min-height: 300px;"
    >
      <OpenOrders
        v-if="openOrders.length > 0"
        :items="openOrders"
        :currency="$route.params.currency"
        :symbol="$route.params.symbol"
        :marketStore="marketStore"
        @refreshed="fetchOrders"
      />
      <template v-else>
        <div
          class="text-center flex justify-center items-center flex-col w-full"
        >
          <img height="128" width="128" src="/assets/empty.svg" alt="" />
          <div class="mt-4 text-gray-600 dark:text-gray-400">
            {{ $t("No Open Orders Found") }}
          </div>
        </div>
      </template>
    </div>

    <div
      id="orders"
      class="pt-3"
      :class="isActive('orders') ? '' : 'hidden'"
      role="tabpanel"
      style="min-height: 300px;"
    >
      <OrdersHistory
        v-if="orders.length > 0"
        :orders="orders"
        :PrecisionPrice="PrecisionPrice"
        :PrecisionAmount="PrecisionAmount"
        :currency="currency"
      />
      <template v-else>
        <div
          class="text-center flex justify-center items-center flex-col w-full"
        >
          <img height="128" width="128" src="/assets/empty.svg" alt="" />
          <div class="mt-4 text-gray-600 dark:text-gray-400">
            {{ $t("No Orders Found") }}
          </div>
        </div>
      </template>
    </div>
  </div>

  <CancelPosition
    v-if="position !== null && marketStore.closePositionType !== null"
    :lots="position.contracts"
    :pair="pair"
    :currency="currency"
    :type="marketStore.closePositionType"
    :side="position.side"
    @position-closed="fetchOrders"
  />

  <TakeProfitStopLoss
    v-if="position !== null"
    :position="position"
    :currency="currency"
    :pair="pair"
    @added="fetchOrders"
  />
</template>

<script>
  import { useMarketStore } from "@/store/market";
  import { useRoute } from "vue-router";
  import { computed, onMounted, onBeforeUnmount, ref } from "vue";
  import CancelPosition from "./modals/CancelPosition.vue";
  import TakeProfitStopLoss from "./modals/TakeProfitStopLoss.vue";
  import OpenOrders from "./tables/OpenOrders.vue";
  import PositionDetails from "./PositionDetails.vue";
  import OrdersHistory from "./tables/OrdersHistory.vue";

  export default {
    components: {
      CancelPosition,
      TakeProfitStopLoss,
      OpenOrders,
      PositionDetails,
      OrdersHistory,
    },
    setup() {
      const marketStore = useMarketStore();
      const route = useRoute();
      const currency = route.params.symbol;
      const pair = route.params.currency;
      const activeItem = ref("position");
      const currentPage = ref(1);
      const totalPages = ref(0);
      const currentPageposition = ref(1);
      const totalPagesposition = ref(0);
      const loading = ref(false);
      const refreshing = ref(false);

      const orders = ref([]);
      const position = ref([]);
      const openOrders = ref([]);

      const fetchOrders = async () => {
        await axios
          .get("/user/futures/order/" + currency + "/" + pair)
          .then((response) => {
            position.value = response.position;
            openOrders.value = response.openOrders;
            orders.value = response.orders;
          });
      };

      const fetchPosition = async () => {
        await axios
          .get("/user/futures/position/" + currency + "/" + pair)
          .then((response) => {
            position.value = response.position;
          });
      };

      const PrecisionAmount = computed(() => {
        if (!marketStore.future) {
          return 6;
        }

        return countDecimals(marketStore.future.precision.amount || 0.000001);
      });

      const PrecisionPrice = computed(() => {
        if (!marketStore.future) {
          return 6;
        }

        return countDecimals(marketStore.future.precision.price || 0.000001);
      });

      const countDecimals = (num) => {
        if (Math.floor(num) === num) return 0;
        const str = num.toString();
        const scientificNotationMatch = /^(\d+\.?\d*|\.\d+)e([\+\-]\d+)$/.exec(
          str
        );
        if (scientificNotationMatch) {
          const decimalStr = scientificNotationMatch[1].split(".")[1] || "";
          const decimalCount =
            decimalStr.length + parseInt(scientificNotationMatch[2]);
          return Math.min(Math.max(decimalCount, 0), 20);
        } else {
          const decimalStr = str.split(".")[1] || "";
          return Math.min(Math.max(decimalStr.length, 0), 20);
        }
      };

      const cancelOrder = async (id) => {
        loading.value = true;
        try {
          await axios.post("/user/futures/order/cancel", {
            order_id: id,
          });
          fetchOrders();
          marketStore.fetchWallet(pair, 2, "futures");
        } catch (error) {
          console.error(error);
          // Handle error
        } finally {
          loading.value = false;
        }
      };

      const isActive = (menuItem) => {
        return activeItem.value === menuItem;
      };

      const setActive = (menuItem) => {
        activeItem.value = menuItem;
      };

      const liquidationIntervalId = ref(null);
      const isLiquidationIntervalRunning = ref(false);

      const handleLiquidate = async (status) => {
        if (status) {
          startLiquidationInterval();
        } else {
          stopLiquidationInterval();
        }
      };

      const startLiquidationInterval = () => {
        if (!isLiquidationIntervalRunning.value) {
          liquidationIntervalId.value = setInterval(fetchPosition, 2000);
          isLiquidationIntervalRunning.value = true;
        }
      };

      const stopLiquidationInterval = () => {
        clearInterval(liquidationIntervalId.value);
        isLiquidationIntervalRunning.value = false;
      };

      onMounted(() => {
        fetchOrders();
        fetchPosition();
      });

      onBeforeUnmount(() => {
        stopLiquidationInterval();
      });

      return {
        marketStore,
        PrecisionAmount,
        PrecisionPrice,
        currency,
        pair,
        activeItem,
        orders,
        position,
        currentPage,
        totalPages,
        currentPageposition,
        totalPagesposition,
        loading,
        refreshing,
        fetchOrders,
        cancelOrder,
        fetchOrders,
        isActive,
        setActive,
        openOrders,
        handleLiquidate,
      };
    },
  };
</script>
