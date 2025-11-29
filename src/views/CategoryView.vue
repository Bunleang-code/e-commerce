<template>
  <div class="category-view">
    <!-- Page Header -->
    <div class="page-header">
      <div class="header-content">
        <h1 class="category-title">{{ categoryName }}</h1>
        <div class="breadcrumb">
          <router-link to="/">Home</router-link>
          <span>›</span>
          <span>Categories</span>
          <span>›</span>
          <span>{{ categoryName }}</span>
        </div>
      </div>
    </div>

    <!-- Products in this category -->
    <div class="container">
      <h2 class="section-title">Products in {{ categoryName }}</h2>

      <div v-if="categoryProducts.length > 0" class="products-grid">
        <ProductCardComponent
          v-for="product in categoryProducts"
          :key="product.id"
          :name="product.name"
          :category="categoryName"
          :image="product.image"
          :price="product.price"
          :rating="product.rating"
          :size="product.size"
          :discount="product.promotionAsPercentage"
          @click="navigateToProduct(product.id)"
          @add-to-cart="handleAddToCart(product)"
        />
      </div>

      <div v-else class="no-products">
        <p>No products found in this category.</p>
        <router-link to="/" class="back-link">← Back to Home</router-link>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useProductStore, type Product } from '../stores/productStore'
import ProductCardComponent from '../components/ProductComponent.vue'

const route = useRoute()
const router = useRouter()
const productStore = useProductStore()

// Get category ID from route
const categoryId = computed(() => Number(route.params.categoryId))

// Get category info
const category = computed(() =>
  productStore.categories.find(c => c.id === categoryId.value)
)

const categoryName = computed(() => category.value?.name || 'Category')

// Get products in this category
const categoryProducts = computed(() =>
  productStore.getProductsByCategory(categoryId.value)
)

// Fetch data if not loaded
onMounted(async () => {
  if (productStore.categories.length === 0) {
    await productStore.fetchCategories()
  }
  if (productStore.products.length === 0) {
    await productStore.fetchProducts()
  }
})

// Navigation
const navigateToProduct = (productId?: number) => {
  if (productId) {
    router.push({ name: 'product', params: { productId } })
  }
}

const handleAddToCart = (product: Product) => {
  console.log('Added to cart:', product)
  alert(`Added ${product.name} to cart!`)
}
</script>

<style scoped>
.category-view {
  min-height: 100vh;
  background: #f8f8f8;
}

.page-header {
  background: linear-gradient(135deg, #BCE3C9 0%, #E8F5E9 100%);
  padding: 60px 20px;
  margin-bottom: 40px;
}

.header-content {
  max-width: 1400px;
  margin: 0 auto;
}

.category-title {
  font-size: 48px;
  font-weight: 700;
  color: #253D4E;
  margin-bottom: 15px;
}

.breadcrumb {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  color: #7E7E7E;
}

.breadcrumb a {
  color: #3BB77E;
  text-decoration: none;
  transition: color 0.3s;
}

.breadcrumb a:hover {
  color: #2a9d68;
}

.container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px 60px;
}

.section-title {
  font-size: 32px;
  font-weight: 700;
  color: #253D4E;
  margin-bottom: 30px;
}

.products-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 25px;
}

.no-products {
  text-align: center;
  padding: 60px 20px;
}

.no-products p {
  font-size: 20px;
  color: #7E7E7E;
  margin-bottom: 20px;
}

.back-link {
  display: inline-block;
  color: #3BB77E;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}

.back-link:hover {
  color: #2a9d68;
}

@media (max-width: 1200px) {
  .products-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 768px) {
  .category-title {
    font-size: 32px;
  }

  .products-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
  }
}
</style>
