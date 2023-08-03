<template>
    <div class="cart">
        <h2>Cart</h2>
        <div v-if="cartItems.length === 0">Your cart is empty.</div>
        <div v-else>
            <CartItem v-for="item in cartItems" :key="item.id" :item="item" @remove="removeFromCart(item)" />
        </div>
        <button @click="placeOrder" :disabled="cartItems.length === 0">Place Order</button>
    </div>
</template>
  
<script setup>
import { ref } from 'vue';
import CartItem from './CartItem.vue';

const cartItems = ref([]);

const addToCart = (product) => {
    // Check if the product is already in the cart
    const existingItem = cartItems.value.find((item) => item.id === product.id);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cartItems.value.push({ ...product, quantity: 1 });
    }
};

const removeFromCart = (item) => {
    const index = cartItems.value.findIndex((cartItem) => cartItem.id === item.id);
    if (index !== -1) {
        cartItems.value.splice(index, 1);
    }
};

const placeOrder = () => {
    // Implement order placement logic here
    // You can use an API call to submit the order to the server
    console.log('Order placed:', cartItems.value);
    cartItems.value = []; // Clear the cart after placing the order
};
</script>
  
<style>
/* Add your cart styles here */
</style>