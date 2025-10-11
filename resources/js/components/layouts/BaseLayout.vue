<template>
    <Head>
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="page-wrapper">
        <header class="header fixed">
            <Navigation />
            <ShoppingCart />
        </header>
        <main class="page-content">
            <slot />
        </main>
    </div>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navigation from '../menu/Navigation.vue';
import ShoppingCart from '../menu/ShoppingCart.vue';
</script>

<style scoped>
.page-wrapper {
    display: grid;
    grid-template-rows: auto 1fr;
    min-height: 100vh;
    background: linear-gradient(#FFFFFFCC, #FFFFFFCC), url('@/assets/images/background.jpg') center / cover no-repeat;
}
.header {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    max-width: 1040px;
    margin: 0 auto;
    padding-inline: 1.25rem;
    background: #FFFFFF;
    border-bottom: 1px solid #E4E4E4;
}
.header.fixed {
    position: sticky;
    inset: 0 0 auto 0;
}
.page-content {
    width: 100%;
    max-width: 1040px;
    margin: 0 auto;
    padding: 1rem;
    background: #FFFFFF;
}
@media (max-width: 768px) {
    .header {
        background: #FC969C;
    }
}
</style>
