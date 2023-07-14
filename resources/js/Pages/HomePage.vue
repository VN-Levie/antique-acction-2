<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Slider from "@/Components/Home/Sliders.vue";
import About from "@/Components/Home/About.vue";
import adsbar from "@/Components/Home/Adsbars.vue";
import works from "@/Components/Home/works.vue";
import services from "@/Components/Home/services.vue";
import testimonials from "@/Components/Home/Testimonialss.vue";
import Team from "@/Components/Home/Teamss.vue";
import contacts from "@/Components/Home/ContactsUss.vue";
import logo from "@/Components/Home/logo.vue";
</script>

<template>
  <HomeLayout title="Home">
    <Slider />
    <About />
    <adsbar />
    <works />
    <services />
    <testimonials />
    <Team />
    <logo/>
    <contacts />
  </HomeLayout>
</template>
