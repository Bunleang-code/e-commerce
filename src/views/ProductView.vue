<template>
  <div class="product-view">
    <div class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb">
        <router-link to="/">Home</router-link>
        <span>›</span>
        <span>Vegetables & tubers</span>
        <span>›</span>
        <span style="color: green;">Seeds of Change Organic</span>
      </div>

      <!-- Product Detail (Static Layout) -->
      <div class="product-detail">
        <!-- Left: Product Image -->
        <div class="product-images">
          <div class="main-image">
            <img src="../assets/images/Mango.png" alt="Product" />
          </div>

          <!-- Thumbnail images -->
          <div class="thumbnails">
            <img src="../assets/images/oranges.png" alt="Thumb 1" class="active" />
            <img src="../assets/images/thum2.png" alt="Thumb 2" />
            <img src="../assets/images/thum3.png" alt="Thumb 3" />
            <img src="../assets/images/Almonds.png" alt="Thumb 4" />
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="product-info">
          <span class="stock-badge">In Stock</span>
          <h1 class="product-name">Seeds of Change Organic Quinoa, Brown</h1>

          <div class="rating">
            <span class="stars">⭐⭐⭐⭐</span>
            <span class="rating-text">(4.0)</span>
          </div>

          <div class="price">
            <span class="current-price">$38</span>
            <span class="old-price">$42</span>
          </div>

          <p class="description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia,
            corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum
            eligendi? Officia doloremque facere quia. Voluptatum, accusantium!
          </p>

          <div class="product-meta">
            <div><strong>Size:</strong> 500g</div>
            <div><strong>Vendor:</strong> NestMart</div>
            <div><strong>SKU:</strong> FWM15VKT</div>
          </div>

          <div class="actions">
            <div class="quantity">
              <button>-</button>
              <input type="number" value="1" />
              <button>+</button>
            </div>
            <button class="add-to-cart">🛒 Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Description Section (Static) -->
      <div class="description-tabs">
        <div class="tabs">
          <button class="tab active">Description</button>
          <button class="tab">Additional info</button>
          <button class="tab">Reviews (3)</button>
        </div>
        <div class="tab-content">
          <p>
            Uninhibited carnally hired played in whimpered dear gorilla koala depending and much
            yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark
            near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

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
}

.breadcrumb a {
  color: #7E7E7E;
  text-decoration: none;
}

.breadcrumb span {
  color: #7E7E7E;
}

.product-detail {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  background: white;
  padding: 40px;
  border-radius: 15px;
  margin-bottom: 40px;
}

.product-images {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.main-image {
  position: relative;
  width: 100%;
  height: 500px;
  background: #f8f8f8;
  border-radius: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.main-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.badge {
  position: absolute;
  top: 20px;
  left: 20px;
  background: #DEF9EC;
  color: #3BB77E;
  padding: 6px 12px;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 600;
}

.thumbnails {
  display: flex;
  gap: 20px;
}

.thumbnails img {
  width: 80px;
  height: 80px;
  border-radius: 10px;
  cursor: pointer;
  border: 1px solid rgb(185, 185, 185);
  padding: 20px;
}

.thumbnails img.active {
  border-color: #3BB77E;
}

.product-info {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.stock-badge {
  background: #DEF9EC;
  color: #3BB77E;
  padding: 6px 12px;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 600;
  width: fit-content;
}

.product-name {
  font-size: 32px;
  font-weight: 700;
  color: #253D4E;
}

.rating {
  display: flex;
  align-items: center;
  gap: 10px;
}

.stars {
  color: #FDC040;
  font-size: 18px;
}

.rating-text {
  color: #7E7E7E;
}

.price {
  display: flex;
  align-items: center;
  gap: 15px;
}

.current-price {
  font-size: 36px;
  font-weight: 700;
  color: #3BB77E;
}

.old-price {
  font-size: 20px;
  color: #adadad;
  text-decoration: line-through;
}

.description {
  color: #7E7E7E;
  line-height: 1.8;
  padding: 20px 0;
  border-top: 1px solid #ececec;
  border-bottom: 1px solid #ececec;
}

.product-meta {
  display: flex;
  flex-direction: column;
  gap: 10px;
  color: #7E7E7E;
}

.actions {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}

.quantity {
  display: flex;
  border: 2px solid #ececec;
  border-radius: 8px;
  overflow: hidden;
}

.quantity button {
  width: 45px;
  height: 45px;
  border: none;
  background: #f8f8f8;
  cursor: pointer;
  font-size: 18px;
}

.quantity input {
  width: 60px;
  border: none;
  text-align: center;
  font-size: 16px;
}

.add-to-cart {
  flex: 1;
  background: #3BB77E;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 30px;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
}

.description-tabs {
  background: white;
  padding: 30px;
  border-radius: 15px;
}

.tabs {
  display: flex;
  gap: 30px;
  border-bottom: 2px solid #ececec;
  margin-bottom: 30px;
}

.tab {
  background: none;
  border: none;
  padding: 15px 0;
  font-size: 16px;
  color: #7E7E7E;
  cursor: pointer;
  position: relative;
}

.tab.active {
  color: #3BB77E;
  font-weight: 600;
}

.tab.active::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  right: 0;
  height: 2px;
  background: #3BB77E;
}

.tab-content {
  color: #7E7E7E;
  line-height: 1.8;
}

@media (max-width: 968px) {
  .product-detail {
    grid-template-columns: 1fr;
  }
}
</style>
