<template>
    <div class="cart-item">
        <div>{{ item.name }}</div>
        <div>Quantity: {{ item.quantity }}</div>
        <div>Price: ${{ item.price }}</div>
        <button @click="removeFromCart">Remove</button>
    </div>
</template>
  
<script setup>
import { defineProps } from 'vue';

const { item } = defineProps(['item']);

const removeFromCart = () => {
    // Emit an event to notify the parent component to remove the item from the cart
    emit('remove', item);
};
</script>
  
<style>
/* Add your cart item styles here */
</style>