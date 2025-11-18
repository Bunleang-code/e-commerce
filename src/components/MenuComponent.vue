<template>
  <div class="menu-section">
    <div class="menu-header">
      <h2 class="menu-title">{{ title }}</h2>
      <div class="tabs">
        <button
          v-for="(tab, index) in tabs"
          :key="index"
          :class="['tab', { active: activeTab === tab }]"
          @click="$emit('tab-change', tab)"
        >
          {{ tab }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title: string
  tabs: string[]
  activeTab: string
}>()

defineEmits<{
  'tab-change': [tab: string]
}>()
</script>

<style scoped>
.menu-section {
  width: 100%;
  margin: 40px 0 30px;
}

.menu-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 99%;
}

.menu-title {
  font-size: 30px;
  font-family: Arial, Helvetica, sans-serif;
  margin-left: 1rem;
}

.tabs {
  display: flex;
  gap: 35px;
  flex-wrap: wrap;
}

.tab {
  padding: 0;
  background: none;
  border: none;
  font-size: 15px;
  color: #7E7E7E;
  cursor: pointer;
  position: relative;
  transition: color 0.3s;
  font-weight: 400;
}

.tab:hover {
  color: #000000;
}

.tab.active {
  color: #000000;
  font-weight: 700;
}
</style>
