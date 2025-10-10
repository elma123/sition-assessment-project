<template>
    <button class="shopping-cart">
        <span class="material-symbols-outlined shopping-cart__icon">shopping_cart</span>
        <span class="shopping-cart__text">Cart</span>
    </button>
</template>

<style scoped>
    .shopping-cart {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
        padding: 0.5rem;
        border: none;
        box-shadow: none;
    }
    .shopping-cart__icon {
        color: #FF7A82;
    }
    .shopping-cart__text {
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        line-height: 1;
    }
    @media (max-width: 768px) {
        .shopping-cart {
            display: none;
        }
    }
</style>
