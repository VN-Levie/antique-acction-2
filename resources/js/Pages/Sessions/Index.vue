

<template>
  <HomeLayout title="Browser Session">
    <div class="container mt-3">
      <div class="row">
        <Sidebar :product-categories="product_categories" :page="page" />
        <ListSession
          :auctionSession="auctionSession"
          :category_name="category_name"
          :page="page"
        />
      </div>
      <div class="row">
        <!-- {{ $attrs.auction_session.createdBy }} -->
      </div>
    </div>
  </HomeLayout>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Sidebar from "@/Components/Home/AuctionSession/SessionSidebar.vue";
import ListSession from "@/Components/Home/AuctionSession/ListSession.vue";
import { useAttrs } from "vue";
// Lấy đối tượng attrs
const attrs = useAttrs();
// Lấy giá trị của $attrs.auction_session
const auctionSession = attrs.auction_session;
const product_categories = attrs.product_categories;
// console.log(auctionSession.data);
const category_name = attrs.category_name;
const page = attrs.page;
// Sử dụng giá trị này trong logic của component
// console.log(auctionSession);
</script>
