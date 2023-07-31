<template>
    <div>


        <Head title="Address" />
        <HomeLayout>
            <div class="bg-gray-100" style="padding-bottom:100px">
                <div class="md:flex m-auto media-address-form md:max-w-2xl">
                    <div>
                        <div class="mt-8 bg-white rounded-lg shadow">
                            <div class="flex">
                                <div class="flex-1 py-5 pl-5 overflow-hidden">
                                    <h1 class="text-2xl font-extrabold leading-none text-center">Add New Address</h1>
                                </div>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="px-5 pb-5">

                                    <input v-model="form.name" placeholder="Name"
                                        class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        required>
                                    <input v-model="form.address1" placeholder="Address Line 1"
                                        class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        required>
                                    <input v-model="form.address2" placeholder="Address Line 2"
                                        class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        required>
                                    <div>
                                        <select v-model="form.country" name="Country" id=""
                                            class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 ">
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Cam Pu Chia">Cam Pu Chia</option>

                                        </select>

                                    </div>

                                    <div class="flex">
                                        <div class="flex-grow w-1/4 pr-2">
                                            <input v-model="form.postcode" placeholder="Post Code"
                                                class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                                required>
                                        </div>
                                        <div class="flex-grow">
                                            <input v-model="form.city" placeholder="City"
                                                class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-4">
                                <div class="flex flex-row-reverse p-3">
                                    <div class="flex-initial pl-3">
                                        <button type="submit"
                                            class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize bg-yellow-500 rounded-md hover:bg-black focus:outline-none transition duration-300 transform active:scale-95 ease-in-out">
                                            <span class="pl-2 mx-1">Save</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </HomeLayout>
    </div>
</template>
  
<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { toRefs } from 'vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue';


const form = useForm({
    country: 'United Kingdom',
    name: 'vi',
    address1: '',
    address2: '',
    city: '',
    postcode: '',
});


const submit = () => {
    form.post(route('address_options.store'), {
        onFinish: () => route('address.index'),
    })
}


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

@media (max-width: 1024px) {
    .media-address-form-pc {
        width: 40%;
    }
}

@media (max-width: 480px) {
    .media-address-form {
        width: 90%;
    }
}
</style>