import { defineStore } from 'pinia'
import axios from 'axios'

const BACKEND_URL = 'http://localhost:3000'

interface Category {
  id?: number
  name: string
  productCount: number
  items: number
  image: string
  color: string
  group: string
}

interface Promotion {
  id?: number
  title: string
  url?: string
  color: string
  buttonColor: string
  image: string
}

interface Group {
  id?: number
  name: string
}

export interface Product {
  id?: number
  name: string
  rating: number
  size: string
  image: string
  price: number
  promotionAsPercentage: number
  categoryId: number
  instock: number
  countSold: number
  group: string
}

export const useProductStore = defineStore('product', {
  state: () => ({
    groups: [] as (Group | string)[],
    promotions: [] as Promotion[],
    categories: [] as Category[],
    products: [] as Product[]
  }),

  getters: {
    // Get categories by group name
    getCategoriesByGroup: (state) => {
      return (groupName: string) =>
        state.categories.filter((category) => category.group === groupName)
    },

    // Get products by group name
    getProductsByGroup: (state) => {
      return (groupName: string) =>
        state.products.filter((product) => product.group === groupName)
    },

    // Get products by category ID
    getProductsByCategory: (state) => {
      return (categoryId: number) =>
        state.products.filter((product) => product.categoryId === categoryId)
    },

    // Get popular products (countSold > 10)
    getPopularProducts: (state) => {
      return state.products.filter((product) => product.countSold > 10)
    },

    // Get all group names for tabs
    getGroupNames: (state) => {
      if (state.groups.length === 0) return []

      // Handle both string array and object array
      if (typeof state.groups[0] === 'string') {
        return state.groups as string[]
      }
      return (state.groups as Group[]).map(g => g.name)
    }
  },

  actions: {
    async fetchCategories() {
      try {
        const response = await axios.get(`${BACKEND_URL}/api/categories`)
        this.categories = response.data.map((cat: Category) => ({
          ...cat,
          image: cat.image.startsWith('http') ? cat.image : `${BACKEND_URL}/${cat.image}`
        }))
        console.log('Categories loaded:', this.categories)
      } catch (error) {
        console.error('Error fetching categories:', error)
      }
    },

    async fetchPromotions() {
      try {
        const response = await axios.get(`${BACKEND_URL}/api/promotions`)
        this.promotions = response.data.map((promo: Promotion) => ({
          ...promo,
          image: promo.image.startsWith('http') ? promo.image : `${BACKEND_URL}/${promo.image}`
        }))
        console.log('Promotions loaded:', this.promotions)
      } catch (error) {
        console.error('Error fetching promotions:', error)
      }
    },

    async fetchGroups() {
      try {
        const response = await axios.get(`${BACKEND_URL}/api/groups`)
        this.groups = response.data
        console.log('Groups loaded:', this.groups)
      } catch (error) {
        console.error('Error fetching groups:', error)
      }
    },

    async fetchProducts() {
      try {
        const response = await axios.get(`${BACKEND_URL}/api/products`)
        this.products = response.data.map((prod: Product) => {
          // Backend returns image as JSON string: "[\"uploads/product/123.png\"]"
          let imagePath = prod.image

          // Parse JSON string to get actual path
          if (typeof imagePath === 'string' && imagePath.startsWith('[')) {
            try {
              const parsed = JSON.parse(imagePath)
              imagePath = parsed[0] || ''
            } catch (e) {
              console.error('Error parsing image:', e)
              imagePath = ''
            }
          }

          // Fix backslashes (Windows path separators)
          if (typeof imagePath === 'string') {
            imagePath = imagePath.replace(/\\/g, '/')
          }

          return {
            ...prod,
            image: imagePath ? `${BACKEND_URL}/${imagePath}` : ''
          }
        })
        console.log('Products loaded:', this.products)
      } catch (error) {
        console.error('Error fetching products:', error)
      }
    }
  }
})
