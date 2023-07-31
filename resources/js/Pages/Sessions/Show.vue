
<template>
  <HomeLayout title="Home">
    <div class="container-fluid bg-gray rounded p-5">
      <div class="row">
        <SessionDetail :auctionSession="auctionSession" />
      </div>
    </div>
  </HomeLayout>
</template>;
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import SessionDetail from "@/Components/Home/AuctionSession/SessionDetail.vue";
import { useAttrs } from "vue";
// Lấy đối tượng attrs
const attrs = useAttrs();
const auctionSession = attrs.auction_session;

</script>
