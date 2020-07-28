<template>
  <div :class="['pomodoro', 'm-3', estado]">
    <svg
      width="1em"
      height="1em"
      viewBox="0 0 16 16"
      class="bi bi-clock-fill w-100 h-100"
      fill="currentColor"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        fill-rule="evenodd"
        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"
      />
    </svg>
  </div>
</template>

<script>
export default {
  props: {
    activo: { type: Boolean, default: true },
  },
  computed: {
    estado: function () {
      return this.activo ? "activo" : "inactivo";
    },
  },
};
</script>

<style scoped>
.pomodoro {
  min-width: 3rem;
  min-height: 3rem;
  display: inline-block;
}

.activo {
  background-color: red;
}

.inactivo {
  background-color: gray;
}
</style>