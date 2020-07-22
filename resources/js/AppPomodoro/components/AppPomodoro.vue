<template>
	<section class="row">
		<div class="col-12">
			<reloj></reloj>
		</div>
	</section>
</template>

<script>
import reloj from './Reloj';
import axios from 'axios';

export default {
	components: {
		reloj,
	},
	methods: {
		obtenerTiempoPomodoroActual(){
			
		}
	}
	
}
</script>