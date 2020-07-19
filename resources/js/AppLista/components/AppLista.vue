<template>
  <section class="mt-4 row">
      <div class="col-12 col-md-6 border-right">
        <panel-ingreso @guardado="guardarEnLista" />
      </div>
      <div class="col-12 col-md-6" style="max-height: 25rem; overflow-y: auto;">
        <lista-tarea :lista="lista" class="mx-3" v-on:itemEliminado="eliminarEnLista"></lista-tarea>
      </div>
  </section>
</template>

<script>
import panelIngreso from "./panelIngreso.vue";
import listaTarea from "./listaTarea.vue";
import $ from "jquery";
import axios from "axios";
export default {
  data: function() {
    return {
      contador: 1,
      lista: []
    };
  },

  created: function() {
    this.obtenerLista();
  },

  methods: {
    obtenerLista: function() {
      let self = this;
      axios
        .get("api/AppLista")
        .then(function(respuesta) {
          self.lista = respuesta.data;
          console.log(self.lista);
          self.contador = respuesta.data.length + 1;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    guardarEnLista: function(datos) {

      console.log(datos);
      const ajax = $.ajax({
        url: "api/AppLista/store",
        type: "POST",
        data: datos
      });

      ajax.done(respuesta =>{
        console.log(respuesta);
      });

      ajax.fail(error => {
        console.log(error);
      });

      /*console.log(datos);
      axios.post("../backend/api/nuevaTarea.php", {
        datos: datos
      }).then(function(respuesta){
          console.log(respuesta);
        }).catch(function(error) {
        console.log(error);
      });*/

      this.obtenerLista();
      this.contador = this.contador + 1;
      console.log(this.contador);
    },
    eliminarEnLista: function(id) {
      console.log(id);
      const ajax = $.ajax({
        url: "api/AppLista/destroy/" + id,
        type: "Delete",
      });

      ajax.done((respuesta) => {
        console.log("Eliminado " + id);
        this.obtenerLista();
      });

      ajax.fail((error) => {
        console.log(error);
      })
    }
  },
  name: "App",
  components: {
    panelIngreso,
    listaTarea
  }
};
</script>

<style>
</style>
