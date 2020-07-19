<template>
	<form>
		<div class="form-group">
			<label for="tarea">Tarea: </label>
			<input type="text" class="form-control" id="tarea" maxlength="50" v-model="tarea">
		</div>
		<div class="form-group">
			<label for="fechaIn">Fecha de inicio: </label>
			<input type="date" class="form-control" id="fechaIn" @change="validarFecha" :value="fecha">
		</div>
		<button class="btn btn-primary" type="button" v-on:click="guardar">Guardar</button>
	</form>
</template>

<script>
import moment from 'moment/moment'
export default {
	data:function(){
		return {
			tarea: '',
			fecha: moment().format('YYYY-MM-DD')
		}
	},
	
	methods:{
		guardar: function(){
			if(this.tarea == ''){
				alert('debe tener colocar una tarea');
			}else{
				this.$emit('guardado', {nombreTarea: this.tarea, fecha: this.fecha})
				this.tarea = '';
				this.fecha = moment().format('YYYY-MM-DD');
			}
		},

		validarFecha: function(evento){
			
			if(moment(evento.target.value).format('YYYY-MM-DD') < moment().format('YYYY-MM-DD')){
				evento.target.value = moment().format('YYYY-MM-DD');
				alert('No puede ser una fecha anterior a hoy');
				
			}else{
				this.fecha = evento.target.value;
			}
		}
	}

}
</script>

<style>

</style>