<template>
    <div class="product">
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
            <p v-if="product.brand" class="product__brand">{{ product.brand }}</p>
            <h2 v-if="product.title" class="product__title"><strong>{{ product.title }}</strong></h2>
        </div>

        <div class="product__price-wrapper">
            <span v-if="product.discountedPrice" class="product__price product__price--discount">&euro; {{ product.discountedPrice }}</span>
            <span v-if="product.price" class="product__price product__price--regular">&euro; {{ product.price }}</span>
        </div>

        <!-- <div v-if="product.properties">
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
        </div> -->

        <!-- <div v-if="product.categories">
            <h3>Categories</h3>
            <div
                v-for="(category, index) in product.categories"
                :key="index"
            >
                <div>{{ category }}</div>
            </div>
        </div> -->
    </div>
</template>

<script setup lang="ts">
defineProps({
    product: Object
})
</script>

<style scoped>
.product {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}
.product__image-wrapper {
    aspect-ratio: 1;
    overflow: hidden;
    background: #F9F9F9;
}
.product__image {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.product__brand {
    font-weight: 300;
}
.product__title {
    font-weight: 500;
}
.product__price-wrapper {
    display: flex;
    gap: 1rem;
}
.product__price--discount {
    font-weight: 300;
    text-decoration: line-through;
}
.product__price--regular {
    font-weight: 400;
    color: #FF3A46;
}
</style>
