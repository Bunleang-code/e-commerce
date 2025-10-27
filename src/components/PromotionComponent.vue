<template>
  <div class="promotion-section" :style="{ backgroundColor: bgColor }">
    <div class="content">
      <h1 class="text" v-html="title"></h1>
      <ButtonComponent :label="buttonLabel" :color="buttonColor" />
    </div>
    <img :src="image" alt="" class="image" :style="imageStyle" />
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
  imageStyle: {
    type: Object,
    default: () => ({}),
  },
})
</script>

<style scoped>
.promotion-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-inline: 48px;
  padding-top: 20px;
  padding-bottom: 20px;
  border-radius: 15px;
  width: 100%;
  border: 1px solid rgb(171, 165, 165);
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
  white-space: nowrap;
  margin: 0;
}

.image {
  /* width: 100px; */
  height: 250px;
  margin-right: -48px;
  margin-bottom: -8px;
}
</style>
