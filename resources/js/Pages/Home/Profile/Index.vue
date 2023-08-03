<template>
    <Head title="profile" />
    <navbar />
    <div class="container rounded bg-white mt-5 mb-5">
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
                        <h4 class="text-right">Profile Settings</h4>
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
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input v-model="form.address1"
                                type="text" class="form-control"></div>
                        <div class="col-md-12"><label class="labels">Address Line 2</label><input v-model="form.address2"
                                type="text" class="form-control"></div>
                        <div class="col-md-12"><label class="labels">City</label><input v-model="form.city" type="text"
                                class="form-control">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input v-model="form.country" type="text"
                                class="form-control">
                        </div>
                        <div class="col-md-6"><label class="labels">Post Code</label><input v-model="form.postcode"
                                type="text" class="form-control"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import navbar from '..//Narbar.vue';

const form = useForm({
    country: usePage().props.user.addresses[0].country,
    name: usePage().props.auth.user.name,
    email: usePage().props.auth.user.email,
    phone: '123',
    address1: usePage().props.user.addresses[0].address1,
    address2: usePage().props.user.addresses[0].address2,
    city: usePage().props.user.addresses[0].city,
    postcode: usePage().props.user.addresses[0].postcode,
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