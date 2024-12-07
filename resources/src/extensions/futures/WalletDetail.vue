<template>
  <div class="flex justify-between mb-5 items-center">
    <h3>{{ walletsStore.wallet.symbol }} Wallet</h3>

    <router-link to="/wallets" class="btn btn-outline-secondary">
      <i class="bi bi-chevron-left"></i> {{ $t("Back") }}</router-link
    >
  </div>
  <div class="card mb-5">
    <div class="card-body">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
        <div class="flex items-center">
          <img
            v-lazy="walletImage"
            class="avatar-content mr-5"
            height="64"
            width="64"
            @error="onImageError"
          />
          <div>
            <div class="text-lg font-medium">
              {{ walletsStore.wallet.symbol }}
            </div>
            <div>
              <span class="text-sm">{{ $t("Futures") }}</span>
              {{ $t("Wallet") }}
            </div>
          </div>
        </div>
        <div
          class="grid grid-cols-1 gap-4"
          :class="
            walletsStore.wallet.type !== 'funding' ? 'md:grid-cols-3' : ''
          "
        >
          <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-4">
            <div class="text-sm text-gray-600 dark:text-gray-400">
              {{ $t("Total:") }}
            </div>
            <div class="text-base dark:text-white">
              {{ Number(walletsStore.wallet.balance).toFixed(2) }}
            </div>
          </div>
          <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-4">
            <div class="text-sm text-gray-600 dark:text-gray-400">
              {{ $t("Available:") }}
            </div>
            <div class="text-base dark:text-white">
              {{ Number(walletsStore.wallet.available).toFixed(2) }}
            </div>
          </div>
          <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-4">
            <div class="text-sm text-gray-600 dark:text-gray-400">
              {{ $t("In Order:") }}
            </div>
            <div class="text-base dark:text-white">
              {{
                Number(
                  walletsStore.wallet.balance - walletsStore.wallet.available
                ).toFixed(2)
              }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-5">
    <div
      class="card-body grid gap-5 xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3"
    >
      <button
        type="button"
        class="btn border-l-4 border-yellow-600 text-yellow-600 dark:border-yellow-400 dark:text-yellow-400 w-full bg-gray-100 dark:bg-gray-900 hover:bg-gray-200 dark:hover:bg-gray-700"
        @click="walletsStore.showModal('transfer')"
      >
        <i class="bi bi-arrow-left-right mr-2"></i>
        {{ $t("Transfer") }}
      </button>
    </div>
  </div>

  <TransactionsTable :type="type" />

  <TransferModal />
</template>

<script>
  import { computed, onMounted } from "vue";
  import { useWalletsStore } from "@/store/wallets";
  import TransactionsTable from "@/main/wallets/partials/TransactionsTable.vue";
  import TransferModal from "@/main/wallets/partials/TransferModal.vue";
  import { useUserStore } from "@/store/user";
  import { useRouter } from "vue-router";

  export default {
    components: {
      TransactionsTable,
      TransferModal,
    },
    setup() {
      const walletsStore = useWalletsStore();
      const walletImage = computed(() => {
        return `/assets/images/cryptoCurrency/${
          walletsStore.wallet.symbol
            ? walletsStore.wallet.symbol.toLowerCase()
            : ""
        }.png`;
      });

      const userStore = useUserStore();
      const router = useRouter();
      async function checkKyc() {
        if (
          plat.kyc.kyc_status == 1 &&
          Number(plat.kyc.wallet_details_restriction) === 1
        ) {
          if (!userStore.user) {
            await userStore.fetch();
          }
          if (!userStore.user.kyc_application) {
            router.push("/identity");
          }
          if (
            userStore.user.kyc_application &&
            userStore.user.kyc_application.level < 2 &&
            userStore.user.kyc_application.status !== "approved"
          ) {
            router.push("/identity");
          }
        }
      }

      onMounted(() => {
        checkKyc();
      });

      return {
        walletsStore,
        walletImage,
      };
    },
    // component data
    data() {
      return {
        symbol: this.$route.params.symbol,
        type: this.$route.params.type,
        cur_rate: cur_rate,
        cur_symbol: cur_symbol,
        provider: provider,
        gnl: gnl,
        pathname: "futures",
        plat: plat,
        imageLoading: true,
      };
    },
    watch: {
      $route(to, from) {
        this.walletsStore.wallet = [];
        this.walletsStore.wallet_trx = [];
      },
    },
    created() {
      this.fetchWallet();
    },
    methods: {
      async fetchWallet() {
        await this.walletsStore.fetchFutureWallet(this.symbol);
      },
      onImageError(event) {
        event.target.src = "/assets/no-image.png";
      },
    },
  };
</script>
