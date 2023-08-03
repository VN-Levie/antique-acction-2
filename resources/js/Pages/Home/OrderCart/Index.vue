<template>
    <div>
        <Navbar />
        <div class="bg-gray-1001" style="padding-bottom: 100px">
            <div class="md:flex m-auto media-address-form1 md:max-w-2xl">
                <div>
                    <div class="mt-8 bg-white1 rounded-lg shadow">
                        <div class="flex">
                            <div class="flex-1 py-5 pl-5 overflow-hidden">
                                <h1 class="text-2xl1 font-extrabold leading-none text-center">My Odered</h1>
                            </div>
                        </div>
                        <form>
                            <h1 class="text-xl1 font-semibold mb-4">List of Ordered Products</h1>
                            <ul class="list-disc pl-6">
                                <li v-for="(product, index) in orderedProducts" :key="product.id" class="mb-2">
                                    {{ index + 1 }}. {{ product.name }} ({{ product.price }} USD)
                                </li>
                            </ul>

                            <div class="payment-section mt-8 p-4 bg-gray-200 rounded-lg">
                                <h2 class="text-xl1 font-semibold mb-2">Payment</h2>
                                <p>Total Amount: {{ totalAmount }} USD</p>
                                <button @click="processPayment"
                                    class="mt-4 px-6 py-2 bg-blue-6001 text-white rounded-md1 hover:bg-blue-7001">
                                    Process Payment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 
  
<script setup>
import Navbar from '../Narbar.vue'
import { ref } from 'vue';

const orderedProducts = ref([
    { id: 1, name: 'Product A', price: 10 },
    { id: 2, name: 'Product B', price: 20 },
    { id: 3, name: 'Product C', price: 15 },
    // Add more products as needed
]);

const totalAmount = ref(0);

// Calculate the total amount from ordered products
orderedProducts.value.forEach(product => {
    totalAmount.value += product.price;
});

const processPayment = () => {
    // Implement your payment processing logic here
    alert('Payment processed successfully!');
};
</script>
  
<style>
/* Navbar styles */
/* Replace with your Navbar styles if applicable */

/* Container styles */
.bg-gray-1001 {
    min-height: 100vh;
}

/* Form styles */
.media-address-form1 {
    justify-content: center;
}

/* Card styles */
.bg-white1 {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

/* Heading styles */
.text-2xl1 {
    font-size: 1.5rem;
}

/* List styles */
.text-xl1 {
    font-size: 1.25rem;
}

/* Payment section styles */
.bg-gray-2001 {
    background-color: #f3f4f6;
}

.text-xl1 {
    font-size: 1.25rem;
}

/* Button styles */
.bg-blue-6001 {
    background-color: #2563eb;
}

.hover:bg-blue-7001:hover {
    background-color: #1d4ed8;
}

.rounded-md1 {
    border-radius: 0.375rem;
}
</style>