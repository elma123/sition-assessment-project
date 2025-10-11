<template>
    <section class="plp">
        <ProductCard
            v-for="(product, index) in products"
            :key="index"
            :product="product"
        />
    </section>
</template>

<script setup lang="ts">
import ProductCard from './ProductCard.vue'

interface Product {
    id: string,
    image: string
    title: string
    brand: string
    price: number
    discountedPrice?: number
}

const props = defineProps<{
    products: Product[]
}>();
</script>

<style scoped>
.plp {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(288px, 100%), 1fr));
    gap: 1.25rem;
}
</style>
