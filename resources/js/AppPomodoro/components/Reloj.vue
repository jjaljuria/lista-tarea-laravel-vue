<template>
  <div class="display-4 d-flex justify-content-center">
	  <span>{{this.minutos}}:{{this.segundos}}</span>
  </div>
</template>

<script>
export default {
	data: () =>{
		return {
			minutos: 0,
			segundos: 0,
		}
	}
}
</script>

<style>

</style>