<template>
  <div class="display-4 d-flex justify-content-center">
    <span>{{this.minutos}}:{{this.segundos}}</span>
  </div>
</template>

<script>
import moment from "moment";
export default {

  created(){
    this._constructor();
  },


  props: {
    tiempoInicialEnSegundos: { type: Number, required: true },
  },
  
  data: ()=>{
    return {
      tiempoTranscurridoEnSegundos: 0
    };
  },

  methods: {
    _constructor(){
      this.contador = 0;
      console.log(this.tiempoInicialEnSegundos);
           
      this.tiempoTranscurridoEnSegundos = this.tiempoInicialEnSegundos;
      console.log(this.tiempoTranscurridoEnSegundos); 
    },

    _contar(){
      if(this.tiempoTranscurridoEnSegundos > 0){
        this.tiempoTranscurridoEnSegundos -= 1;
        this.$emit('cambio', this.tiempoTranscurridoEnSegundos);
      }else{
        this.$emit('alarma');
        clearInterval(this.contador);
      }
    },

    reproducir(){
      this.contador = setInterval(this._contar, 1000);
    },

    detener(){
      clearInterval(this.contador);
    },

    reiniciar(){
      this.detener();
      this.tiempoTranscurridoEnSegundos = this.tiempoInicialEnSegundos;
      this.reproducir();
    },

    actualizar(tiempo){
      this.tiempoTranscurridoEnSegundos = tiempo;
    }

  },

  computed: {
    minutos() {
      return Math.floor(this.tiempoTranscurridoEnSegundos/60);
    },
    segundos() {
			const minutos = Math.floor(this.tiempoTranscurridoEnSegundos/60);
      return Math.round(((this.tiempoTranscurridoEnSegundos/60)-minutos)*60);
    },
  },


};
</script>

<style>
</style>