<template>
  <div class="overflow-x-auto">
    <VTable
      v-model:current-page="currentPage"
      class="w-full text-left text-gray-500 dark:text-gray-400"
      :data="orders"
      :page-size="10"
      :hide-sort-icons="true"
      @totalPagesChanged="totalPages = $event"
    >
      <template #head>
        <tr
          class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
        >
          <VTh sort-key="created_at" scope="col" class="p-1">
            <Col text="Date" />
          </VTh>
          <VTh sort-key="symbol" scope="col" class="p-1">
            <Col text="Symbol" />
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
          <VTh sort-key="status" scope="col" class="p-1">
            <Col text="Status" />
          </VTh>
        </tr>
      </template>
      <template #body="{ rows }">
        <tr
          v-for="row in rows"
          :key="row.id"
          class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
        >
          <td class="p-1" data-label="Date">
            <to-date :time="row.created_at" :full="true" />
          </td>
          <td data-label="Symbol" class="text-uppercase">
            {{ row.symbol }}
          </td>
          <td data-label="Side" class="text-uppercase">
            <span v-if="row.side == 'buy'" class="badge bg-success">{{
              $t("Long")
            }}</span>
            <span v-else class="badge bg-danger">{{ $t("Short") }}</span>
          </td>
          <td data-label="Price">
            <to-money :num="row.price" :decimals="PrecisionPrice" />
            {{ row.pair }}
          </td>
          <td data-label="Amount">
            <to-money :num="row.amount" :decimals="PrecisionAmount" />
            {{ currency }}
          </td>
          <td data-label="Filled">
            <to-money :num="row.filled" :decimals="PrecisionAmount" />
            {{ currency }}
          </td>
          <td data-label="Status">
            <span v-if="row.status == 'closed'" class="badge bg-success">{{
              $t("Filled")
            }}</span>
            <span v-else-if="row.status == 'open'" class="badge bg-primary">{{
              $t("Live")
            }}</span>
            <span v-else class="badge bg-danger">{{ $t("Canceled") }}</span>
          </td>
        </tr>
      </template>
    </VTable>
  </div>
  <VTPagination
    v-model:currentPage="currentPage"
    class="flex items-center justify-between p-3"
    aria-label="Table navigation"
    :total-pages="totalPages"
    :max-page-links="3"
    :boundary-links="true"
  >
    <template #firstPage> {{ $t("First") }} </template>

    <template #lastPage> {{ $t("Last") }} </template>

    <template #next>
      <span class="sr-only">{{ $t("Next") }}</span>
      <svg
        class="h-5 w-5"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </template>

    <template #previous>
      <span class="sr-only">{{ $t("Previous") }}</span>
      <svg
        class="h-5 w-5"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </template>
  </VTPagination>
</template>

<script>
  import { ref } from "vue";
  import Col from "@/partials/table/Col.vue";
  import toMoney from "@/partials/toMoney.vue";
  import toDate from "@/partials/toDate.vue";

  export default {
    components: {
      Col,
      toMoney,
      toDate,
    },
    props: {
      orders: {
        type: Array,
        default: () => [],
      },
      PrecisionPrice: {
        type: Number,
        default: 2,
      },
      PrecisionAmount: {
        type: Number,
        default: 2,
      },
      currency: {
        type: String,
        default: "",
      },
    },
    setup(props) {
      const currentPage = ref(1);
      const totalPages = ref(1);

      return {
        currentPage,
        totalPages,
      };
    },
  };
</script>
