<script setup lang="ts">
import PromotionComponent from './components/PromotionComponent.vue'
// import ButtonComponent from './components/ButtonComponent.vue'
import CategoryComponent from './components/CategoryComponent.vue'
</script>

<template>
  <div class="container">
    <!-- CategoryComponent -->
    <div class="categoryContainer">
      <CategoryComponent
        name="Cake & Milk"
        :items="14"
        image="src/assets/cake & milk.png"
        bgColor="#F2FCE4"
      />
      <CategoryComponent name="Peach" :items="17" image="src/assets/peach.png" bgColor="#FFFCEB" />
      <CategoryComponent
        name="Oganic Kiwi"
        :items="21"
        image="src/assets/kiwi.png"
        bgColor="#ECFFEC"
      />
      <CategoryComponent
        name="Red Apple"
        :items="68"
        image="src/assets/apple.png"
        bgColor="#FEEFEA"
      />
      <CategoryComponent name="Snack" :items="34" image="src/assets/snack.png" bgColor="#FFF3EB" />
      <CategoryComponent
        name="Black Plum"
        :items="25"
        image="src/assets/plum.png"
        bgColor="#FFF3FF"
      />
      <CategoryComponent
        name="Vegetables"
        :items="65"
        image="src/assets/vegetable.png"
        bgColor="#F2FCE4"
      />
      <CategoryComponent
        name="Headphone"
        :items="54"
        image="src/assets/headphone.png"
        bgColor="#F2FCE4"
      />
      <CategoryComponent
        name="Cake & Milk"
        :items="54"
        image="src/assets/Cake & Milk2.png"
        bgColor="#F2FCE4"
      />
      <CategoryComponent
        name="Orange"
        :items="63"
        image="src/assets/orange.png"
        bgColor="#FFF3FF"
      />
    </div>

    <!-- PromotionComponent -->
    <div class="promotionContainer">
      <PromotionComponent
        title="Everyday Fresh &<br> Clean with Our <br> Products"
        bgColor="#F0E8D5"
        image="src/assets/promotion1.jpg"
        buttonColor="#3BB77E"
        :imageStyle="{ width: '250px', objectFit: 'fill' }"
      />
      <PromotionComponent
        title="Make your Breakfast <br> Healthy and Easy"
        bgColor="#F3E8E8"
        image="src/assets/promotion2.png"
        buttonColor="#3BB77E"
        :imageStyle="{ width: '190px', objectFit: 'scale-down' }"
      />
      <PromotionComponent
        title="The best Organic <br> Products Online"
        image="src/assets/promotion3.jpg"
        bgColor="#E7EAF3"
        buttonColor="#FDC040"
        :imageStyle="{ width: '250px', objectFit: 'fill' }"
      />
    </div>
  </div>
</template>

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
