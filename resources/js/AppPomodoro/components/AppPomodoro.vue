<template>
  <section class="row">
    <div class="col-12">
      <button class="rounded-circle mx-auto d-block" @click="reiniciarCuentaRegresiva">play</button>
      <button class="rounded-circle mx-auto d-block" @click="detenerCuentaRegresiva">stop</button>
      <reloj :tiempoPomodoroActualEnSegundos="contadorPomodoro.tiempoPomodoroActualEnSegundos"></reloj>
    </div>
  </section>
</template>

<script>
import reloj from "./Reloj";
import axios from "axios";

export default {
  created: function () {
    this.obtenerDatosDeInicio();
  },

  data: function () {
    return {
      contadorPomodoro: {
        pomodorosActivos: 0,
        tiempoPomodoroActualEnSegundos: 0,
      },
    };
  },
  components: {
    reloj,
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

      this.contadorPomodoro = resultado;
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
      if (this.contadorPomodoro.tiempoPomodoroActualEnSegundos > 0) {
        this.contadorPomodoro.tiempoPomodoroActualEnSegundos -= 1;
      } else if (this.contadorPomodoro.pomodorosActivos > 0) {
        this.contadorPomodoro.pomodorosActivos -= 1;
        this.contadorPomodoro.tiempoPomodoroActualEnSegundos = 1500;
      } else {
        this.detenerCuentaRegresiva();
        this.iniciarDescanso();
      }
    },

    iniciarDescanso() {},
  },
};
</script>