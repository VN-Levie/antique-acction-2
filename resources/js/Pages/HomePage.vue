<script setup>
import { Head, Link } from "@inertiajs/vue3";
import FrontentLayout from "@/Layouts/Frontend.vue";
import Hero from "@/Components/Frontend/Hero.vue";
import About from "@/Components/Frontend/About.vue";
import adsbar from "@/Components/Frontend/Adsbars.vue";
import works from "@/Components/Frontend/works.vue";
import services from "@/Components/Frontend/services.vue";
import testimonials from "@/Components/Frontend/Testimonialss.vue";
import Team from "@/Components/Frontend/Teamss.vue";
import contacts from "@/Components/Frontend/ContactsUss.vue";
import logo from "@/Components/Frontend/logo.vue";
</script>

<template>
  <Head title="Home" />
  <FrontentLayout>
    <Hero />
    <About />
    <adsbar />
    <works />
    <services />
    <testimonials />
    <Team />
    <logo />
    <contacts />
  </FrontentLayout>
</template>
