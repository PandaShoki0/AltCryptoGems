<template>
  <div
    class="group relative"
    @mouseover="showMS = true"
    @mouseleave="showMS = false"
  >
    <input
      v-model="localLeverage"
      type="range"
      min="0"
      max="100"
      step="1"
      class="rc-slider"
      :style="{
        background: `linear-gradient(to right, #01bc8d 0%, #01bc8d ${localLeverage}%, rgb(200 200 200 / 0.2) ${localLeverage}%, rgb(200 200 200 / 0.2) 100%)`,
      }"
      @change="calculatePercentage()"
    />

    <div class="rc-slider-mark">
      <div
        v-for="percentage in leveragePercentages"
        :key="percentage"
        class="rc-slider-mark-text"
        :style="{
          left: `calc(${(percentage / leverageRange) * 100}% ${
            percentage === leveragePercentages[leveragePercentages.length - 1]
              ? '- 20px'
              : percentage !== leveragePercentages[0]
              ? '- 14px'
              : ''
          })`,
        }"
        @click.prevent="calculatePercentageButton(percentage)"
      >
        {{ percentage }}x
      </div>
    </div>

    <div class="rc-slider-step">
      <div
        v-for="percentage in leveragePercentages"
        :key="percentage"
        class="rc-slider-dot"
        :class="{
          'rc-slider-dot-active': range >= (percentage / leverageRange) * 100,
        }"
        :style="{
          left: `calc(${(percentage / leverageRange) * 100}% ${
            percentage === leveragePercentages[leveragePercentages.length - 1]
              ? '- 14px'
              : percentage !== leveragePercentages[0]
              ? '- 8px'
              : ''
          })`,
        }"
        @click.prevent="calculatePercentageButton(percentage)"
      ></div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      range: [Number, String],
      minLeverage: [Number, String],
      maxLeverage: [Number, String],
    },
    emits: ["calculatePercentage"],
    data() {
      return {
        localLeverage: Math.round(this.range), // Round the initial value to the nearest integer
        showMS: false,
      };
    },
    computed: {
      leverageRange() {
        return this.maxLeverage - this.minLeverage;
      },
      leveragePercentages() {
        let percentages = [];
        percentages.push(this.minLeverage); // Start with minLeverage
        for (let i = 25; i <= this.maxLeverage; i += 25) {
          percentages.push(i);
        }
        return percentages;
      },
    },
    watch: {
      range(newVal) {
        this.localLeverage = Math.round(newVal); // Round the new value to the nearest integer
      },
    },
    methods: {
      calculatePercentageButton(leverage) {
        this.localLeverage = Math.round((leverage / this.maxLeverage) * 100);
        this.$emit("calculatePercentage", this.localLeverage);
      },
      calculatePercentage() {
        this.localLeverage = Math.round(this.localLeverage);
        this.$emit("calculatePercentage", this.localLeverage);
      },
    },
  };
</script>

<style scoped>
  .rc-slider {
    -webkit-appearance: none;
    position: relative;
    box-sizing: border-box;
    width: 100%;
    height: 4px;
    outline: none;
    border-radius: 2px;
    transition: opacity 0.2s;
    padding: 0;
    margin: 0;
  }
  .rc-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    position: relative;
    z-index: 3;
    appearance: none;
    width: 16px;
    height: 16px;
    border: 4px solid #01bc8d;
    border-radius: 50%;
    background: #fff;
    margin-top: 0px;
    cursor: pointer;
  }

  .rc-slider::-moz-range-thumb {
    position: relative;
    z-index: 3;
    width: 16px;
    height: 16px;
    border: 4px solid #1a202c;
    border-radius: 50%;
    background: #01bc8d;
    cursor: pointer;
  }
  .rc-slider-track {
    position: relative;
    z-index: 2;
  }

  .rc-slider-mark-text {
    position: absolute;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    cursor: pointer;
    color: #999;
  }

  .rc-slider-mark-text-active {
    color: #666;
  }

  .rc-slider-mark {
    position: absolute;
    top: 18px;
    left: 0;
    width: 100%;
    font-size: 12px;
  }

  .rc-slider-step {
    position: absolute;
    width: 100%;
    height: 4px;
    background: transparent;
  }

  .rc-slider-dot {
    position: absolute;
    bottom: 5px;
    width: 10px;
    height: 10px;
    border: 2px solid rgba(115, 126, 141, 0.4);
    background-color: #fff;
    cursor: pointer;
    border-radius: 50%;
    vertical-align: middle;
  }
  .rc-slider-dot-active {
    border-color: rgb(1, 188, 141);
  }
</style>
