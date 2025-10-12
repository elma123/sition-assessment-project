<template>
    <BaseLayout>
        <div>
            <div v-if="product.image" class="product__image-wrapper">
                <img
                    :src="`https://assessement.sition.cloud/media/images/${product.image}`"
                    :alt="product.title"
                    width="241"
                    height="323"
                    class="product__image"
                >
            </div>
            <div>
                <div>
                    <p v-if="product.brand" class="product__brand">{{ product.brand }}</p>
                    <h2 v-if="product.title" class="product__title"><strong>{{ product.title }}</strong></h2>
                </div>

                <div class="product__price-wrapper">
                    <span v-if="product.discountedPrice" class="product__price product__price--discount">&euro; {{ product.discountedPrice }}</span>
                    <span v-if="product.price" class="product__price product__price--regular">&euro; {{ product.price }}</span>
                </div>

                <div v-if="product.properties">
                    <h3>Properties</h3>
                    <div
                        v-for="(property, index) in product.properties"
                        :key="index"
                    >
                        <div><b>{{ index }}</b></div>
                        <div v-for="value in property">
                            <div>{{ value }}</div>
                        </div>
                    </div>
                </div>
            </div>
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
    discountedPrice?: number,
    properties?: []
}

defineProps<{
    product: Product
}>();
</script>
