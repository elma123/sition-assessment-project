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
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background: linear-gradient(var(--white-transparant-80), var(--white-transparant-80)), url('@/assets/images/background.jpg') center / cover no-repeat;
}
.header {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    width: 100%;
    max-width: 1040px;
    margin: 0 auto;
    padding-inline: 1.25rem;
    background: var(--white);
    border-bottom: 1px solid var(--border-light);
}
.header.fixed {
    position: sticky;
    inset: 0 0 auto 0;
}
.page-content {
    display: grid;
    flex: 1;
    width: 100%;
    max-width: 1040px;
    margin: 0 auto;
    padding: 1rem;
    background: var(--white);
}
@media (max-width: 768px) {
    .header {
        background: var(--primary);
    }
}
</style>
