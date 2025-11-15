import { defineStore } from 'pinia'
import axios from 'axios'

const BACKEND_URL = 'http://localhost:3000'

// Export interfaces if used outside
 interface Category {
  group: string
  name: string
  productCount: number
  image: string
  color: string
}

 interface Promotion {
  title: string
  color: string
  image: string
  buttonColor: string
}

 interface Group {
  name: string
}

 interface Product {
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
    groups: [] as Group[],
    promotions: [] as Promotion[],
    categories: [] as Category[],
    products: [] as Product[]
  }),

  actions: {
    async fetchCategories() {
      try {
        const response = await axios.get(`${BACKEND_URL}/api/categories`)
        this.categories = response.data.map((cat: Category) => ({
          ...cat,
          image: `${BACKEND_URL}/${cat.image}`
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
          image: `${BACKEND_URL}/${promo.image}`
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
        this.products = response.data.map((prod: Product) => ({
          ...prod,
          image: `${BACKEND_URL}/${prod.image}`
        }))
        console.log('Products loaded:', this.products)
      } catch (error) {
        console.error('Error fetching products:', error)
      }
    }
  }
})
