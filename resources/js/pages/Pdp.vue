<template>
    <BaseLayout>
        <div>
        <h1>{{ product.title }}</h1>
        <p>{{ product.brand }}</p>
    </div>
    </BaseLayout>
</template>

<script setup lang="ts">
import BaseLayout from '../components/layouts/BaseLayout.vue';

interface Product {
    id: string,
    image: string
    title: string
    brand: string
    price: number
    discountedPrice?: number
}

const props = defineProps<{
    product: Product
}>();
</script>
