<template>
  <nav class="menu">
    <ul>
      <li v-for="item in menuItems" :key="item">{{ item }}</li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
const menuItems = [
  'Hot Deals', 'Home', 'Food', 'Vegetables', 'Drink', 'Cookies', 'Meat & Seafood', 'Bakery'
];
</script>
