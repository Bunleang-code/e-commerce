<template>
  <button :style="{ backgroundColor: color }">{{ label }}</button>
</template>

<script setup lang="ts">
defineProps({
  label: String,
  color: String,
})
</script>

<style scoped>
button {
  color: white;
  border-radius: 5px;
  height: 40px;
  font-size: 13px;
  font-weight: bold;
  border: none;
}
</style>
