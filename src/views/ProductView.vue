<template>
  <div class="product-view">
    <div class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <router-link to="/products?productId=product1">product-view</router-link>
        <span>›</span>
        <span>{{ product?.group || 'Products' }}</span>
        <span>›</span>
        <span>{{ product?.name }}</span>
      </div>

      <div>
        {{ $route.params.productId }}
      </div>

      <div v-if="product" class="product-detail">
        <!-- Product Images -->
        <div class="product-images">
          <div class="main-image">
            <span v-if="product.promotionAsPercentage > 0" class="discount-badge">
              -{{ product.promotionAsPercentage }}%
            </span>
            <img :src="product.image" :alt="product.name" />
          </div>
        </div>

        <!-- Product Info -->
        <div class="product-info">
          <span class="stock-badge" :class="product.instock > 0 ? 'in-stock' : 'out-stock'">
            {{ product.instock > 0 ? 'In Stock' : 'Out of Stock' }}
          </span>

          <h1 class="product-name">{{ product.name }}</h1>

          <div class="product-rating">
            <div class="stars">
              <span v-for="i in 5" :key="i" class="star" :class="{ filled: i <= product.rating }">★</span>
            </div>
            <span class="rating-text">({{ product.rating }})</span>
          </div>

          <div class="product-price">
            <span class="current-price">${{ currentPrice }}</span>
            <span v-if="product.promotionAsPercentage > 0" class="old-price">${{ product.price.toFixed(2) }}</span>
          </div>

          <div class="product-description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!</p>
          </div>

          <div class="product-meta">
            <div class="meta-item">
              <span class="meta-label">Size:</span>
              <span class="meta-value">{{ product.size }}</span>
            </div>
            <div class="meta-item">
              <span class="meta-label">Category:</span>
              <span class="meta-value">{{ getCategoryName(product.categoryId) }}</span>
            </div>
            <div class="meta-item">
              <span class="meta-label">Stock:</span>
              <span class="meta-value">{{ product.instock }} units</span>
            </div>
          </div>

          <div class="product-actions">
            <div class="quantity-selector">
              <button @click="decrementQuantity">-</button>
              <input v-model="quantity" type="number" min="1" :max="product.instock" />
              <button @click="incrementQuantity">+</button>
            </div>
            <button class="add-to-cart-btn" @click="handleAddToCart" :disabled="product.instock === 0">
              <span>🛒</span>
              Add To Cart
            </button>
          </div>
        </div>
      </div>

      <div v-else class="loading">
        <p>Loading product...</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useProductStore } from '../stores/productStore'

const route = useRoute()
const router = useRouter()
const productStore = useProductStore()
const quantity = ref(1)

// Get product ID from route
const productId = computed(() => Number(route.params.productId))

// Get product
const product = computed(() =>
  productStore.products.find(p => p.id === productId.value)
)

// Calculate current price
const currentPrice = computed(() => {
  if (!product.value) return '0.00'
  if (product.value.promotionAsPercentage > 0) {
    return (product.value.price * (1 - product.value.promotionAsPercentage / 100)).toFixed(2)
  }
  return product.value.price.toFixed(2)
})

// Get category name
const getCategoryName = (categoryId: number) => {
  const category = productStore.categories.find(c => c.id === categoryId)
  return category ? category.name : 'Unknown'
}

// Quantity controls
const incrementQuantity = () => {
  if (product.value && quantity.value < product.value.instock) {
    quantity.value++
  }
}

const decrementQuantity = () => {
  if (quantity.value > 1) {
    quantity.value--
  }
}

// Add to cart
const handleAddToCart = () => {
  if (product.value) {
    alert(`Added ${quantity.value} × ${product.value.name} to cart!`)
  }
}

// Fetch data if not loaded
onMounted(async () => {
  if (productStore.products.length === 0) {
    await productStore.fetchProducts()
  }
  if (productStore.categories.length === 0) {
    await productStore.fetchCategories()
  }
})
</script>

<style scoped>
.product-view {
  min-height: 100vh;
  background: #f8f8f8;
  padding: 40px 0;
}

.container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px;
}

.breadcrumb {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 30px;
  font-size: 14px;
  color: #7E7E7E;
}

.breadcrumb a {
  color: #3BB77E;
  text-decoration: none;
}

.breadcrumb a:hover {
  color: #2a9d68;
}

.product-detail {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  background: white;
  padding: 40px;
  border-radius: 15px;
}

.product-images {
  position: relative;
}

.main-image {
  width: 100%;
  height: 600px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f8f8f8;
  border-radius: 15px;
  position: relative;
}

.main-image img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.discount-badge {
  position: absolute;
  top: 20px;
  left: 20px;
  background: #F74B81;
  color: white;
  padding: 8px 16px;
  border-radius: 8px;
  font-weight: 700;
  font-size: 18px;
}

.product-info {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.stock-badge {
  display: inline-block;
  padding: 6px 12px;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 600;
  width: fit-content;
}

.in-stock {
  background: #DEF9EC;
  color: #3BB77E;
}

.out-stock {
  background: #FFE6E6;
  color: #F74B81;
}

.product-name {
  font-size: 36px;
  font-weight: 700;
  color: #253D4E;
  line-height: 1.3;
}

.product-rating {
  display: flex;
  align-items: center;
  gap: 10px;
}

.stars {
  display: flex;
  gap: 4px;
}

.star {
  color: #E0E0E0;
  font-size: 20px;
}

.star.filled {
  color: #FDC040;
}

.rating-text {
  color: #7E7E7E;
  font-size: 16px;
}

.product-price {
  display: flex;
  align-items: center;
  gap: 15px;
}

.current-price {
  font-size: 40px;
  font-weight: 700;
  color: #3BB77E;
}

.old-price {
  font-size: 24px;
  color: #adadad;
  text-decoration: line-through;
}

.product-description {
  padding: 20px 0;
  border-top: 1px solid #ececec;
  border-bottom: 1px solid #ececec;
}

.product-description p {
  color: #7E7E7E;
  line-height: 1.8;
}

.product-meta {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.meta-item {
  display: flex;
  gap: 10px;
}

.meta-label {
  font-weight: 600;
  color: #253D4E;
  min-width: 100px;
}

.meta-value {
  color: #7E7E7E;
}

.product-actions {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}

.quantity-selector {
  display: flex;
  border: 2px solid #ececec;
  border-radius: 8px;
  overflow: hidden;
}

.quantity-selector button {
  width: 45px;
  height: 45px;
  border: none;
  background: #f8f8f8;
  cursor: pointer;
  font-size: 20px;
  font-weight: 600;
  color: #253D4E;
  transition: background 0.3s;
}

.quantity-selector button:hover {
  background: #e0e0e0;
}

.quantity-selector input {
  width: 80px;
  border: none;
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  color: #253D4E;
}

.add-to-cart-btn {
  flex: 1;
  background: #3BB77E;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 30px;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  transition: background 0.3s;
}

.add-to-cart-btn:hover:not(:disabled) {
  background: #2a9d68;
}

.add-to-cart-btn:disabled {
  background: #ccc;
  cursor: not-allowed;
}

.loading {
  text-align: center;
  padding: 100px 20px;
  font-size: 20px;
  color: #7E7E7E;
}

@media (max-width: 968px) {
  .product-detail {
    grid-template-columns: 1fr;
    gap: 30px;
  }

  .main-image {
    height: 400px;
  }

  .product-name {
    font-size: 28px;
  }

  .current-price {
    font-size: 32px;
  }
}
</style>
