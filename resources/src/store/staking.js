import { defineStore } from "pinia";
export const useStakingStore = defineStore("staking", {
    state: () => ({
        coins: [],
        logs: [],
        coinlogs: [],
        assets: null,
        last_profit: null,
        total_profit: null,
        wallet: null,
        wallets: [],
        coin: null,
        loading: false,
        isShowModal: {
            stake: false,
            cancel: false,
            claim: false,
        },
    }),

    actions: {
        async fetch() {
            await axios.post("/user/fetch/staking").then((response) => {
                if (response.message == "Verify your identify first!") {
                    window.location.href = "/user/kyc";
                }
                (this.coins = response.coins),
                    (this.logs = response.logs),
                    (this.coinlogs = response.coinlogs),
                    (this.assets = response.assets),
                    (this.last_profit = response.last_profit),
                    (this.total_profit = response.total_profit),
                    (this.wallet = response.wallet);
            });
            await axios.post("/user/fetch/staking/wallets").then((response) => {
                    (this.wallets = response.wallets);
                    // (this.assets = response.assets),
                    // (this.last_profit = response.last_profit),
                    // (this.total_profit = response.total_profit);
            });
            
        },
        async fetchPublic() {
            await axios.post("/publicroute/fetch/staking").then((response) => {
                
                (this.coins = response.coins);
            });
        },
        async setCoin(row, type) {
            this.coin = row;
            this.showModal(type);
        },
        closeModal(type) {
            if (type == "stake") {
                this.isShowModal.stake = false;
            } else if (type == "cancel") {
                this.isShowModal.cancel = false;
            } else if (type == "claim") {
                this.isShowModal.claim = false;
            }
        },
        showModal(type) {
            if (type == "stake") {
                this.isShowModal.stake = true;
            } else if (type == "cancel") {
                this.isShowModal.cancel = true;
            } else if (type == "claim") {
                this.isShowModal.claim = true;
            }
        },
        async Stake(amount) {
            this.loading = true;
            await axios
                .post("/user/staking/store", {
                    symbol: this.coin.symbol,
                    coin_id: this.coin.id,
                    amount: amount,
                })
                .then((response) => {
                    $toast[response.type](response.message);
                    this.fetch();
                })
                .catch((error) => {
                    $toast.error(error.response.data.message);
                })
                .finally(() => {
                    this.closeModal("stake");
                    this.loading = false;
                });
        },
        async StakeNew(amount) {
            this.loading = true;
            await axios
                .post("/user/staking/store/new", {
                    symbol: this.coin.symbol,
                    coin_id: this.coin.id,
                    selected_symbol: this.wallet.symbol,
                    amount: amount,
                    wallet_id: this.wallet.id
                })
                .then((response) => {
                    $toast[response.type](response.message);
                    this.fetch();
                })
                .catch((error) => {
                    $toast.error(error.response.data.message);
                })
                .finally(() => {
                    this.closeModal("stake");
                    this.loading = false;
                });
        },
        async CancelStake() {
            this.loading = true;
            // await axios
            //     .post("/user/staking/cancel", {
            //         symbol: this.coin.symbol,
            //         coin_id: this.coin.id,
            //     })
            //     .then((response) => {
            //         $toast[response.type](response.message);
            //         this.fetch();
            //     })
            //     .catch((error) => {
            //         $toast.error(error.response.data.message);
            //     })
            //     .finally(() => {
            //         this.closeModal("cancel");
            //         this.loading = false;
            //     });

            await axios
                .post("/user/staking/new/cancel", {
                    symbol: this.coin.symbol,
                    coin_id: this.coin.id,
                })
                .then((response) => {
                    $toast[response.type](response.message);
                    this.fetch();
                })
                .catch((error) => {
                    $toast.error(error.response.data.message);
                })
                .finally(() => {
                    this.closeModal("cancel");
                    this.loading = false;
                });

                
        },
        async ClaimStake() {
            this.loading = true;
            await axios
                .post("/user/staking/claim", {
                    symbol: this.coin.symbol,
                    coin_id: this.coin.id,
                })
                .then((response) => {
                    $toast[response.type](response.message);
                    this.fetch();
                })
                .catch((error) => {
                    $toast.error(error.response.data.message);
                })
                .finally(() => {
                    this.closeModal("claim");
                    this.loading = false;
                });
        },
    },
    persist: true,
});
