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
                                    <MenuButton
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                        Sort
                                        <ChevronDownIcon
                                            class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                            aria-hidden="true" />
                                    </MenuButton>
                                </div>
                                <Menu>
                                <transition enter-active-class="transition ease-out duration-100"
                                    enter-from-class="transform opacity-0 scale-95"
                                    enter-to-class="transform opacity-100 scale-100"
                                    leave-active-class="transition ease-in duration-75"
                                    leave-from-class="transform opacity-100 scale-100"
                                    leave-to-class="transform opacity-0 scale-95">
                                    <MenuItems
                                        class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <div class="py-1">
                                            <MenuItem v-for="option in sortOptions" :key="option.name" v-slot="{ active }">
                                            <a :href="option.href"
                                                :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">{{
                                                    option.name }}</a>
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>

                            <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                                <span class="sr-only">View grid</span>
                                <Squares2X2Icon class="h-5 w-5" aria-hidden="true" />
                            </button>
                            <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                                @click="mobileFiltersOpen = true">
                                <span class="sr-only">Filters</span>
                                <FunnelIcon class="h-5 w-5" aria-hidden="true" />
                            </button>
                        </div>
                    </div>

                    <section aria-labelledby="products-heading" class="pb-24 pt-6">
                        <h2 id="products-heading" class="sr-only">Products</h2>

                        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                            <!-- Filters -->
                            <form class="hidden lg:block">
                                <h3 class="sr-only">Categories</h3>
                                <ul role="list"
                                    class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                                    <li v-for="category in $page.props.categories" :key="category">
                                        <a href="#">{{ category.name }}</a>
                                    </li>
                                </ul>
                                <Disclosure as="div" v-for="section in filters" :key="section.id"
                                    class="border-b border-gray-200 py-6" v-slot="{ open }">
                                    <h3 class="-my-3 flow-root">
                                        <DisclosureButton
                                            class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                                            <span class="font-medium text-gray-900">{{ section.name }}</span>
                                            <span class="ml-6 flex items-center">
                                                <PlusIcon v-if="!open" class="h-5 w-5" aria-hidden="true" />
                                                <MinusIcon v-else class="h-5 w-5" aria-hidden="true" />
                                            </span>
                                        </DisclosureButton>
                                    </h3>
                                    <DisclosurePanel class="pt-6">
                                        <div class="space-y-4">
                                            <div v-for="(option, optionIdx) in section.options" :key="option.value"
                                                class="flex items-center">
                                                <input :id="`filter-${section.id}-${optionIdx}`" :name="`${section.id}[]`"
                                                    :value="option.value" type="checkbox" :checked="option.checked"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                                <label :for="`filter-${section.id}-${optionIdx}`"
                                                    class="ml-3 text-sm text-gray-600">{{ option.label }}</label>
                                            </div>
                                        </div>
                                    </DisclosurePanel>
                                </Disclosure>
                            </form>

                            <!-- Product grid -->
                            <div class="lg:col-span-3">
                                <article class="row m-2" v-for="product in products" :key="product.id">
                                    <div class="col-md-3">
                                        <figure class="">
                                            <a href="#"><img :src="product.images" alt="aaa" /></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="alith_post_title">
                                            <a href="">{{ product.description }}</a>
                                        </h3>
                                    </div>
                                </article>

                                <!-- Your content -->
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </HomeLayout>
</template>
  
<script setup>
import { Head } from '@inertiajs/vue3'
import HomeLayout from '@/Layouts/HomeLayout.vue'
import { ref, onMounted } from 'vue'
import axios from 'axios'
// import {
//     Dialog,
//     DialogPanel,
//     Disclosure,
//     DisclosureButton,
//     DisclosurePanel,
//     Menu,
//     MenuButton,
//     MenuItem,
//     MenuItems,
//     TransitionChild,
//     TransitionRoot,
// } from '@headlessui/vue'
// import { ChevronDownIcon, FunnelIcon, MinusIcon, PlusIcon, Squares2X2Icon } from '@heroicons/vue/20/solid'

const products = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/api/products');
        products.value = response.data;
    } catch (error) {
        console.error(error);
    }
});

const sortOptions = [
    { name: 'Most Popular', href: '#', current: true },
    { name: 'Best Rating', href: '#', current: false },
    { name: 'Newest', href: '#', current: false },
    { name: 'Price: Low to High', href: '#', current: false },
    { name: 'Price: High to Low', href: '#', current: false },
]

const filters = [
    {
        id: 'color',
        name: 'Color',
        options: [
            { value: 'white', label: 'White', checked: false },
            { value: 'beige', label: 'Beige', checked: false },
            { value: 'blue', label: 'Blue', checked: true },
            { value: 'brown', label: 'Brown', checked: false },
            { value: 'green', label: 'Green', checked: false },
            { value: 'purple', label: 'Purple', checked: false },
        ],
    },

    {
        id: 'size',
        name: 'Size',
        options: [
            { value: '2l', label: '2L', checked: false },
            { value: '6l', label: '6L', checked: false },
            { value: '12l', label: '12L', checked: false },
            { value: '18l', label: '18L', checked: false },
            { value: '20l', label: '20L', checked: false },
            { value: '40l', label: '40L', checked: true },
        ],
    },
]

const mobileFiltersOpen = ref(false)
</script>