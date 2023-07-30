

<template>
  <HomeLayout title="Browser Session">
    <div class="container mt-3">
      <div class="row">
        <Sidebar />
        <ListSession />
      </div>
      <div class="row">
        <!-- {{ $attrs.auction_session.createdBy }} -->
      </div>
      <li v-for="item in auctionSession" v-bind:key="item.id">
        {{ item.created_by.name }}
      </li>
    </div>
  </HomeLayout>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Sidebar from "./Sidebar.vue";
import ListSession from "./ListSession.vue";
import { useAttrs } from 'vue';
  // Lấy đối tượng attrs
  const attrs = useAttrs();
  // Lấy giá trị của $attrs.auction_session
  const auctionSession = attrs.auction_session;
  // Sử dụng giá trị này trong logic của component
  console.log(auctionSession);
</script>
