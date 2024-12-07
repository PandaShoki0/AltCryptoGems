<template>
  <label for="leverage" class="border-1 leverage-label peer pb-2">
    <span class="text-left">{{ $t("Leverage") }}: x{{ modelValue }}</span>
    <Range
      :range="range"
      @calculate-percentage="RangeHandler"
      :minLeverage="minLeverage"
      :maxLeverage="maxLeverage"
    />
  </label>
</template>

<script>
  import { ref } from "vue";
  import Range from "./Range.vue";

  export default {
    components: {
      Range,
    },
    props: {
      minLeverage: [Number, String],
      maxLeverage: [Number, String],
      stepLeverage: {
        type: Number,
        default: 1,
      },
      modelValue: {
        type: [Number, String],
        default: 1,
      },
      disabled: {
        type: Boolean,
        default: false,
      },
    },
    emits: ["calculateTotal", "update:modelValue"],
    setup(props, { emit }) {
      const range = ref(0);
      const leverageTypeClass = ref(
        "LeverageInput leverage-input disabled:opacity-50"
      );

      const changeLeverage = (operation) => {
        const newValue =
          operation === "increase"
            ? parseFloat(props.modelValue) + props.stepLeverage
            : parseFloat(props.modelValue) - props.stepLeverage;

        if (newValue >= props.minLeverage && newValue <= props.maxLeverage) {
          const newLeverage = Number(newValue);
          emit("update:modelValue", newLeverage);
        }
      };

      const RangeHandler = (percentage) => {
        range.value = percentage;
        const newLeverage =
          props.minLeverage +
          ((props.maxLeverage - props.minLeverage) * percentage) / 100;
        emit("update:modelValue", Math.round(newLeverage)); // Round the new leverage to the nearest integer
      };

      return {
        range,
        leverageTypeClass,
        changeLeverage,
        RangeHandler,
      };
    },
  };
</script>
