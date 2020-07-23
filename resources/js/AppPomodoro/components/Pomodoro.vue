<template>
  <div :class="['pomodoro', 'm-3', estado]">Pomodoro</div>
</template>

<script>
export default {
  props: {
    activo: { type: Boolean, default: true },
	},
	computed: {
	estado: function(){
		return this.activo ? 'activo' : 'inactivo';
	}
}
}


</script>

<style scoped>
	.pomodoro{
		min-width: 3rem;
		min-height: 3rem;
		display:inline-block;
	}

	.activo{
		background-color: red;
	}

	.inactivo{
		background-color: gray;
	}
</style>