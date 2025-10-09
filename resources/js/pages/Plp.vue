<template>
    <Head title="PLP">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="plp-page-background">
        <main class="plp-page">
            <ProductList :products="products" />
        </main>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import ProductList from '../components/products/ProductList.vue';

/* To track changes in the product data and update product list */
const products = ref([]);

/* Fetch product data only after the component is fully rendered */
onMounted(async () => {
    try {
        const res = await fetch('/proxy/products');
        const data = await res.json();
        products.value = data.products || [];
    } catch (error) {
        console.error('Failed to load products', error);
    }
})
</script>

<style scoped>
.plp-page-background {
    background: linear-gradient(#FFFFFFCC, #FFFFFFCC), url('@/assets/images/background.jpg') center / cover no-repeat;
    min-height: 100vh;
}
.plp-page {
    max-width: 1040px;
    margin: 0 auto;
    padding: 16px;
    background: #FFFFFF;
}
</style>
