<template>
    <section class="plp">
        <ProductCard
            v-for="product in products"
            :key="product.id"
            :product="product"
        />
    </section>
</template>

<script setup>
import ProductCard from './ProductCard.vue'

defineProps({
    products: Array
})
</script>

<style scoped>
.plp {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(288px, 100%), 1fr));
    gap: 20px;
}
</style>
