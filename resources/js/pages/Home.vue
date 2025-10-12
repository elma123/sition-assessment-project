<template>
    <BaseLayout>
        <div class="logo-wrapper">
            <img src="@/assets/images/logo.svg" alt="Sition logo">
        </div>
    </BaseLayout>
</template>

<script setup lang="ts">
import BaseLayout from '../components/layouts/BaseLayout.vue';
</script>

<style scoped>
    .logo-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>
