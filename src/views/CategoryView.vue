<template>
  <div class="category-view">
    <!-- Page Header (Green Section) -->
    <div class="page-header">
      <div class="container">
        <h1 class="page-title">Coke & Milk</h1>
        <div class="breadcrumb">
          <span>Home</span> >
          <span>Categories</span> >
          <span style="color: green;">Coke & Milk</span>
        </div>
      </div>
    </div>

    <!-- Empty content area for now -->
    <div class="container">
      <p style="text-align: center; padding: 60px; color: #7E7E7E;">
        Category page content will go here...
      </p>
    </div>
  </div>
</template>

<style scoped>
.category-view {
  min-height: 100vh;
  background: #f8f8f8;
  margin-top: -2.5rem;
}

.page-header {
  position: relative;
  z-index: 1;
  padding: 0 20px;
  margin-top: 4rem;
  margin-bottom: -4rem;
  border-radius: 2rem;
  overflow: hidden;
}

.page-header::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  filter: blur(2px);
  background-image:
    linear-gradient(135deg, rgba(139, 225, 199, 0.7) 0%,  rgba(139, 225, 199, 0.7) 100%),
    url("@/assets/images/categoryhero.png");
  background-size: cover;
  background-position: center;
  z-index: -1;
  transform: scale(1.0);
}
.page-header > div {
  position: relative;
  z-index: 2;
  padding: 120px 0;
}

.container {
  max-width: 1400px;
  margin: 0 auto;
}

.page-title {
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

.breadcrumb span {
  color: #7E7E7E;
}
</style>
