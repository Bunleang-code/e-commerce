<template>
  <div class="search-box">
    <select v-model="selectedCategory">
      <option v-for="category in categories" :key="category">{{ category }}</option>
    </select>
    <input type="text" v-model="searchQuery" placeholder="Search products..." />
    <button @click="search">Search</button>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const categories = ['All', 'Food', 'Drink', 'Vegetables', 'Meat & Seafood'];
const selectedCategory = ref(categories[0]);
const searchQuery = ref('');

function search() {
  console.log(`Searching for ${searchQuery.value} in ${selectedCategory.value}`);
}
</script>
