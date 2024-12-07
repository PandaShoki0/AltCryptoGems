<template>
  <transition
    name="modal"
    mode="out-in"
    enter-active-class="modal-enter-active"
    leave-active-class="modal-leave-active"
  >
    <Modal
      v-if="marketStore.isShowModal.closePositionMarket"
      size="lg"
      @close="marketStore.closeModal('closePositionMarket')"
    >
      <template #header>
        <div class="flex items-center text-lg">
          {{
            type === "market"
              ? $t("Close with Market Order")
              : $t("Close with Limit Order")
          }}
        </div>
      </template>
      <template #body>
        <div style="margin: -24px !important;">
          <form @submit.prevent="closePosition">
            <div class="space-y-3 p-5">
              <div v-if="type === 'limit'">
                <label for="price">
                  {{ $t("Price") }} ({{ $route.params.currency }})</label
                >
                <input
                  v-model="price"
                  type="number"
                  required
                  class="form-control"
                  :placeholder="
                    'Must be a multiple of ' +
                    marketStore.future.limits.price.min
                  "
                  :step="marketStore.future.limits.price.min"
                />
              </div>
              <div>
                <label for="amount"> {{ $t("Amount (lot)") }}</label>
                <input
                  v-model="amount"
                  type="number"
                  required
                  class="form-control"
                  :min="1"
                  :max="lots"
                  step="1"
                  :placeholder="
                    '1 Lot = ' +
                    marketStore.future.contractSize +
                    ' ' +
                    $route.params.symbol
                  "
                />
              </div>
              <div>
                <div class="flex space-x-3 w-full">
                  <button
                    type="button"
                    class="btn btn-sm w-full"
                    :class="
                      percentage === 25
                        ? 'btn-outline-success'
                        : 'btn-outline-secondary'
                    "
                    @click="setPercentage(25)"
                    :disabled="lots < 2"
                  >
                    25%
                  </button>
                  <button
                    type="button"
                    class="btn btn-sm w-full"
                    :class="
                      percentage === 50
                        ? 'btn-outline-success'
                        : 'btn-outline-secondary'
                    "
                    @click="setPercentage(50)"
                    :disabled="lots < 2"
                  >
                    50%
                  </button>
                  <button
                    type="button"
                    class="btn btn-sm w-full"
                    :class="
                      percentage === 75
                        ? 'btn-outline-success'
                        : 'btn-outline-secondary'
                    "
                    @click="setPercentage(75)"
                    :disabled="lots < 2"
                  >
                    75%
                  </button>
                  <button
                    type="button"
                    class="btn btn-sm w-full"
                    :class="
                      percentage === 100
                        ? 'btn-outline-success'
                        : 'btn-outline-secondary'
                    "
                    @click="setPercentage(100)"
                  >
                    100%
                  </button>
                </div>
              </div>
              <div v-if="amount && amount > 0 && type === 'market'">
                <p>
                  {{ $t("Your position of") }} {{ amount }}
                  {{ $t("lot(s) will be closed at the market price.") }}
                </p>
              </div>
            </div>
            <div class="modal-footer mt-5">
              <Button
                type="submit"
                color="green"
                outline
                class="w-full flex justify-center items-center"
                :loading="loading"
                :disabled="loading"
              >
                {{ $t("Confirm") }}
              </Button>
            </div>
          </form>
        </div>
      </template>
    </Modal>
  </transition>
</template>

<script>
  import { Modal } from "flowbite-vue";
  import { useMarketStore } from "@/store/market";
  import { ref, computed } from "vue";
  import { Button } from "flowbite-vue";

  export default {
    name: "CancelPosition",
    components: {
      Modal,
      Button,
    },
    props: {
      currency: {
        type: String,
        required: true,
      },
      pair: {
        type: String,
        required: true,
      },
      lots: {
        type: [Number, String],
        required: true,
      },
      type: {
        type: String,
        required: true,
      },
      side: {
        type: String,
        required: true,
      },
    },
    emits: ["positionClosed"],

    setup(props, { emit }) {
      const marketStore = useMarketStore();
      const amount = ref(null);
      const price = ref(null);
      const percentage = ref(null);
      const loading = ref(false);

      const bestPrice = computed(
        () => marketStore[props.side === "long" ? "bestBid" : "bestAsk"]
      );

      const closePosition = async () => {
        loading.value = true;
        const endpoint = `/user/futures/position/sell`;
        const data = {
          id: marketStore.future.id,
          symbol: props.currency,
          currency: props.pair,
          amount: amount.value,
          price: props.type === "limit" ? price.value : bestPrice.value,
          type: props.type,
        };

        try {
          const result = await axios.post(endpoint, data);
          $toast.success(result.message);
        } catch (error) {
          $toast.success(error.response.data.message);
        } finally {
          loading.value = false;
          marketStore.closeModal("closePositionMarket");
          emit("positionClosed");
          marketStore.fetchWallet(props.pair, 2, "futures");
        }
      };

      const setPercentage = (percentageValue) => {
        // Calculate the amount based on the percentage and total lots
        amount.value = Math.floor((percentageValue / 100) * props.lots);
        percentage.value = percentageValue;
      };

      return {
        marketStore,
        amount,
        price,
        percentage,
        closePosition,
        setPercentage,
        loading,
      };
    },
  };
</script>
