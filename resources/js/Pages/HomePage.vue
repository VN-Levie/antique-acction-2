<script setup>
import { Head } from "@inertiajs/vue3";
import { useAttrs, ref } from "vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Slider from "@/Components/Home/Sliders.vue";
import About from "@/Components/Home/About.vue";
import adsbar from "@/Components/Home/Adsbars.vue";
import works from "@/Components/Home/works.vue";
import services from "@/Components/Home/services.vue";
import testimonials from "@/Components/Home/Testimonialss.vue";
import Team from "@/Components/Home/Teamss.vue";
import contacts from "@/Components/Home/Contacts.vue";
import logo from "@/Components/Home/logo.vue";
// import { useAttrs, ref } from "vue";
const attrs = useAttrs();
const dataTeam = attrs.DataTeam;
const TestimonialData = attrs.TestimonialData;



</script>

<template>
  <Head title="Home" />
  <HomeLayout>
    <Slider />
    <About />
    <adsbar />
    <works />
    <services />
    <testimonials :TestimonialData="TestimonialData" />
    <Team :dataTeam="dataTeam" />
    <logo />
    <contacts />
  </HomeLayout>
</template>
