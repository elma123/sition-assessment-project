<template>
    <nav class="navigation scroll-container" ref="scrollContainer">
        <ul class="navigation__list">
            <li
                v-for="(category, index) in categories"
                :key="index"
                class="navigation__item"
            >
                <a
                    :href="`/${category}/`"
                    class="navigation__link"
                    :class="{
                        active: $page.url.replace(/\/$/, '') === `/${category}`
                    }"
                >
                    {{ category }}
                </a>
            </li>
            <li
                v-for="(item, index) in items"
                :key="index"
                class="navigation__item"
            >
                <a :href="`/${item.toLowerCase()}`" class="navigation__link">{{ item }}</a>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';

// To track changes in the product categories and update menu items
const categories = ref<string[]>([])

// Fetch product data only after the component is fully rendered
onMounted(async () => {
    try {
        const res = await fetch('/proxy/product/categories');
        const data: { categories?: string[] } = await res.json();
        categories.value = data.categories ?? [];
    } catch (error) {
        console.error('Failed to load product categories', error);
    }
});

// Static navigation items
const items = ref<string[]>([
    'Sale', 'Blog', 'Brands', 'Account'
]);

// Make navigation scrollable on desktop and mobile, after the component is fully rendered
const scrollContainer = ref<HTMLElement | null>(null);

onMounted(() => {
    const nav = scrollContainer.value as HTMLElement;
    let isDown: boolean = false;
    let initCursorPos: number = 0;
    let scrollLeft: number = 0;

    const pageX = (e: MouseEvent | TouchEvent): number => {
        if (e instanceof TouchEvent) {
            return e.touches[0]?.pageX || 0;
        } else {
            return e.pageX;
        }
    };

    const startScroll = (e: MouseEvent | TouchEvent) => {
        isDown = true;
        nav.classList.add('active');
        initCursorPos = pageX(e) - nav.offsetLeft;
        scrollLeft = nav.scrollLeft;
    };

    const stopScroll = () => {
        isDown = false;
        nav.classList.remove('active');
    };

    const onScroll = (e: MouseEvent | TouchEvent) => {
        if (!isDown) return;
        e.preventDefault();
        const currentCursorPos = pageX(e) - nav.offsetLeft;
        const moved = currentCursorPos - initCursorPos;
        nav.scrollLeft = scrollLeft - moved;
    };

    nav.addEventListener('mousedown', startScroll);
    nav.addEventListener('mouseup', stopScroll);
    nav.addEventListener('mouseleave', stopScroll);
    nav.addEventListener('mousemove', onScroll);

    nav.addEventListener('touchstart', startScroll, { passive: true }); // passive: true is needed for not to call preventDefault - improves scroll performance
    nav.addEventListener('touchend', stopScroll);
    nav.addEventListener('touchcancel', stopScroll);
    nav.addEventListener('touchmove', onScroll);
});
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
.navigation__link.active
{
    color: #FC969C;
}
.navigation__link.active {
    border-bottom: 3px solid #FC969C;
}
.scroll-container {
    cursor: grab;
}
.scroll-container.active {
    cursor: grabbing;
    cursor: -webkit-grabbing;
}
@media (max-width: 768px) {
    .navigation__link:hover,
    .navigation__link.active
    {
        color: #FFFFFF;
    }
    .navigation__link.active {
        border-bottom: 3px solid #FFFFFF;
    }
}
</style>
