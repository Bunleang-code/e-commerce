<template>
  <div class="promotion-section" :style="{ backgroundColor: bgColor }">
    <div class="content">
      <h1 class="text">{{ title }}</h1>
      <ButtonComponent :label="buttonLabel" :color="buttonColor" />
    </div>
    <img :src="image" alt="" class="image" />
  </div>
</template>

<script setup lang="ts">
import ButtonComponent from './ButtonComponent.vue'

defineProps({
  image: String,
  title: String,
  bgColor: String,
  buttonLabel: {
    type: String,
    default: 'Shop Now →',
  },
  buttonColor: {
    type: String,
    default: '#3BB77E',
  },
})
</script>

<style scoped>
.promotion-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 40px;
  border-radius: 15px;
  min-height: 200px;
  width: 100%;
}

.content {
  display: flex;
  flex-direction: column;
  gap: 20px;
  max-width: 30%;
}

.text {
  color: #253d4e;
  font-size: 25px;
  font-weight: 600;
  line-height: 1.2;
  margin: 0;
}

.image {
  width: 325px;
  height: 250px;
  margin-right: -40px;
  margin-bottom: -8px;
}
</style>
