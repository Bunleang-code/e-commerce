<template>
  <div class="promotion-section" :style="{ backgroundColor: bgColor }">
    <div class="content">
      <h1 class="text" v-html="title"></h1>
      <ButtonComponent :label="buttonLabel" :color="buttonColor" @click="shopNow" />
    </div>
    <img :src="image" alt="" class="image" :style="imageStyle" />
  </div>
</template>

<script setup lang="ts">
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

function shopNow() {
  alert("Let's shop " + props.title)
}
</script>

<style scoped>
.promotion-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-inline: 68px;
  padding-top: 20px;
  padding-bottom: 20px;
  border-radius: 15px;
  border: 1px solid rgb(171, 165, 165);
}

.content {
  display: flex;
  flex-direction: column;
  gap: 20px;
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
  height: 250px;
  margin-left: 27%;
}
</style>
