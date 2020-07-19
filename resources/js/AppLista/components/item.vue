<template>
	<li class="row rounded p-2 align-items-center mb-2" style="background-color: #333333">
		<div class="col-4 text-center text-light text-break">
			{{tarea.nombreTarea}}
		</div>
		<div class="col-4 text-center text-light text-break">
			{{tarea.fecha}}
		</div>
		<div class="col-4 text-right">
			<button type="button" class="btn btn-danger" v-on:click="this.eliminar">X</button>
		</div>
	</li>

</template>

<script>
export default {
	props: ['tarea'],
	methods: {
		eliminar: function(){
			this.$emit('itemEliminado', this.tarea.id);
		}
	}
}
</script>

<style>

</style>