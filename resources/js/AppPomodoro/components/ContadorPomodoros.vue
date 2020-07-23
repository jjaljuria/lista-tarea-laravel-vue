<template>
  <div class="d-flex justify-content-between shadow bg-gray m-auto" id="contadorPomodoros">
    <pomodoro v-for="(v, index) in mostrarPomodoros" :activo="v" :key="index"></pomodoro>
  </div>
</template>

<script>
import pomodoro from "./Pomodoro";

export default {
  components: {
    pomodoro,
  },

  props: {
    pomodorosActivos: { type: Number, required: true },
    cantidadDePomodoros: { type: Number, default: 4 },
  },

  computed: {
    mostrarPomodoros: function () {
      let activos = this.pomodorosActivos;
      let pomodoros = [];
      for (let i = 0; i < this.cantidadDePomodoros; i++) {
        if (activos > 0) {
          pomodoros.push(true);
          activos--;
        } else {
          pomodoros.push(false);
        }
      }

      return pomodoros;
    },
  },
};
</script>

<style scoped>
  #contadorPomodoros{
    width: fit-content;
  }
</style>