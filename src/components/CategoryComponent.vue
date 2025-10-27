<template>
  <div class="category-section" :style="{ backgroundColor: bgColor }">
    <img :src="image" alt="" />
    <div class="text">
      <h1 class="name">{{ name }}</h1>
      <p class="items">{{ items }} items</p>
    </div>
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
  border: 1px solid rgb(171, 165, 165);
}
img {
  width: 112.5px;
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
.text {
  text-align: center;
  line-height: 0.8;
}
</style>
