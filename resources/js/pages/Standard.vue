<template>
    <BaseLayout>
        <div>
            <h1>{{ title }}</h1>
        </div>
    </BaseLayout>
</template>

<script setup lang="ts">
import BaseLayout from '../components/layouts/BaseLayout.vue';

defineProps<{
    title: String
}>();
</script>
