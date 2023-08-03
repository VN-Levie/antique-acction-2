<template>
    <div>

        <Head title="Address" />
        <HomeLayout>
            <div class="container">
                <div class="mt-12"></div>
                <div class="max-w-[1000px] mx-auto text-3xl mb-10">Your Address</div>
                <div style="padding-bottom: 200px;">
                    <div class="max-w-[1000px] mx-auto text-3xl flex gap-2 h-[270px]">
                        <div class="border border-dotted border-gray-400 rounded-md w-1/3">
                            <Link :href="route('address.show')" v-if="!userAddresses.length">
                            <div
                                class="grid h-full place-items-center cursor-pointer relative w-full justify-center items-center px-5 py-2.5 font-medium tracking-wide capitalize focus:outline-none transition duration-300 transform active:scale-95 ease-in-out">
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
                                    <div class="font-bold text-2xl">Address is added</div>
                                </div>
                            </div>
                        </div>
                        <div v-if="userAddresses.length"
                            class=" relative border border-gray-400 rounded-md w-1/3 shadow-md">
                            <div
                                class="flex items-center justify-center p-3 text-xs text-gray-600 font-extrabold border-b border-b-gray-400">
                                Default: My Address
                            </div>
                            <div class="text-sm font-extrabold px-4 pt-4">{{ $page.props.auth.user.name }}</div>
                            <div class="text-sm px-4">
                                <div v-for=" address  in  userAddresses " :key="address.id" class="py-1">
                                    <div class="text-sm">Address Line 1: <span>{{ address.address1 }}</span>
                                    </div>
                                    <div class="text-sm">Address Line 2: <span>{{ address.address2 }}</span></div>
                                    <div class="text-sm">Post Code: <span>{{ address.postcode }}</span></div>
                                    <div class="text-sm">City: <span>{{ address.city }}</span></div>
                                    <div class="text-sm">Country: <span>{{ address.country }}</span></div>
                                </div>
                            </div>
                            <div class="px-4 absolute bottom-0 pb-4">
                                <Link v-for=" address  in  userAddresses " :key="address.id"
                                    :href="route('address.destroy', { id: address.id })" method="delete" as="button"
                                    class="text-teal-700 text-sm hover:text-red-700 font-extrabold hover:underline">
                                Remove
                                </Link>
                            </div>
                        </div>
                        <div v-else>
                            No address
                        </div>
                    </div>
                </div>
            </div>
        </HomeLayout>
    </div>
</template>
  
<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue';
import { defineProps } from 'vue';
const props = defineProps(['userAddresses', 'userName']);

const submit = () => {
    form.post(route('address.destroy'), {
        onFinish: () => route('address.index'),
    })
}
</script>
  
<style>
.text-sm1 {
    font-size: 0.875rem;
    line-height: 1.25rem;
}
</style>