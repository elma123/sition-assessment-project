<template>
    <nav class="navigation">
        <ul class="navigation__list">
            <li
                v-for="category in categories"
                :category="category"
                class="navigation__item"
            >
                <a href="#" class="navigation__link" :class="{ 'navigation__link--active': category === 'new' }">{{ category }}</a>
            </li>
            <li class="navigation__item">
                <a href="#sale" class="navigation__link">Sale</a>
            </li>
            <li class="navigation__item">
                <a href="#blog" class="navigation__link">Blog</a>
            </li>
            <li class="navigation__item">
                <a href="#brands" class="navigation__link">Brands</a>
            </li>
            <li class="navigation__item">
                <a href="#account" class="navigation__link">Account</a>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';

/* To track changes in the product categories and update menu items */
const categories = ref([]);

/* Fetch product data only after the component is fully rendered */
onMounted(async () => {
    try {
        const res = await fetch('/proxy/product/categories');
        const data = await res.json();
        categories.value = data.categories || [];
    } catch (error) {
        console.error('Failed to load product categories', error);
    }
})
</script>

<style scoped>
.navigation {
    overflow: hidden;
}
.navigation__list,
.navigation__item,
.navigation__link {
    display: flex;
    height: 100%;
    align-items: center;
}
.navigation__list {
    gap: 2rem;
}
.navigation__link {
    padding-block: 1rem;
    font-weight: 700;
    text-transform: uppercase;
}
.navigation__link:hover,
.navigation__link--active
{
    color: #FC969C;
}
.navigation__link--active {
    border-bottom: 3px solid #FC969C;
}
</style>
