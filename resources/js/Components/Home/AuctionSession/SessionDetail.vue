<template>
  <div class="container-fluid session-detail-section  bg-white">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <h2 class="text-center">{{ auctionSession.name }}</h2>
          <p class="text-center text-uppercase action-titles-type">
            Online Auction
          </p>
          <p class="text-center action-titles-type">
            <span
              >{{ monthNames[start_at_month] }} {{ start_at_day }} -
              {{ start_at_hour }}H</span
            >
            to
            <span
              >{{ monthNames[end_at_month] }} {{ end_at_day }} -
              {{ end_at_hour }}H</span
            >

            <span class="text-warning"> (GMT +7)</span>
          </p>

          <div class="card-footer mt-3">
            <div class="row">
              <div class="col-md-4 col-6">
                <p class="auction-card-footer-text text-center">
                  <i class="fa fa-map-marker" aria-hidden="true"></i> Online
                </p>
              </div>
              <div class="col-md-4 col-6">
                <p class="auction-card-footer-text text-center">
                  <i class="fa fa-wpexplorer" aria-hidden="true"></i>
                  {{ auctionSession.products_count }} Lots
                </p>
              </div>
              <div class="col-md-4 col-12">
                <p class="auction-card-footer-text text-center">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  {{ status }}
                </p>
              </div>
            </div>
          </div>
          <img
            src="/img/mt-1804-home-divider2.png"
            class="img-center mt-1 lazyload"
          />
        </div>
      </div>
      <div class="col-md-4">
        <div v-if="int_status == 0">
          <p>
            <i class="fa fa-eye-slash" aria-hidden="true"></i> Not Available
          </p>
        </div>
        <div v-else-if="int_status == 1">
          <p><i class="fa fa-eye" aria-hidden="true"></i> Register</p>
        </div>
        <div v-else-if="int_status == 2" class="gy-3 gx-3">
          <p class="mt-3"><i class="fa fa-bell-o" aria-hidden="true"></i> Pre-Register</p>
          <p class="mt-3">
            <a :href="cal_url" target="_blank" class="btn btn-sm btn-success">
              <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
              Add to calendar
            </a>
          </p>
        </div>
        <div v-else-if="int_status == 3">
          <p><i class="fa fa-repeat" aria-hidden="true"></i> View Report</p>
        </div>
        <div v-else>
          <p>
            <i class="fa fa-eye-slash" aria-hidden="true"></i> Not Available
          </p>
        </div>
        <div >
          <p class="mt-3"><i class="fa fa-share-alt" aria-hidden="true"></i> Share</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="session-description mt-3">
        <p class="text-center">
          {{ auctionSession.description }}
        </p>
      </div>
    </div>
  </div>
  {{ start_at }}
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
var currentLocation = window.location;
const monthNames = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
const category_name = props.category_name;
const auctionSession = props.auctionSession;
// Tạo các biến ngày bắt đầu và kết thúc từ auctionSession
const start_at = new Date(auctionSession.start_at);
const end_at = new Date(auctionSession.end_at);

// Lấy số mili giây từ ngày bắt đầu và kết thúc
const start_at_ms = start_at.getTime();
const end_at_ms = end_at.getTime();
// Định dạng ngày giờ theo định dạng YYYYMMDDTHHMMSSZ
const start_at_formatted =
  start_at.toISOString().replace(/[-:.]/g, "").slice(0, -4) + "Z";
const end_at_formatted =
  end_at.toISOString().replace(/[-:.]/g, "").slice(0, -4) + "Z";
const start_at_hour = start_at.getHours();
const start_at_day = start_at.getDate();
const start_at_month = start_at.getMonth();

const end_at_hour = end_at.getHours();
const end_at_day = end_at.getDate();
const end_at_month = end_at.getMonth();
// Tạo biến cho biết thời gian hiện tại
const now = Date.now();

// Tạo biến trạng thái
let status;
let int_status = 0;
// Kiểm tra các điều kiện khác nhau
if (now > start_at_ms && now < end_at_ms) {
  // Nếu thời gian hiện tại nằm giữa ngày bắt đầu và kết thúc
  status = "Open";
  int_status = 1;
} else if (now < start_at_ms) {
  // Nếu thời gian hiện tại nhỏ hơn ngày bắt đầu
  // Tính số ngày còn lại cho đến ngày bắt đầu
  const days_left = Math.ceil((start_at_ms - now) / (1000 * 60 * 60 * 24));
  status = `Starts:  ${days_left} day(s)`;
  int_status = 2;
} else if (now > end_at_ms) {
  // Nếu thời gian hiện tại lớn hơn ngày kết thúc
  status = "Ended";
  int_status = 3;
} else {
  // Nếu có trường hợp khác không xác định
  status = "Not Available";
}

const cal_url = `https://www.google.com/calendar/event?action=TEMPLATE&text=AAO's Auction: ${auctionSession.name}&dates=${start_at_formatted}/${end_at_formatted}&details=AUCTION:${auctionSession.name} (Sale ${auctionSession.id}) | ${currentLocation} | Online Only&location=Online Only&trp=false&sprop=AAO&sprop=&name:Levie`;

// const links = props.auctionSession.links;
</script>
<style>
.session-detail-section {
  /* border: 0.5px solid #ccc; */
  /* padding: 10px; */
  margin-bottom: 10px;
  transition: all 0.3s ease-in-out;
}
.session-detail-section h2 {
  font-family: "Smythe", cursive;
  font-size: 30px;
}
.action-titles-type {
  font-family: "Montserrat", sans-serif;
  font-size: 0.8rem;
}
.img-center {
  margin: 0 auto;
}
.session-description p {
  font-size: 1.5rem;
  /* font-size: 30px; */
}
.session-detail-section .card {
  border: none;
}
.session-detail-section .card-footer {
  border: none;
  background-color: white;
  font-size: 21px;
}
.auction-card-footer-text {
  font-size: 0.8rem;
}
</style>
