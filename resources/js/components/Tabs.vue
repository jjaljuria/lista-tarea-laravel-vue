<template>
  <div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <router-link to="/" class="nav-link" data-toggle="tab" role="tab">Lista de Tareas</router-link>
      </li>
      <li class="nav-item" role="presentation">
        <router-link to="/pomodoro" class="nav-link" data-toggle="tab" role="tab">Pomodoro</router-link>
      </li>
    </ul>
  </div>
</template>

<script>

export default {

};
</script>