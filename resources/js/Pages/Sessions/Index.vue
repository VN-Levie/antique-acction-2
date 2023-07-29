

<template>
  <HomeLayout title="Browser Session">
    <div class="container mt-3">
      <div class="row">
        <Sidebar />
        <ListSession />
      </div>
    </div>
  </HomeLayout>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Sidebar from "./Sidebar.vue";
import ListSession from "./ListSession.vue";
</script>
