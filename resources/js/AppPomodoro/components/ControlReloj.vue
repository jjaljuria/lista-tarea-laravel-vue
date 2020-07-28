<template>
  <div>
    <button class="rounded-circle mx-auto d-block" @click="play" v-if="estadoActual === 'pause'">
      <svg
        width="1em"
        height="1em"
        viewBox="0 0 16 16"
        class="bi bi-play-fill"
        fill="currentColor"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"
        />
      </svg>
    </button>
    <button class="rounded-circle mx-auto d-block" @click="pause" v-if="estadoActual === 'play'">
      <svg
        width="1em"
        height="1em"
        viewBox="0 0 16 16"
        class="bi bi-pause-fill"
        fill="currentColor"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"
        />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      estadoActual: "pause",
    };
  },
  methods: {
    play() {
      this.$emit("play");
      this.estadoActual = "play";
    },
    pause() {
      this.$emit("pause");
      this.estadoActual = "pause";
    },
  },
};
</script>

<style scoped>
</style>