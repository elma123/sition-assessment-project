<template>
    <BaseLayout>
        <ProductList :products="products" />
    </BaseLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import BaseLayout from '../components/layouts/BaseLayout.vue';
import ProductList from '../components/products/ProductList.vue';

// To track changes in the product data and update product list
const products = ref([]);

// Fetch product data only after the component is fully rendered
onMounted(async () => {
    try {
        const res = await fetch('/proxy/products');
        const data = await res.json();
        products.value = data.products || [];
    } catch (error) {
        console.error('Failed to load products', error);
    }
});
</script>
