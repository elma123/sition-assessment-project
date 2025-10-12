<template>
    <BaseLayout>
        <div class="pdp">
            <div v-if="product.image" class="pdp__image-wrapper">
                <img :src="`https://assessement.sition.cloud/media/images/${product.image}`" :alt="product.title"
                    width="241" height="323" class="pdp__image">
            </div>
            <div class="pdp__main">
                <div class="pdp__content">
                    <div>
                        <h1 v-if="product.title" class="pdp__title">
                            {{ product.title }}
                        </h1>
                        <p v-if="product.brand" class="product__brand">{{ product.brand }}</p>
                    </div>

                    <Price :price="product.price" :sale="product.discountedPrice" large></Price>

                    <div v-if="product.properties">
                        <h3>Properties</h3>
                        <div v-for="(property, index) in product.properties" :key="index">
                            <div><b>{{ index }}</b></div>
                            <div v-for="(value, index) in property" :key="index">
                                <div>{{ value }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup lang="ts">
import BaseLayout from '../components/layouts/BaseLayout.vue';
import Price from '../components/products/Price.vue';

interface Product {
    id: string,
    image: string
    title: string
    brand: string
    price: number
    discountedPrice?: number,
    properties?: []
}

defineProps<{
    product: Product
}>();
</script>

<style scoped>
.pdp {
    height: 100%;
}

.pdp__image-wrapper {
    background: var(--base);
}

.pdp__image {
    height: 50vh;
    width: 100%;
    object-fit: contain;
}

.pdp__main {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 2rem;
    background: var(--base);
}
.pdp__content {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

@media (min-width: 768px) {
    .pdp {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    .pdp__main {
        padding-inline: 4rem;
    }
    .pdp__image {
        height: 100%;
    }
}
</style>
