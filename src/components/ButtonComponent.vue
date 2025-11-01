<template>
  <button class="btn" :style="{ backgroundColor: color }">{{ label }}</button>
</template>

<script setup lang="ts">
defineProps({
  label: String,
  color: String,
})
</script>

<style scoped>
.btn {
  color: white;
  border: none;
  border-radius: 12px;
  padding: 10px 20px;
  font-size: 15px;
  font-family: 'Quicksand', sans-serif;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.25s ease-in-out;
  width: 130px;
}
.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
  opacity: 0.9;
}
</style>
