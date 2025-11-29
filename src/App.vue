<template>
  <div id="app">
    <RouterView />
  </div>
</template>

<script setup lang="ts">
// App.vue is now just a container for router views
</script>

<style>
#app {
  min-height: 100vh;
  background: #f8f8f8;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
