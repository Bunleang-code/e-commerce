<template>
  <div class="container">
    <nav class="navigation">
      <div class="nav-container">

        <!-- LEFT -->
        <div class="brows-all-btn">
            <img src="../assets/images/brows_all.png" alt="">
          <select class="brows-btn">
            <option>Browse All Categories</option>
            <option>Vegetables</option>
            <option>Fruits</option>
            <option>Meat & Seafood</option>
            <option>Bakery</option>
          </select>
        </div>


        <!-- CENTER -->
        <div class="nav-links">
          <router-link :to="{ name: 'category', params: { categoryId: 0 } }" class="nav-hotDeal"><img src="../assets/images/fired.png" alt=""> Hot Deals</router-link>
          <router-link to="/" class="nav-link">Home</router-link>

          <div class="food">
            <select class="dropdown">
              <option>Food</option>
              <option>Vegetables</option>
              <option>Fruits</option>
              <option>Meat & Seafood</option>
              <option>Bakery</option>
            </select>
          </div>

          <select class="dropdown">
            <option>Vegetables</option>
            <option>Food</option>
            <option>Fruits</option>
            <option>Meat & Seafood</option>
            <option>Bakery</option>
          </select>

          <select class="dropdown">
            <option>Meat & Seafood</option>
            <option>Vegetables</option>
            <option>Food</option>
            <option>Fruits</option>
            <option>Meat & Seafood</option>
          </select>

          <a href="#" class="nav-link">Drink</a>
          <a href="#" class="nav-link">Cookies</a>
          <a href="#" class="nav-link">Bakery</a>
        </div>

        <!-- RIGHT -->
        <div class="phone-info">
          <img src="../assets/images/head_phone.png" alt="">
          <div>
            <div class="phone-number">099 777 888</div>
            <div class="phone-label">24/7 Support Center</div>
          </div>
        </div>

      </div>
    </nav>
  </div>
</template>


<style scoped>

.container{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.navigation {
  border-bottom: 1px solid #ececec;
  background: white;
  padding: 10px 0;
  width: 100%;
}
.nav-container {
  max-width: 1400px;
  padding: 10px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.brows-all-btn .brows-btn {
    border: none;
    background-color: #3BB77E;
    outline: none;
    color: #ffffff;
    font-weight: 600;
    font-size: 15px;
}

.brows-all-btn{
  background-color: #3BB77E;
  padding: 12px 20px;
  border-radius: 5px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
}

.nav-links {
  display: flex;
  align-items: center;
  gap:40px;
  margin-right: 5rem;
}


.nav-link {
  text-decoration: none;
  color: #253D4E;
  font-weight: 500;
  transition: color 0.3s;
  background: none;
  border: none;
  cursor: pointer;
  font-size: 15px;
}

.nav-link:hover {
  color: #3BB77E;
}
.nav-hotDeal:hover{
  color: #3BB77E;
}
.dropdown {
  font-size: 15px;
  font-weight: 400;
  border: none;
}
.dropdown:hover{
  color:#3BB77E
}

.phone-info {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-right: -14rem;
}

.phone-icon {
  font-size: 24px;
}

.phone-number {
  font-size: 19px;
  font-weight: 700;
  color: #3BB77E;
}

.phone-label {
  font-size: 12px;
  color: #7E7E7E;
}
.nav-hotDeal{
  display: flex;
  align-items: center;
  gap:2px;
  text-decoration: none;
  color: #253D4E;
  font-weight: 500;
  transition: color 0.3s;
  background: none;
  border: none;
  font-size: 15px;
}

@media (max-width: 1024px) {
  .nav-links {
    display: none;
  }
}
</style>
