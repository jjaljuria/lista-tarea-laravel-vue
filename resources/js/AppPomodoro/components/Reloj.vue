<template>
  <div class="display-4 d-flex justify-content-center">
    <span>{{this.minutos}}:{{this.segundos}}</span>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: {
    tiempoPomodoroActualEnSegundos: { type: Number, required: true },
	},

  computed: {
    minutos() {
      return Math.floor(this.tiempoPomodoroActualEnSegundos/60);
    },
    segundos() {
			const minutos = Math.floor(this.tiempoPomodoroActualEnSegundos/60);
      return Math.round(((this.tiempoPomodoroActualEnSegundos/60)-minutos)*60);
    },
  },
};
</script>

<style>
</style>