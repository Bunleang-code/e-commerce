<template>
  <div class="container">

  <!-- <div class="header">
    <img src="logo.png" alt="">
  </div> -->

    <!-- Featured Categories Section -->
   <MenuComponent
      title="Featured Categories"
      :tabs="categoryTabs"
      :activeTab="activeCategoryTab"
      @tab-change="handleCategoryTabChange"
    />
    <!-- CategoryComponent -->
    <div class="categoryContainer">
      <CategoryComponent
        v-for="(category, i) in displayedCategories"
        :key="i"
        :name="category.name"
        :items="category.productCount || category.items || 0"
        :image="category.image"
        :bgColor="category.color"
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
        <!-- Featured popular product Section -->
      <MenuComponent
        title="Popular Products"
        :tabs="productTabs"
        :activeTab="activeProductTab"
        @tab-change="handleProductTabChange"
    />
    <div class="productContainer">
      <ProductComponent
        v-for="product in displayedPopularProducts"
        :key="product.id"
        :name="product.name"
        :category="getCategoryName(product.categoryId)"
        :image="product.image"
        :price="product.price"
        :rating="product.rating"
        :size="product.size"
        :discount="product.promotionAsPercentage"
        @add-to-cart="handleAddToCart(product)"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import PromotionComponent from '../components/PromotionComponent.vue'
// import ButtonComponent from './components/ButtonComponent.vue'
import CategoryComponent from '../components/CategoryComponent.vue'
import {ref, computed, onMounted } from 'vue'
// import axios from 'axios'
import { useProductStore } from '../stores/productStore'
import type { Product } from '../stores/productStore'
import MenuComponent from '../components/MenuComponent.vue';
import ProductComponent from '../components/ProductComponent.vue';
// import SearchBoxComponent from '../components/SearchBoxComponent.vue'
// import logo from "src/assets/images"

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
const activeCategoryTab = ref('All');
const activeProductTab = ref('All')


// Fetch data when component is mounted
onMounted(() => {
  productStore.fetchCategories()
  productStore.fetchPromotions()
  productStore.fetchGroups()
  productStore.fetchProducts()
})

//Category tabs
const categoryTabs = computed(()=>{
  const groups = productStore.getGroupNames
  return ['All', ...groups]
})

//Handle category tabs chnage
const handleCategoryTabChange = (tab: string) => {
  activeCategoryTab.value = tab
}

// Displayed categories based on active tab
const displayedCategories = computed(() => {
  if (activeCategoryTab.value === 'All') {
    return productStore.categories.slice(0, 10)
  } else {
    return productStore.getCategoriesByGroup(activeCategoryTab.value)
  }
})

// Product tabs
const productTabs = computed(() => {
  const groups = productStore.getGroupNames
  return ['All', ...groups]
})

// Handle product tab change
const handleProductTabChange = (tab: string) => {
  activeProductTab.value = tab
}

// Displayed popular products based on active tab
const displayedPopularProducts = computed(() => {
  let products = productStore.getPopularProducts

  if (activeProductTab.value !== 'All') {
    products = products.filter(p => p.group === activeProductTab.value)
  }

  return products.slice(0, 10)
})

// Helper function to get category name by ID
const getCategoryName = (categoryId: number) => {
  const category = productStore.categories.find(c => c.id === categoryId)
  return category ? category.name : 'Hodo Foods'
}

// Handle add to cart
const handleAddToCart = (product: Product) => {
  console.log('Added to cart:', product)
  alert(`Added ${product.name} to cart!`)
}
</script>
<style scoped>
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 40px;
  margin-top: -40px;
}
.categoryContainer {
  display: flex;
  justify-content: start;
  align-items: center;
  width: 98%;
  gap: 15px;
  margin-top: -60px;
}
.promotionContainer {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
  margin-bottom: -70px;
}.productContainer {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  width: 98%;
  gap: 25px;
  margin-top: -50px;
}
</style>
