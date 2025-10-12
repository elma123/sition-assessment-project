<template>
    <button class="button" :class="customClass">
        <slot />
    </button>
</template>

<script setup lang="ts">
defineProps<{
    customClass?: string
}>();
</script>

<style scoped>
    .button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        padding: 0.5rem;
        color: var(--black);
        font-size: 1.2rem;
        font-weight: 500;
    }
    .button--primary {
        color: var(--white);
        background: var(--primary);
    }
    .button--secondary {
        background: var(--secondary);
    }
</style>
