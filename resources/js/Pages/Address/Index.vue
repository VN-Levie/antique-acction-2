<template>
    <Head title="Address" />
    <HomeLayout>

        <div class="mt-12"></div>

        <div class="max-w-[1000px] mx-auto text-3xl mb-10">Your Address</div>

        <div style="padding-bottom: 200px;">
            <div class="max-w-[1000px] mx-auto text-3xl flex gap-2 h-[270px]">
                <div class=" border border-dotted border-gray-400 rounded-md w-1/3">

                    <Link v-if="show" href="#">
                    <div
                        class="grid h-full place-items-center cursor-pointer relative w-full  justify-center items-center px-5 py-2.5 font-medium tracking-wide capitalize    focus:outline-none   transition duration-300 transform active:scale-95 ease-in-out">
                        <div class="text-center">
                            <div class="flex justify-center">
                                <PlusIcon :size="100" />
                            </div>
                            <div class="font-bold text-2xl">Add Address</div>
                        </div>
                    </div>
                    </Link>

                    <div v-else class="grid h-full place-items-center">
                        <div class="text-center">
                            <div class="font-bold text-2xl">
                                Address is added
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative border border-gray-400 rounded-md w-1/3 shadow-md ">
                    <div
                        class="flex items-center justify-center p-3 text-xs text-gray-600 font-extrabold border-b border-b-gray-400">
                        Default : My Address
                    </div>
                    <div class="text-sm font-extrabold px-4 pt-4">FirstName LastName</div>
                    <div class="text-sm px-4">
                        <div>address1</div>
                        <div>address2</div>
                        <div>CITY</div>
                        <div>POST CODE</div>
                        <div>COUNTRY</div>
                    </div>
                    <div class="px-4 absolute bottom-0 pb-4">
                        <Link href="#" class="text-teal-700 text-sm font-extrabold hover:underline hover:text-red-700">
                        Remove</Link>

                    </div>
                </div>
            </div>
        </div>


    </HomeLayout>
</template>


<script setup>
import { Head, Link } from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { toRefs } from 'vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue'

let show = true;
</script>
<style>
.text-sm1 {

    font-size: 0.875rem
        /* 14px */
    ;
    line-height: 1.25rem
        /* 20px */
    ;

}
</style>