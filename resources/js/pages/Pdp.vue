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

                    <div v-if="product.properties" class="pdp__properties">
                        <div
                            v-for="(property, type) in product.properties" :key="type"
                            class="pdp__property"
                        >
                            <div class="pdp__property-title">
                                <b>{{ capitalize(type) }}</b>
                            </div>
                            <div
                                v-for="(value, index) in property"
                                :key="`${type}-${index}`"
                                class="pdp__property-value"
                            >
                                <!-- Color swatch -->
                                <div
                                    v-if="type.toString() === 'color'"
                                    class="pdp__color-swatch"
                                    :style="{ backgroundColor: value }"
                                ></div>

                                <!-- Regular text value -->
                                <div v-else>
                                    {{ capitalize(value) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <Button :customClass="'button--primary'">
                        <span class="material-symbols-outlined button button">shopping_cart</span>
                        <span>Add to Cart</span>
                    </Button>

                    <p v-if="product.description">{{ product.description }}</p>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup lang="ts">
import { capitalize } from '@/lib/utils'
import BaseLayout from '../components/layouts/BaseLayout.vue';
import Price from '../components/products/Price.vue';
import Button from '../components/general/Button.vue';

interface Product {
    id: string,
    image: string
    title: string
    brand: string
    price: number
    discountedPrice?: number,
    description?: string,
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
.pdp__properties {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.pdp__property {
    display: flex;
    flex-wrap: wrap;
    row-gap: 0.2rem;
    column-gap: 1rem;
}
.pdp__property-title {
    flex-basis: 100%;
    font-size: 1.2rem;
}
.pdp__color-swatch {
    height: 1.5rem;
    width: 1.5rem;
    border-radius: 50%;
    box-shadow: inset 0px 0px 0px 4px var(--white);
    border: 1px solid var(--border-light);
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
