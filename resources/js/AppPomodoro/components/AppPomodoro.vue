<template>
  <section class="row">
    <div class="col-12">
      <button class="rounded-circle mx-auto d-block" @click="reiniciarCuentaRegresiva">play</button>
      <button class="rounded-circle mx-auto d-block" @click="detenerCuentaRegresiva">stop</button>
      <reloj :tiempoPomodoroActualEnSegundos="datosAppPomodoro.tiempoPomodoroActualEnSegundos"></reloj>
      <contadorPomodoros :pomodorosActivos="datosAppPomodoro.pomodorosActivos" :cantidadDePomodoros="cantidadDePomodoros"/>
    </div>
  </section>
</template>

<script>
import reloj from "./Reloj";
import contadorPomodoros from './ContadorPomodoros';
import axios from "axios";

export default {
  created: function () {
    this.obtenerDatosDeInicio();
  },

  data: function () {
    return {
      datosAppPomodoro: {
        pomodorosActivos: 0,
        tiempoPomodoroActualEnSegundos: 0,
      },
      cantidadDePomodoros: 4
    };
  },
  components: {
    reloj,
    contadorPomodoros
  },
  methods: {
    async obtenerDatosDeInicio() {
      let resultado = await axios
        .get("/api/AppPomodoro/8")
        .then((respuesta) => {
          return respuesta.data[0];
        })
        .catch((error) => {
          console.log(error);
        });

      this.datosAppPomodoro = resultado;
    },

    iniciarCuentaRegrasiva() {
      this.cuentaRegresiva = setInterval(this.contar, 1000);
    },

    reiniciarCuentaRegresiva() {
      this.iniciarCuentaRegrasiva();
    },

    detenerCuentaRegresiva() {
      clearInterval(this.cuentaRegresiva);
    },

    contar() {
      if (this.datosAppPomodoro.tiempoPomodoroActualEnSegundos > 0) {
        this.datosAppPomodoro.tiempoPomodoroActualEnSegundos -= 1;
      } else if (this.datosAppPomodoro.pomodorosActivos > 0) {
        this.datosAppPomodoro.pomodorosActivos -= 1;
        this.datosAppPomodoro.tiempoPomodoroActualEnSegundos = 1500;
      } else {
        this.detenerCuentaRegresiva();
        this.iniciarDescanso();
      }
    },

    iniciarDescanso() {},

    generarPomodoros(){
      
    }
  },
};
</script>