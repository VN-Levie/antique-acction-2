<template>
  <div class="col-md-9">
    <div class="session-section">
      <h2 class="text-center text-capitalize">
        {{ category_name }}
      </h2>
      <div class="container list-session">
        <div class="row">
          <div
            v-for="session in auctionSession"
            v-bind:key="session.id"
            class="col-xl-3 col-md-4 col-sm-6 col-12"
          >
            <SessionItem :session="session" />
          </div>
        </div>
      </div>

      <ul class="pagination justify-center bottom-0 session-pagination">
        <li
          v-for="page in links"
          v-bind:key="page"
          class="page-item session-page-item"
          :class="{ active: page.active }"
        >
          <Link class="page-link session-page-link" :href="page.url">
            <span v-html="page.label"></span>
          </Link>
        </li>
      </ul>
    </div>
  </div>
</template>
  <script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
import SessionItem from "./SessionItem.vue";
const props = defineProps({
  auctionSession: Object,
  category_name: String,
  page: Number,
});
const category_name = props.category_name;
const auctionSession = props.auctionSession.data;
const links = props.auctionSession.links;
</script>
  <style>
/* Smythe google font */

.session-section {
  /* import font Smythe google */

  /* width: 300px; */
  /* border: 1px dashed brown; thay đổi kiểu viền thành nét đứt màu nâu */
  padding: 10px;
}

.session-section h2 {
  font-family: "Smythe", cursive;
  text-align: center;
  text-transform: uppercase;
  color: #634236;
  font-size: 30px;
}
.list-session {
  margin-top: 20px;
  min-height: 450px;
}
.session-pagination {
  font-family: "Smythe", cursive;
  margin-top: 20px;
  border: none;
}
.session-page-item {
  border: none;
}
.session-page-link {
  color: #634236;
  /* font-size: 20px; */
  border: none;
}
/* session-page-item active */
.session-page-item.active .session-page-link {
  background-color: #634236;
  color: white;
  border-radius: 5px;
}
.session-page-link:hover {
  color: white;
  /* font-size: 20px; */
  border: none;
  font-weight: bold;
  background-color: #634236c9;
  border-radius: 5px;
}
</style>
