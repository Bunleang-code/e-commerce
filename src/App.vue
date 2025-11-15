<template>
  <div class="container">
    <!-- CategoryComponent -->
    <div class="categoryContainer">
      <CategoryComponent
        v-for="(category, i) in productStore.categories"
        :key="i"
        :name="category.name"
        :items="category.productCount"
        :image="category.image"
        :bgColor="category.color"
        :group="category.group"
      />
    </div>

    <!-- PromotionComponent -->
    <div class="promotionContainer">
      <PromotionComponent
        v-for="(promotion, i) in productStore.promotions"
        :key="i"
        :title="promotion.title"
        :bgColor="promotion.color"
        :image="promotion.image"
        :buttonColor="promotion.buttonColor"
        :imageStyle="{ width: '190px', objectFit: 'fill' }"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import PromotionComponent from './components/PromotionComponent.vue'
// import ButtonComponent from './components/ButtonComponent.vue'
import CategoryComponent from './components/CategoryComponent.vue'
import { onMounted } from 'vue'
// import axios from 'axios'
import { useProductStore } from './stores/productStore'

// const categories = ref([
//   { name: 'Cake & Milk', productCount: 14, image: 'src/assets/cake & milk.png', color: '#F2FCE4' },
//   { name: 'Peach', productCount: 17, image: 'src/assets/peach.png', color: '#FFFCEB' },
//   { name: 'Oganic Kiwi', productCount: 21, image: 'src/assets/kiwi.png', color: '#ECFFEC' },
//   { name: 'Red Apple', productCount: 68, image: 'src/assets/apple.png', color: '#FEEFEA' },
//   { name: 'Snack', productCount: 34, image: 'src/assets/snack.png', color: '#FFF3EB' },
//   { name: 'Black Plum', productCount: 25, image: 'src/assets/plum.png', color: '#FFF3FF' },
//   { name: 'Vegetables', productCount: 65, image: 'src/assets/vegetable.png', color: '#F2FCE4' },
//   { name: 'Headphone', productCount: 54, image: 'src/assets/headphone.png', color: '#F2FCE4' },
//   { name: 'Cake & Milk', productCount: 54, image: 'src/assets/Cake & Milk2.png', color: '#F2FCE4' },
//   { name: 'Orange', productCount: 63, image: 'src/assets/orange.png', color: '#FFF3FF' },
// ])

// const promotions = ref([
//   {
//     title: 'Everyday Fresh & Clean with Our Products',
//     color: '#F0E8D5',
//     image: 'src/assets/promotion1.png',
//     buttonColor: '#3BB77E',
//     imageStyle: { width: '190px', objectFit: 'fill' },
//   },
//   {
//     title: 'Make your Breakfast Healthy and Easy',
//     color: '#F3E8E8',
//     image: 'src/assets/promotion2.png',
//     buttonColor: '#3BB77E',
//     imageStyle: { width: '190px', objectFit: 'fill' },
//   },
//   {
//     title: 'The best Organic Products Online',
//     color: '#E7EAF3',
//     image: 'src/assets/promotion3.png',
//     buttonColor: '#FDC040',
//     imageStyle: { width: '190px', objectFit: 'fill' },
//   },
// ])

// const BACKEND_URL = 'http://localhost:3000';
// interface Category {
//   name: string;
//   productCount: number;
//   image: string;
//   color: string;
// }

// interface Promotion {
//   title: string;
//   color: string;
//   image: string;
//   buttonColor: string;
//   imageStyle?: Record<string, string>;
// }

// const categories = ref<Category[]>([]);
// const promotions = ref<Promotion[]>([]);

// Fetch categories from backend api
// const fetchCategories = async () => {
//   try {
//     const response = await axios.get(`${BACKEND_URL}/api/categories`);
//     // Add backend URL to image paths
//     categories.value = response.data.map((cat: Category) => ({
//       ...cat,
//       image: `${BACKEND_URL}/${cat.image}`
//     }));
//     console.log("Categories loaded:", categories.value);
//   } catch (error) {
//     console.error("Error fetching categories: ", error);
//   }
// }

// // Fetch promotions from backend api
// const fetchPromotions = async () => {
//   try {
//     const response = await axios.get(`${BACKEND_URL}/api/promotions`);
//     // Add backend URL to image paths
//     promotions.value = response.data.map((promo: Promotion) => ({
//       ...promo,
//       image: `${BACKEND_URL}/${promo.image}`
//     }));
//     console.log('Promotions loaded:', promotions.value);
//   } catch (error) {
//     console.error('Error fetching promotions:', error);
//   }
// }

//Use the Pinia store
const productStore = useProductStore();

// Fetch data when component is mounted
onMounted(() => {
  productStore.fetchCategories()
  productStore.fetchPromotions()
  productStore.fetchGroups()
  productStore.fetchProducts()
})
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
