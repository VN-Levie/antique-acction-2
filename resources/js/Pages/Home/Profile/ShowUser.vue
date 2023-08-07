<template>
    <h1>{{ $page.props.user }}</h1>

    <Head title="profile" />
    <navbar />
    <!--Click Verrifation-->
    <div v-if="$page.props.auth.user.email_verified_at == null">
        <!-- <form @submit.prevent="submit">
            <div class="mt-4 font-extrabold text-red-700 hover:text-blue-500 flex items-center justify-center">Account not
                Active ! Please click
                this->

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Active Email
                </PrimaryButton>
            </div>
        </form> -->
        <form @submit.prevent="submit">
            <div class="mt-4 alert alert-danger text-red-600 hover:text-blue-800 flex items-center justify-center">
                We have already sent you the verification link. Please check your email or click here to resend the link ->
                <PrimaryButton :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing || verificationLinkSent" @click="sendVerificationLink">
                    {{ buttonText }}
                </PrimaryButton>
            </div>
        </form>
    </div>
    <div class="row p-3 gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img :src="$page.props.auth.user.profile_photo_url" alt="Admin" class="rounded-circle" width="150">

                        <div class="mt-3">

                            <div class="mt-3" v-if="$page.props.user.kyc == null">
                                <h4 class="font-extrabold">{{ $page.props.auth.user.name }} <i class="fa fa-times"
                                        aria-hidden="true"></i></h4>
                            </div>
                            <div class="" v-else>
                                <h4 class="font-extrabold">{{ $page.props.auth.user.name }}<i class="fa fa-check-circle-o"
                                        aria-hidden="true"></i></h4>
                            </div>
                            <div v-if="$page.props.user.addresses[0] !== undefined">
                                <p class="text-muted font-size-sm pb-3"> <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    {{
                                        address1 }}, {{ address2 }}, {{ city }}</p>
                            </div>
                            <div v-else>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> No address
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Social-->
            <!-- <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>Website</h6>
                        <span class="text-secondary">https://bootdey.com</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>Github</h6>
                        <span class="text-secondary">bootdey</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                </path>
                            </svg>Twitter</h6>
                        <span class="text-secondary">@bootdey</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>Instagram</h6>
                        <span class="text-secondary">bootdey</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>Facebook</h6>
                        <span class="text-secondary">bootdey</span>
                    </li>
                </ul>
            </div> -->
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 p-3">
                            <h6 class="mb-0 font-extrabold">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary p-2">
                            {{ $page.props.auth.user.name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 p-3">
                            <h6 class="mb-0 font-extrabold">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary p-3">
                            {{
                                $page.props.auth.user.email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 p-3">
                            <h6 class="mb-0 font-extrabold">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary p-2 ">
                            {{ $page.props.auth.user.phoneNumber }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 p-3">
                            <h6 class="mb-0 font-extrabold">Address</h6>
                        </div>
                        <div v-if="$page.props.user.addresses[0] !== undefined" class="col-sm-9 text-secondary p-2">
                            {{ address1 }}, {{ address2 }}, {{ city }}
                        </div>

                        <div v-if="!$page.props.auth.user.email_verified_at" class=" block col-sm-9 text-secondary p-2 ">
                            <i class=" fa fa-exclamation-triangle" aria-hidden="true"></i> You need to activate your
                            account
                            to add
                            an
                            address
                        </div>
                        <div v-else-if="!$page.props.user.addresses[0]" class="col-sm-9 text-secondary p-2">
                            <Link class="" :href="route('address.show')">
                            <div>
                                <a class="text-[20px] font-extrabold">+ <span>Add Address</span></a>
                            </div>

                            </Link>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 p-3">
                            <h6 class="mb-0 font-extrabold">KYC</h6>
                        </div>
                        <div v-if="$page.props.user.kyc == null" class="col-sm-9 text-secondary p-3">
                            <Link :href="route('KYC.index')">
                            <i class="fa fa-exclamation-triangle text-red-600" aria-hidden="true"></i> You Need KYC
                            </Link>
                        </div>
                        <div class="col-sm-9 text-secondary p-3" v-else>
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                            da KYC thanh cong
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 pt-3 p-2">
                            <a class="btn btn-info  " :href="route('profile.edit')">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project-->
            <!-- <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i
                                        class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                        aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                        aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                        aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                        aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i
                                        class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                        aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                        aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                        aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                        aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
</template>
<script setup>

import { computed, ref, watch } from 'vue';
import { Head, useForm, usePage, } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import PlusIcon from 'vue-material-design-icons/Plus.vue';
import navbar from '../../NavbarTest.vue';
import PrimaryButton from '@/Components/Dashboard/PrimaryButton.vue';
const props = defineProps(['userAddresses', 'userName', 'status']);
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


// Old //
// const submit = () => {
//     form.post(route('verification.send'));
// };
// const verificationLinkSent = computed(() => props.status === 'verification-link-sent');



//new code 

const verificationLinkSent = ref(false);
const countdown = ref(0);
let timer;

watch(verificationLinkSent, () => {
    countdown.value = 15;
    clearInterval(timer);
    if (verificationLinkSent.value) {
        timer = setInterval(() => {
            countdown.value--;
            if (countdown.value <= 0) {
                clearInterval(timer);
            }
        }, 1000);
    }
});

const buttonText = computed(() => {
    if (verificationLinkSent.value) {
        return `Sendding Link (${countdown.value}s)`;
    } else {
        return 'Active Email';
    }
});

const sendVerificationLink = async () => {
    form.processing = true;
    try {
        await form.post(route('verification.send'));
        verificationLinkSent.value = true;
    } catch (error) {
        // Handle error if necessary
    } finally {
        form.processing = false;
    }
};
</script>