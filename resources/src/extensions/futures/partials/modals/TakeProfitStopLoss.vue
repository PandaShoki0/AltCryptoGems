<template>
  <transition
    name="modal"
    mode="out-in"
    enter-active-class="modal-enter-active"
    leave-active-class="modal-leave-active"
  >
    <Modal
      v-if="marketStore.isShowModal.takeProfitStopLoss"
      size="lg"
      @close="marketStore.closeModal('takeProfitStopLoss')"
    >
      <template #header>
        <div class="flex items-center text-lg">
          {{ $t("Add Take Profit & Stop Loss") }}
        </div>
      </template>
      <template #body>
        <div style="margin: -24px !important;">
          <form @submit.prevent="addTakeProfitStopLoss">
            <div class="space-y-3 p-5">
              <div class="mb-3 flex justify-between">
                <span>
                  {{ $t("Entry Price") }} ({{ $route.params.currency }})
                </span>
                <span>{{ position.entryPrice }}</span>
              </div>
              <div class="mb-3 flex justify-between">
                <span>
                  {{ $t("Liquidation Price") }} ({{ $route.params.currency }})
                </span>
                <span>{{ position.liquidationPrice }}</span>
              </div>
              <div class="mb-3">
                <label for="takeProfit">{{ $t("Take Profit") }}</label>
                <input
                  v-model="takeProfit"
                  type="number"
                  required
                  class="form-control"
                  :min="position.entryPrice"
                  :max="marketPrice"
                  step="0.01"
                />
              </div>
              <div>
                <div class="flex space-x-3 w-full">
                  <button
                    v-for="percentage in takeProfitPercentages"
                    :key="percentage"
                    type="button"
                    class="btn btn-sm w-full"
                    :class="
                      percentage === takeProfitPercentage
                        ? 'btn-outline-success'
                        : 'btn-outline-secondary'
                    "
                    @click="setTakeProfitPercentage(percentage)"
                  >
                    {{ percentage }}%
                  </button>
                </div>
                <p class="mt-2">
                  {{
                    $t(
                      "If the Market Price climbs to the take profit price, the take profit market order will be triggered."
                    )
                  }}
                </p>
              </div>
              <div class="mt-4">
                <label for="stopLoss">{{ $t("Stop Loss") }}</label>
                <input
                  v-model="stopLoss"
                  type="number"
                  required
                  class="form-control"
                  :min="position.liquidationPrice"
                  :max="position.entryPrice"
                  step="0.01"
                />
              </div>
              <div>
                <div class="flex space-x-3 w-full">
                  <button
                    v-for="percentage in stopLossPercentages"
                    :key="percentage"
                    type="button"
                    class="btn btn-sm w-full"
                    :class="
                      percentage === stopLossPercentage
                        ? 'btn-outline-success'
                        : 'btn-outline-secondary'
                    "
                    @click="setStopLossPercentage(percentage)"
                  >
                    {{ percentage }}%
                  </button>
                </div>
              </div>
            </div>
            <div class="modal-footer mt-5">
              <div class="flex justify-end">
                <button
                  type="submit"
                  class="btn btn-outline-success mr-3"
                  :disabled="
                    marketStore.loading ||
                    !isTakeProfitValid ||
                    !isStopLossValid
                  "
                >
                  {{ $t("Confirm") }}
                </button>
                <button
                  type="button"
                  class="btn btn-outline-secondary"
                  @click="marketStore.closeModal('takeProfitStopLoss')"
                >
                  {{ $t("Close") }}
                </button>
              </div>
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
  import { ref, computed, watch } from "vue";

  export default {
    name: "AddTakeProfitStopLoss",
    components: {
      Modal,
    },
    emits: ["added"],
    props: {
      currency: {
        type: String,
        required: true,
      },
      pair: {
        type: String,
        required: true,
      },
      position: {
        type: Object,
        required: true,
      },
    },

    setup(props, { emit }) {
      const marketStore = useMarketStore();
      const takeProfit = ref(null);
      const stopLoss = ref(null);
      const takeProfitPercentage = ref(null);
      const stopLossPercentage = ref(null);

      const marketPrice = computed(() => marketStore.bestAsk);

      const takeProfitPercentages = [25, 50, 75, 100, 125, 150, 175, 200];
      const stopLossPercentages = [5, 15, 25, 50, 75];

      // Watch for changes in takeProfit and stopLoss values
      watch([takeProfit, stopLoss], () => {
        validateTakeProfit();
        validateStopLoss();
      });

      const isTakeProfitValid = ref(false);
      const isStopLossValid = ref(false);

      const validateTakeProfit = () => {
        isTakeProfitValid.value =
          takeProfit.value >= position.entryPrice &&
          takeProfit.value <= marketPrice.value;
      };

      const validateStopLoss = () => {
        isStopLossValid.value =
          stopLoss.value >= position.liquidationPrice &&
          stopLoss.value <= position.entryPrice;
      };

      const addTakeProfitStopLoss = async () => {
        const endpoint = `/user/futures/position/add-take-profit-stop-loss`;
        const data = {
          id: marketStore.future.id,
          currency: props.currency,
          pair: props.pair,
          takeProfit: takeProfit.value,
          stopLoss: stopLoss.value,
        };

        try {
          const result = await axios.post(endpoint, data);
          $toast.success(result.message);
        } catch (error) {
          $toast.success(error.response.data.message);
        } finally {
          marketStore.closeModal("takeProfitStopLoss");
          emit("added");
        }
      };

      const setTakeProfitPercentage = (percentage) => {
        takeProfitPercentage.value = percentage;
        takeProfit.value = Number(
          ((100 + percentage) / 100) * marketPrice.value
        ).toFixed(6);
      };

      const setStopLossPercentage = (percentage) => {
        stopLossPercentage.value = percentage;
        stopLoss.value = Number((percentage / 100) * marketPrice.value).toFixed(
          6
        );
      };

      return {
        marketStore,
        takeProfit,
        stopLoss,
        takeProfitPercentage,
        stopLossPercentage,
        marketPrice,
        takeProfitPercentages,
        stopLossPercentages,
        addTakeProfitStopLoss,
        setTakeProfitPercentage,
        setStopLossPercentage,
        isTakeProfitValid,
        isStopLossValid,
      };
    },
  };
</script>
