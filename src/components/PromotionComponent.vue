<template>
  <div class="promotion-section" :style="{ backgroundColor: bgColor }">
    <div class="content">
      <h1 class="text" v-html="title"></h1>
      <ButtonComponent @click="shopNow" :label="buttonLabel" :color="buttonColor" />
    </div>
    <img :src="image" alt="" class="image" :style="imageStyle" />
  </div>
</template>

<script setup lang="ts">
import { toRefs } from 'vue'
import ButtonComponent from './ButtonComponent.vue'

const props = defineProps({
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

const { title, buttonLabel, buttonColor, image, bgColor, imageStyle } = toRefs(props)

const shopNow = (): void => {
  alert(`Let's shop ${title?.value ?? ''}`)
}
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
  font-size: 20px;
  font-weight: 600;
  line-height: 1.2;
  font-family: Quicksand, sans-serif;
  max-width: 155px;
}

.image {
  /* width: 100px; */
  height: 250px;
}
</style>
