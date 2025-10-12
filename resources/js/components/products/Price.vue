<template>
    <div class="price-wrapper">
        <span
            v-if="sale"
            class="price price--discount"
            :class="{ 'price--large': large }"
        >
            {{ sale }}
        </span>
        <span
            v-if="price"
            class="price price--regular"
            :class="{ 'price--large': large }"
        >
            {{ price }}
        </span>
    </div>
</template>

<script setup lang="ts">
interface Props {
    price: number;
    sale?: number;
    large?: boolean;
}

const props = defineProps<Props>();
const large = props.large ?? false;
</script>

<style scoped>
.price-wrapper {
    display: flex;
    gap: 1rem;
}
.price--large {
    font-size: 2rem;
}
.price--discount {
    font-weight: 300;
    text-decoration: line-through;
}
.price--regular {
    font-weight: 400;
}
.price--discount + .price--regular {
    color: var(--alert);
}
</style>
