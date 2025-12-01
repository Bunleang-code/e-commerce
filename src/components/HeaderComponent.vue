<template>
  <header class="header">
    <div class="header-container">
      <!-- Logo -->
      <router-link to="/" class="logo">
        <img src="../assets/images/logo.png" alt="Melon Mart & Grocery" />
      </router-link>

      <!-- Search Box -->
      <div class="search-box">
        <select class="category-select">
          <option>All Categories</option>
          <option>Vegetables</option>
          <option>Fruits</option>
          <option>Meat & Seafood</option>
          <option>Bakery</option>
        </select>

        <input type="text" placeholder="|     Search for items..." class="search-input" />
        <div class="search-btn">
          <img src="../assets/images/Vector.png" alt="">
        </div>
      </div>

      <!-- Right Menu -->
      <div class="header-right">
        <button class="header-btn">
          <img src="../assets/images/account.png" alt=""> Account
        </button>
        <button class="header-btn">
         <img src="../assets/images/compare.png" alt=""> Compare
        </button>
        <button class="header-btn">
          <img src="../assets/images/whishlist.png" alt=""> Wishlist
        </button>
        <button class="header-btn cart-btn">
          <img src="../assets/images/cart.png" alt=""> Cart
        </button>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">

</script>

<style scoped>
.header {
  background: white;
  border-bottom: 1px solid #ececec;
  padding: 20px 0;
}

.header-container {
  padding: 0 20px;
  display: flex;
  align-items: center;
  gap: 30px;
}

.logo img {
  height: 50px;
}

.search-box {
  flex: 1;
  display: flex;
  border: 2px solid #3BB77E;
  border-radius: 8px;
  overflow: hidden;
}

.category-select {
  padding: 12px 15px;
  border: none;
  background: white;
  cursor: pointer;
  font-size: 14px;
  min-width: 150px;
}


.search-input {
  flex: 1;
  border: none;
  padding: 12px 9px;
  font-size: 14px;
}

.search-input:focus {
  outline: none;
}

.search-btn {
  padding: 12px 20px;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 18px;
}

.header-right {
  display: flex;
  align-items: center;
  justify-content: end;
  gap: 10px;

}

.header-btn {
  background: none;
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 14px;
  color: gray;
  transition: color 0.3s;
}

.header-btn img {
  height: 18px;
}

@media (max-width: 1024px) {
  .header-right {
    display: none;
  }
}
</style>
