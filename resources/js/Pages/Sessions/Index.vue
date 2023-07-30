

<template>
  <HomeLayout title="Browser Session">
    <div class="container-fluid bg-gray rounded p-5">
      <div class="row">
        <Sidebar :product-categories="product_categories" :count="count" />
        <ListSession
          :auctionSession="auctionSession"
          :category_name="category_name"
        />
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
const count = attrs.count;

// Sử dụng giá trị này trong logic của component
// console.log(auctionSession);
</script>
<style>
.bg-gray{
    background-color: #f5f5f5cb;
}
</style>
