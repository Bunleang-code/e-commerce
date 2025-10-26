<template>
  <div class="category-section" :style="{ backgroundColor: bgColor }">
    <img :src="image" alt="" />
    <h1 class="name">{{ name }}</h1>
    <p class="items">{{ items }} items</p>
  </div>
</template>

<script setup lang="ts">
defineProps({
  image: String,
  name: String,
  items: Number,
  bgColor: String,
})
</script>

<style scoped>
.category-section {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 10px;
  border-radius: 10px;
}
img {
  width: 110px;
  height: 110px;
}
.name {
  color: black;
  font-weight: bold;
  font-size: 15px;
}
.items {
  font-size: 10px;
  color: gray;
}
</style>
