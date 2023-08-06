<template>
    <Head title="kyc" />
    <div class="bg-white">
        <div class="pt-10 max-w-md mx-auto">

            <form class="bg-white  shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                <div class="pb-5 text-center">

                    <p><i class="fa fa-address-card-o" aria-hidden="true"></i> KYC (Know Your Customer) is a process to
                        verify
                        the identity of users. It involves providing valid and
                        authentic identification documents.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fullName">Full Name:</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="fullName" v-model="form.fullName" required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address:</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="address" v-model="form.address" required />
                </div>
                <div class="mb-4">
                    <label for="idCard">ID Card (JPEG/PNG/PDF):</label>
                    <input type="file" id="idCard" ref="idCard" accept=".jpeg,.jpg,.png,.pdf"
                        @change="form.idCard = $event.target.files[0]" required />
                    <div class="mt-4">
                        <div class="text-blue-500 hover:underline focus:outline-none cursor-pointer" @click="toggleGuide">
                            <i class="fa fa-address-card-o" aria-hidden="true"></i> Guide ID Card
                        </div>
                        <div v-if="showGuide" class="mt-4">
                            <!-- Display your guide content here -->
                            <img src="../../../../../public/img/kyc_guide/Id_card.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="proofOfAddress">Proof of Address (JPEG/PNG/PDF):</label>
                    <input type="file" id="proofOfAddress" ref="proofOfAddress" accept=".jpeg,.jpg,.png,.pdf"
                        @change="form.proofOfAddress = $event.target.files[0]" required />
                    <div class="mt-4">
                        <div class="text-blue-500 hover:underline focus:outline-none cursor-pointer"
                            @click="toggleGuideProofAddress">
                            <i class="fa fa-address-card-o" aria-hidden="true"></i> Guide Proof of Address
                        </div>
                        <div v-if="showGuideProofAddress" class="mt-4">
                            <!-- Display your guide content here -->
                            <img src="../../../../../public/img/kyc_guide/proof_of_address.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit eKYC
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>
  
<script setup>

import { ref, computed } from 'vue';
import { useForm, Head } from '@inertiajs/vue3';


const form = useForm({
    fullName: '',
    address: '',
    idCard: '',
    proofOfAddress: '',
});

const submit = () => {
    form.post(route('KYC.submit'), {
        onFinish: () => route('profile.index'),
    });
};

const showGuide = ref(false);
const showGuideProofAddress = ref(false);
const toggleGuide = () => {
    showGuide.value = !showGuide.value;

};
const toggleGuideProofAddress = () => {

    showGuideProofAddress.value = !showGuideProofAddress.value;
};

</script>