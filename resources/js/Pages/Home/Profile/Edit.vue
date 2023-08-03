<template>
    <Head title="profile" />
    <navbar />
    <div>
        <div class="container rounded bg-white mt-5 mb-5">
            <!---->
            <div class="row">
                <div class="col-md-3 border-right">

                </div>
                <!---->
                <div class=" rounded-lg shadow col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!--Profrofle Edit-->
                            <h4 class="text-right font-extrabold text-[30px]">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input v-model="form.name" type="text"
                                    class="form-control"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email ID</label><input v-model="form.email"
                                    type="text" class="form-control"></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    class="form-control"></div>

                        </div>
                        <div class="row mt-10">
                            <div class="col-md-3"><button class="btn btn-primary profile-button" type="button">Save
                                    Profile</button></div>
                            <div class="col-md-6"><a :href="route('profile.index')"
                                    class="btn btn-primary profile-button-cancel" type="button">Cancel</a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">

                </div>
                <div class="col-md-5 rounded-lg shadow border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!--Profrofle Edit-->
                            <h4 class="text-right font-extrabold text-[30px]">Password Setting</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels"> Old Password</label><input type="text"
                                    class="form-control"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">New Password</label><input type="text"
                                    class="form-control"></div>
                            <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="text"
                                    class="form-control"></div>

                        </div>
                        <div class="row mt-10">
                            <div class="col-md-3"><button class="btn btn-primary profile-button" type="button">Save
                                    Profile</button></div>
                            <div class="col-md-6"><a :href="route('profile.index')"
                                    class="btn btn-primary profile-button-cancel" type="button">Cancel</a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                </div>
                <div class="col-md-5 rounded-lg shadow border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!--Profrofle Edit-->
                            <h4 class="text-right font-extrabold text-[30px]">Address Settings</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Address Line 1:</label><input
                                    v-model="form.address1" type="text" class="form-control"></div>
                            <div class="col-md-12"><label class="labels">Address Line 2:</label><input
                                    v-model="form.address2" type="text" class="form-control"></div>
                            <div class="col-md-12"><label class="labels">City</label><input v-model="form.city" type="text"
                                    class="form-control">
                            </div>
                            <div class="col-md-12"><label class="labels">Country</label><input v-model="form.country"
                                    type="text" class="form-control">
                            </div>
                            <div class="col-md-12"><label class="labels">PostCode</label><input v-model="form.postcode"
                                    type="text" class="form-control"></div>

                        </div>
                        <div class="row mt-10">
                            <div class="col-md-3"><button class="btn btn-primary profile-button" type="button">Save
                                    Profile</button></div>
                            <div class="col-md-6"><a :href="route('profile.index')"
                                    class="btn btn-primary profile-button-cancel" type="button">Cancel</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                </div>
                <div class="col-md-5 rounded-lg shadow border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!--Profrofle Edit-->
                            <h4 class="text-right font-extrabold text-[30px]">Delete Account</h4>
                        </div>

                        <div class="row mt-10">
                            <div class="col-md-3"><button class="btn btn-danger profile-button-delete" type="button">Delete
                                    Profile</button></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import Navbar from '../Narbar.vue'
import { toRefs } from 'vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue';



const user = usePage().props.auth.user;
const userAddresses = usePage().props.user.addresses;

const form = useForm({
    country: userAddresses?.[0]?.country,
    name: user.name,
    email: user.email,
    phone: '123',
    address1: user.addresses[0].address1,
    address2: user.addresses[0].address2,
    city: user.addresses[0].city,
    postcode: userAddresses?.[0]?.postcode,
});


const submit = () => {
    form.post(route('profie.store'), {
        onFinish: () => route('profile.index'),
    })
}


</script>
<style>
.profile-button-cancel {
    background: rgb(245, 94, 80);
    box-shadow: none;
    border: none
}

.profile-button-delete {
    background: rgb(244, 34, 2);
    box-shadow: none;
    border: none
}

.profile-button {
    background: rgb(58, 206, 100);
    box-shadow: none;
    border: none
}

.profile-button-cancel {
    background: rgb(156, 159, 157);
    color: black;
    box-shadow: none;
    border: none
}

.profile-button-cancel:hover {
    background: #bb3a3a
}


.labels {
    font-size: 11px
}
</style>