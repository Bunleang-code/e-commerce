<template>
  <div class="container">
    <!-- CategoryComponent -->
    <div class="categoryContainer">
      <CategoryComponent
        v-for="(category, i) in categories"
        :key="i"
        :name="category.name"
        :items="category.items"
        :image="category.image"
        :bgColor="category.bgColor"
      />
    </div>

    <!-- PromotionComponent -->
    <div class="promotionContainer">
      <PromotionComponent
        v-for="(promotion, i) in promotions"
        :key="i"
        :title="promotion.title"
        :bgColor="promotion.bgColor"
        :image="promotion.image"
        :buttonColor="promotion.buttonColor"
        :imageStyle="promotion.imageStyle"
      />
    </div>
  </div>
</template>
<script setup lang="ts">
import PromotionComponent from './components/PromotionComponent.vue'
// import ButtonComponent from './components/ButtonComponent.vue'
import CategoryComponent from './components/CategoryComponent.vue'
import { ref } from 'vue'
const categories = ref([
  { name: 'Cake & Milk', items: 14, image: 'src/assets/cake & milk.png', bgColor: '#F2FCE4' },
  { name: 'Peach', items: 17, image: 'src/assets/peach.png', bgColor: '#FFFCEB' },
  { name: 'Oganic Kiwi', items: 21, image: 'src/assets/kiwi.png', bgColor: '#ECFFEC' },
  { name: 'Red Apple', items: 68, image: 'src/assets/apple.png', bgColor: '#FEEFEA' },
  { name: 'Snack', items: 34, image: 'src/assets/snack.png', bgColor: '#FFF3EB' },
  { name: 'Black Plum', items: 25, image: 'src/assets/plum.png', bgColor: '#FFF3FF' },
  { name: 'Vegetables', items: 65, image: 'src/assets/vegetable.png', bgColor: '#F2FCE4' },
  { name: 'Headphone', items: 54, image: 'src/assets/headphone.png', bgColor: '#F2FCE4' },
  { name: 'Cake & Milk', items: 54, image: 'src/assets/Cake & Milk2.png', bgColor: '#F2FCE4' },
  { name: 'Orange', items: 63, image: 'src/assets/orange.png', bgColor: '#FFF3FF' },
])

const promotions = ref([
  {
    title: 'Everyday Fresh & Clean with Our Products',
    bgColor: '#F0E8D5',
    image: 'src/assets/promotion1.jpg',
    buttonColor: '#3BB77E',
    imageStyle: { width: '250px', objectFit: 'fill' },
  },
  {
    title: 'Make your Breakfast Healthy and Easy',
    bgColor: '#F3E8E8',
    image: 'src/assets/promotion2.png',
    buttonColor: '#3BB77E',
    imageStyle: { width: '190px', objectFit: 'scale-down' },
  },
  {
    title: 'The best Organic Products Online',
    image: 'src/assets/promotion3.jpg',
    bgColor: '#E7EAF3',
    buttonColor: '#FDC040',
    imageStyle: { width: '250px', objectFit: 'fill' },
  },
])
</script>
<style scoped>
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 40px;
  margin-top: 80px;
}
.categoryContainer {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 15px;
}
.promotionContainer {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
}
</style>
