<template>
  <HeaderComponent />
  <NavComponent />
  <div id="app">
    <RouterView />
  </div>
</template>

<script setup lang="ts">
import HeaderComponent from './components/HeaderComponent.vue';
import NavComponent from './components/NavComponent.vue';

// App.vue is now just a container for router views
</script>

<style>
#app {
  min-height: 100vh;
  background: white;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
