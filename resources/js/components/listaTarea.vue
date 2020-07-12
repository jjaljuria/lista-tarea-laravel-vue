<template>
  <ul>
	<li>
		<div class="row text-center font-weight-bold">
			<div class="col-4">
				Nombre
			</div>
			<div class="col-4">
				Fecha de Inicio
			</div>
		</div>
	</li>
	<item v-for="(i, indice) in lista" :key="indice" :tarea="i"  @itemEliminado="itemEliminado"/>
  </ul>
</template>

<script>
import item from './item.vue'
export default {
	components:{
		item
	},
	props : ['lista'],

	methods:{
		itemEliminado: function(evento){
			this.$emit('itemEliminado', evento);
		}
	}
}
</script>

<style>

</style>