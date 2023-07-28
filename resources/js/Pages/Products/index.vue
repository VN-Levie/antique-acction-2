<template>
    <div>

        <Head title="Products" />
        <HomeLayout>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <span class="title_services">Products</span>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
                </div>
            </div>
            <div id="index-product" class="mt-4 max-w-[1200px] mx-auto px-2">
                <div class="grid xl:grid-cols-6 lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-4">
                    <div v-if="products" v-for="product in products" :key="product.id">
                        <div :id="`Products${product.id}`"
                            class="bg-white inline-block rounded hover:shadow-[0_0_10px_3px_rgba(0,0,0,0.15)] cursor-pointer">
                            <router-link :to="`/item/${product.id}`">
                                <img class="rounded-t" :src="product.url" :alt="product.name" />
                                <div id="ProductDetails">
                                    <span class="flex items-center justify-start gap-3 px-1 pt-1">
                                        <span class="text-[#FF6674] font-semibold">
                                            ${{ priceComputed(product.price) }}
                                        </span>
                                        <span class="text-black text-sm text-light line-through">
                                            ${{ oldPriceComputed(product.price) }}
                                        </span>

                                        <span class="px-1 relative -top-1.5 text-[FF6674] text-xs font-semibold">
                                            Extra 5%off
                                        </span>
                                    </span>
                                </div>
                                <span class=" bg-[#FD374F] text-white text-[9px] font-semibold px-1.5
                                            rounded-sm">Welcome Deal</span>
                                <div>
                                </div>
                            </router-link>

                        </div>
                    </div>
                </div>
            </div>
        </HomeLayout>
    </div>
</template>
  
<script setup>
import { Head } from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const priceComputed = (price) => {
    return (price / 100).toFixed(2);
};

const oldPriceComputed = (price) => {
    return ((price + (price / 20)) / 100).toFixed(2);
};

const products = ref([
    { id: 1, title: "Title 1", description: "This is a Descruption", url: "https://picsum.photos/id/7/800/800", price: 1001 },
    { id: 2, title: "Title 2", description: "This is a Descruption", url: "https://picsum.photos/id/71/800/800", price: 1002 },
    { id: 3, title: "Title 3", description: "This is a Descruption", url: "https://picsum.photos/id/72/800/800", price: 1003 },
    { id: 4, title: "Title 4", description: "This is a Descruption", url: "https://picsum.photos/id/73/800/800", price: 1004 },
    { id: 5, title: "Title 5", description: "This is a Descruption", url: "https://picsum.photos/id/74/800/800", price: 1005 },
    { id: 6, title: "Title 6", description: "This is a Descruption", url: "https://picsum.photos/id/75/800/800", price: 1006 },
    { id: 7, title: "Title 7", description: "This is a Descruption", url: "https://picsum.photos/id/76/800/800", price: 1007 },
    { id: 8, title: "Title 8", description: "This is a Descruption", url: "https://picsum.photos/id/77/800/800", price: 1008 },
    { id: 9, title: "Title 9", description: "This is a Descruption", url: "https://picsum.photos/id/78/800/800", price: 1009 },
    { id: 10, title: "Title 10", description: "This is a Descruption", url: "https://picsum.photos/id/79/800/800", price: 10010 },
])

</script>
  
<style>
.title_services {
    font-weight: 700;
    font-style: normal;
    font-family: "Libre Baskerville", serif;
    color: #292929;
    font-size: 55px;
    line-height: 1.4;
}

.services-card {
    width: 300px;
    height: 60px;
    margin: 30px 0 30px 0;
}

.services-card h2 {
    font-weight: 600;
    font-style: normal;
    font-family: "Montserrat", sans-serif;
    color: #292929;
    font-size: 16px;
    line-height: 1.4;
}

.services-card-img {
    width: 270px;
    height: 320px;
    margin: 20px 5px;
    background-size: cover;
}

@media (max-width: 768px) {
    .title_services {
        font-weight: 400px;
        font-size: 40px;
    }

    .services img {
        width: 200px;
    }

    .services-card {
        margin: 10px 0 10px 0;
    }

    .services {
        padding: 30px 0 0 0;
    }
}
</style>