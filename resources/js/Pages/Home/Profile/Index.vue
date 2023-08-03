<template>
    <Head title="profile" />
    <navbar />
    <div class="container rounded    bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 rounded-lg shadow border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{ $page.props.auth.user.name }}</span><span class="text-black-50">{{
                            $page.props.auth.user.email }}</span><span>
                    </span></div>
                <div class="mt-2 text-center">
                    <a :href="route('profile.edit')" class="btn btn-primary profile-button-edit">Edit
                        Profile
                    </a>
                </div>
            </div>
            <div class="col-md-5 rounded-lg shadow border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right text-[20px] font-extrabold">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input v-model="form.name" type="text"
                                class="form-control"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email ID</label><input v-model="form.email" type="text"
                                class="form-control"></div>
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input v-model="form.phone"
                                type="text" class="form-control"></div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 rounded-lg shadow border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right text-[20px] font-extrabold">Address Settings</h4>
                    </div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input v-model="form.address1"
                            type="text" class="form-control"></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input v-model="form.address2"
                            type="text" class="form-control"></div>
                    <div class="col-md-12"><label class="labels">City</label><input v-model="form.city" type="text"
                            class="form-control">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input v-model="form.country" type="text"
                                class="form-control">
                        </div>
                        <div class="col-md-6"><label class="labels">Post Code</label><input v-model="form.postcode"
                                type="text" class="form-control"></div>
                    </div>
                    <div class="mt-4 text-center">
                        <a :href="route('address.show')" class="btn btn-primary profile-button-edit">Edit
                            Address
                        </a>
                    </div>
                </div>
                <!-- <div v-else>

                    <Link :href="route('address.show')">
                    <div
                        class="grid h-full place-items-center cursor-pointer relative w-full justify-center items-center px-5 py-2.5 font-medium tracking-wide capitalize focus:outline-none transition duration-300 transform active:scale-95 ease-in-out">
                        <div class="text-center border  border-gray-400" style=" margin-top:94px">
                            <div class="flex justify-center">
                                <PlusIcon :size="100" />
                            </div>
                            <div class="font-bold text-2xl">Add Address</div>
                        </div>
                    </div>
                    </Link>

                </div> -->
            </div>
        </div>
    </div>
</template>
<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import PlusIcon from 'vue-material-design-icons/Plus.vue';
import navbar from '..//Narbar.vue';
const props = defineProps(['userAddresses', 'userName']);
let country = null;
let address1 = null;
let address2 = null;
let city = null;
let postcode = null;
if (usePage().props.user.addresses[0] !== undefined) {
    country = usePage().props.user.addresses[0].country;
    address1 = usePage().props.user.addresses[0].address1;
    address2 = usePage().props.user.addresses[0].address2;
    city = usePage().props.user.addresses[0].city;
    postcode = usePage().props.user.addresses[0].postcode;
}
const form = useForm({

    country: country,
    name: usePage().props.auth.user.name,
    email: usePage().props.auth.user.email,
    phone: usePage().props.auth.user.phoneNumber,
    address1: address1,
    address2: address2,
    city: city,
    postcode: postcode,
});
</script>
<style>
.profile-button-edit {
    background: rgb(235, 31, 12);
    box-shadow: none;
    border: none
}

.profile-button-edit {
    background: rgb(234, 44, 44);
    box-shadow: none;
    border: none
}


.profile-button-edit:hover {
    background: #3b46ea
}


.labels {
    font-size: 11px
}
</style>