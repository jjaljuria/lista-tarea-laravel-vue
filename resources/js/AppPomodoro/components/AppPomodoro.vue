<template>
  <section class="row">
    <div class="col-12">
      <keep-alive>
        <div v-if="trabajo">
          <vue-circle
            class="vue-circle"
            :progress="100"
            :size="300"
            :reverse="true"
            :show-percent="false"
            :start-angle="-Math.PI/2"
            line-cap="round"
            :fill="{color: 'red' }"
            insert-mode="append"
            ref="progresoPomodoro"
          >
            <controlReloj v-on:reproducir="reproducirPomodoro" v-on:detener="detenerPomodoro" />
          </vue-circle>

          <cronometro
            ref="cronometroPomodoro"
            :tiempoInicialEnSegundos="duracionDeLosPomodoros"
            v-on:cambio="progreso"
            v-on:alarma="descanzar"
          ></cronometro>
        </div>
      </keep-alive>

      <keep-alive>
        <div v-if="descansoCorto">
          <vue-circle
            class="vue-circle"
            :progress="100"
            :size="300"
            :reverse="true"
            :show-percent="false"
            :start-angle="-Math.PI/2"
            line-cap="round"
            :fill="{color: 'green' }"
            insert-mode="append"
            ref="progresoDescansoCorto"
          >
            <controlReloj
              v-on:reproducir="reproducirDescansoCorto"
              v-on:detener="detenerDescansoCorto"
            />
          </vue-circle>

          <cronometro
            ref="cronometroDescansoCorto"
            v-bind:tiempoInicialEnSegundos="duracionDelDescansoCorto"
            v-on:cambio="progreso"
            v-on:alarma="trabajar"
          ></cronometro>
        </div>
      </keep-alive>

      <keep-alive>
        <div v-if="descansoLargo">
          <vue-circle
            class="vue-circle"
            :progress="100"
            :size="300"
            :reverse="true"
            :show-percent="false"
            :start-angle="-Math.PI/2"
            line-cap="round"
            :fill="{color: 'blue' }"
            insert-mode="append"
            ref="progresoDescansoLargo"
          >
            <controlReloj
              v-on:reproducir="reproducirDescansoLargo"
              v-on:detener="detenerDescansoLargo"
            />
          </vue-circle>

          <cronometro
            ref="cronometroDescansoLargo"
            :tiempoInicialEnSegundos="duracionDelDescansoLargo"
            v-on:cambio="progreso"
            v-on:alarma="trabajar"
          ></cronometro>
        </div>
      </keep-alive>

      <contadorPomodoros
        :pomodorosActivos="pomodorosActivos"
        :cantidadDePomodoros="cantidadDePomodoros"
      />
    </div>
  </section>
</template>

<script>
import cronometro from "./Cronometro";
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
      pomodorosActivos: 0,
      cantidadDePomodoros: 4,
      duracionDeLosPomodoros: 1500,
      duracionDelDescansoCorto: 300,
      duracionDelDescansoLargo: 900,
      descansoCorto: false,
      descansoLargo: false,
      trabajo: true,
    };
  },
  components: {
    cronometro,
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

      this.pomodorosActivos = resultado.pomodorosActivos;
      this.$refs.cronometroPomodoro.actualizar(
        resultado.tiempoPomodoroActualEnSegundos
      );
      this.$refs.progresoPomodoro.updateProgress(
        this.obtenerPorcentaje(
          resultado.tiempoPomodoroActualEnSegundos,
          this.duracionDeLosPomodoros
        )
      );
    },

    descanzar(event) {
      if (this.pomodorosActivos > 1) {
        this.iniciarDescansoCorto();
      } else {
        this.iniciarDescansoLargo();
      }
      this.pomodorosActivos -= 1;
    },

    iniciarDescansoCorto() {
      this.descansoCorto = true;
      this.trabajo = false;
    },

    iniciarDescansoLargo() {
      this.descansoLargo = true;
      this.trabajo = false;
    },

    trabajar() {
      if (this.descansoCorto) {
        this.descansoCorto = false;
      } else {
        this.descansoLargo = false;
        this.pomodorosActivos = this.cantidadDePomodoros;
      }

      this.trabajo = true;
    },

    progreso(tiempoTrancurridoEnSegundos) {
      let progreso, total, porcentaje;

      if (this.trabajo) {
        progreso = this.$refs.progresoPomodoro;
        total = this.duracionDeLosPomodoros;
      } else if (this.descansoCorto) {
        progreso = this.$refs.progresoDescansoCorto;
        total = this.duracionDelDescansoCorto;
      } else {
        progreso = this.$refs.progresoDescansoLargo;
        total = this.duracionDelDescansoLargo;
      }

      progreso.updateProgress(
        this.obtenerPorcentaje(tiempoTrancurridoEnSegundos, total)
      );
    },

    obtenerPorcentaje(tiempoTrancurridoEnSegundos, total) {
      return (tiempoTrancurridoEnSegundos / total) * 100;
    },

    reproducirPomodoro() {
      this.$refs.cronometroPomodoro.reproducir();
    },

    detenerPomodoro() {
      this.$refs.cronometroPomodoro.detener();
    },

    reproducirDescansoCorto() {
      this.$refs.cronometroDescansoCorto.reproducir();
    },

    detenerDescansoCorto() {
      this.$refs.cronometroDescansoCorto.detener();
    },

    reproducirDescansoLargo() {
      this.$refs.cronometroDescansoLargo.reproducir();
    },

    detenerDescansoLargo() {
      this.$refs.cronometroDescansoLargo.detener();
    },
  },
};
</script>

<style>
.vue-circle {
  left: 50%;
  transform: translateX(-50%);
}
</style>