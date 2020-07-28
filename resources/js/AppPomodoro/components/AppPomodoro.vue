<template>
  <section class="row">
    <div class="col-12">
      <vue-circle
        :progress="30"
        :reverse="true"
        :show-percent="false"
        :start-angle="-Math.PI/2"
        line-cap="round"
        :fill="{gradient: ['red', 'green', 'blue'] }"
        insert-mode="append"
        class="mx-auto"
      >
        <controlReloj v-on:play="play" v-on:pause="pause" />
      </vue-circle>

      <reloj :tiempoEnSegundos="datosAppPomodoro.tiempoPomodoroActualEnSegundos"></reloj>
      <contadorPomodoros
        :pomodorosActivos="datosAppPomodoro.pomodorosActivos"
        :cantidadDePomodoros="cantidadDePomodoros"
      />
    </div>
  </section>
</template>

<script>
import reloj from "./Reloj";
import contadorPomodoros from "./ContadorPomodoros";
import controlReloj from "./ControlReloj";
import VueCircle from "vue2-circle-progress";
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
        tiempoDeDescansoCortoEnSegundos: 0,
        tiempoDeDescansoLargoEnSegundos: 0,
      },
      cantidadDePomodoros: 4,
      descansando: false,
    };
  },
  components: {
    reloj,
    contadorPomodoros,
    controlReloj,
    VueCircle,
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

    iniciarCuentaPomodoro() {
      this.cuentaPomodoro = setInterval(this.contarPomodoro, 1000);
    },

    detenerCuentaPomodoro() {
      clearInterval(this.cuentaPomodoro);
    },

    contarPomodoro() {
      if (this.datosAppPomodoro.tiempoPomodoroActualEnSegundos > 0) {
        this.datosAppPomodoro.tiempoPomodoroActualEnSegundos -= 1;
      } else if (this.datosAppPomodoro.pomodorosActivos > 0) {
        this.datosAppPomodoro.pomodorosActivos -= 1;
        this.datosAppPomodoro.tiempoPomodoroActualEnSegundos = 1500;

        this.detenerCuentaPomodoro();
        this.iniciarDescansoCorto();
      } else {
      }
    },

    play() {
      this.iniciarCuentaPomodoro();
    },

    pause() {
      this.detenerCuentaPomodoro();
    },

    iniciarDescansoCorto() {
      this.tiempoDeDescansoCortoEnSegundos = 300;
    },
  },
};
</script>