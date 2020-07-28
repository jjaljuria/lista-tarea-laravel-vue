<template>
  <div class="display-4 d-flex justify-content-center">
    <span>{{this.minutos}}:{{this.segundos}}</span>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: {
    tiempoEnSegundos: { type: Number, required: true },
	},

  computed: {
    minutos() {
      return Math.floor(this.tiempoEnSegundos/60);
    },
    segundos() {
			const minutos = Math.floor(this.tiempoEnSegundos/60);
      return Math.round(((this.tiempoEnSegundos/60)-minutos)*60);
    },
  },
};
</script>

<style>
</style>