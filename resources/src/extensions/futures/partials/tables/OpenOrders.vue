<template>
  <div class="overflow-x-auto">
    <VTable
      v-model:current-page="currentPage"
      class="w-full text-left text-gray-500 dark:text-gray-400"
      :data="items"
      :page-size="10"
      :hide-sort-icons="true"
      @totalPagesChanged="totalPages = $event"
    >
      <template #head>
        <tr
          class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
        >
          <VTh sort-key="time" scope="col" class="p-1">
            <Col text="Time" />
          </VTh>
          <VTh sort-key="type" scope="col" class="p-1">
            <Col text="Type" />
          </VTh>
          <VTh sort-key="side" scope="col" class="p-1">
            <Col text="Side" />
          </VTh>
          <VTh sort-key="price" scope="col" class="p-1">
            <Col text="Price" />
          </VTh>
          <VTh sort-key="amount" scope="col" class="p-1">
            <Col text="Amount" />
          </VTh>
          <VTh sort-key="filled" scope="col" class="p-1">
            <Col text="Filled" />
          </VTh>
          <VTh sort-key="value" scope="col" class="p-1">
            <Col text="Value" />
          </VTh>
          <th scope="col" class="p-1">
            {{ $t("Take Profit & Stop Loss") }}
          </th>
          <VTh sort-key="cancel" scope="col" class="p-1">
            <Col text="Cancel" />
          </VTh>
        </tr>
      </template>
      <template #body="{ rows }">
        <tr
          v-for="row in rows"
          :key="row.id"
          class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
        >
          <td data-label="Time" class="p-2">
            <to-date :time="row.created_at" :full="true" />
          </td>
          <td data-label="Type" class="text-uppercase">
            <span v-if="row.type == 'limit'" class="badge bg-success">{{
              $t("Limit")
            }}</span>
            <span v-else class="badge bg-danger">{{ $t("Market") }}</span>
          </td>
          <td data-label="Side" class="text-uppercase">
            <span v-if="row.side == 'buy'" class="badge bg-success">{{
              $t("Long")
            }}</span>
            <span v-else class="badge bg-danger">{{ $t("Short") }}</span>
          </td>
          <td data-label="Price">
            {{ row.price }}
          </td>
          <td data-label="Amount" class="text-success">{{ row.amount }} Lot</td>
          <td data-label="Filled">
            {{ row.filled }}
          </td>
          <td data-label="Value">
            {{ row.price * row.amount }}
          </td>
          <td data-label="Take Profit & Stop Loss">
            <div class="text-success">{{ row.takeProfit || "-" }}</div>
            <div class="text-danger">{{ row.stopLoss || "-" }}</div>
          </td>
          <td data-label="Cancel">
            <Button
              v-if="row.status == 'open'"
              size="xs"
              color="light"
              @click="cancelOrder(row.order_id)"
              :disabled="loading"
              :loading="loading"
            >
              <i class="bi bi-x-lg" style="margin-right: 0 !important;"></i>
            </Button>
          </td>
        </tr>
      </template>
    </VTable>
  </div>
</template>

<script>
  import { ref, onMounted, onUnmounted } from "vue";
  import { Button } from "flowbite-vue";
  import Col from "@/partials/table/Col.vue";
  import toMoney from "@/partials/toMoney.vue";
  import toDate from "@/partials/toDate.vue";

  export default {
    name: "OpenOrdersTable",
    components: {
      Col,
      Button,
      toMoney,
      toDate,
    },
    props: {
      items: {
        type: Array,
        required: true,
      },
      marketStore: {
        type: Object,
        required: true,
      },
      currency: {
        type: String,
        required: true,
      },
      symbol: {
        type: String,
        required: true,
      },
    },
    emits: ["refreshed"],
    setup(props, { emit }) {
      const currentPage = ref(1);
      const totalPages = ref(0);
      const intervalRef = ref(null);
      const loading = ref(false);

      const refreshOrders = async () => {
        await axios
          .post("/user/futures/order/refresh", {
            id: props.marketStore.future.id,
            currency: props.currency,
            symbol: props.symbol,
          })
          .then((response) => {
            if (response.success === true) {
              emit("refreshed");
            }
          })
          .catch((error) => {
            $toast.error(error.response.data.message);
          });
      };

      const cancelOrder = async (order_id) => {
        loading.value = true;
        await axios
          .post("/user/futures/order/cancel", {
            id: props.marketStore.future.id,
            order_id: order_id,
            currency: props.currency,
          })
          .then((response) => {
            $toast.success(response.message);
            emit("refreshed");
          })
          .catch((error) => {
            $toast.error(error.response.data.message);
          })
          .finally(() => {
            loading.value = false;
          });
      };

      const startFetchingOrders = () => {
        intervalRef.value = setInterval(refreshOrders, 5000);
      };

      const stopFetchingOrders = () => {
        clearInterval(intervalRef.value);
      };

      onMounted(() => {
        startFetchingOrders();
      });

      onUnmounted(() => {
        stopFetchingOrders();
      });

      return {
        currentPage,
        totalPages,
        cancelOrder,
        loading,
      };
    },
  };
</script>
