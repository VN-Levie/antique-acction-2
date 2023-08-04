<template>
  <div class="container-fluid session-detail-section bg-white">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <h2 class="text-center">{{ auctionSession.name }}</h2>
          <p class="text-center text-uppercase action-titles-type">
            Online Auction
          </p>
          <p class="text-center action-titles-type">
            <span>{{ monthNames[start_at_month] }} {{ start_at_day }} -
              {{ start_at_hour }}H</span>
            to
            <span>{{ monthNames[end_at_month] }} {{ end_at_day }} -
              {{ end_at_hour }}H</span>

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
                  <i class="fa-solid fa-splotch"></i>
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
          <img src="/img/mt-1804-home-divider2.png" class="img-center mt-1 lazyload" />
        </div>
      </div>
      <div class="col-md-4">
        <div v-if="int_status == 0">
          <p>
            <i class="fa fa-eye-slash" aria-hidden="true"></i> Not Available
          </p>
        </div>
        <div v-else-if="int_status == 1">
          <p class="mt-3">
            <button href="#" class="btn btn-sm btn-warning" @click="join()">
              <i class="fa fa-sign-in" aria-hidden="true"></i>
              Request to join
            </button>
          </p>
        </div>
        <div v-else-if="int_status == 2" class="gy-3 gx-3">
          <p class="mt-3">
            <i class="fa fa-bell-o" aria-hidden="true"></i> Pre-Register
          </p>
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
        <div>
          <p class="mt-3">
            <i class="fa fa-share-alt" aria-hidden="true"></i> Share
          </p>
        </div>
      </div>
    </div>

    <div class="row p-3">
      <div class="container session-description mt-3 p-3">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item overview-tab">
            <a class="nav-link tabs-title" data-bs-toggle="tab" href="#home">
              Overview
            </a>
          </li>
          <li class="nav-item overview-tab">
            <a class="nav-link tabs-title active" data-bs-toggle="tab" href="#menu1">Products</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane fade text-dark">
            <br />
            <h2 class="text-dark">Session Description</h2>
            <p class="text-dark">
              {{ auctionSession.description }}
            </p>
            <hr />
            <h2 class="text-dark mt-5">Paymant And Shipping</h2>
            <p class="text-dark">
              {{ auctionSession.payment_and_shipping }}
            </p>
            <hr />
            <h2 class="text-dark mt-5">Terms And Disclaimer</h2>
            <p class="text-dark">
              {{ auctionSession.terms_and_disclaimer }}
            </p>
          </div>
          <div id="menu1" class="container tab-pane active">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-6 col-12" v-for="(product, index) in auctionSession.products"
                :key="index">
                <div class="card card-product mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 col-12">
                        <p class="text-center">
                          <img :src="JSON.parse(product.images)[0]" class="img-fluid rounded img-center lazyload" />
                        </p>
                      </div>
                      <div class="col-md-12 col-12 text-center text-capitalize mt-3">
                        <span class="text-center text-roduct-name">
                          {{ product.name }}
                        </span>
                      </div>
                      <div class="col-md-12 col-12">
                        <p class="text-center">
                          <span class="text-product-estimate">
                            Estimate: ${{
                              new Intl.NumberFormat("en-IN", {
                                maximumSignificantDigits: 3,
                              }).format(JSON.parse(product.estimate).form)
                            }}
                            - ${{
                              new Intl.NumberFormat("en-IN", {
                                maximumSignificantDigits: 3,
                              }).format(JSON.parse(product.estimate).to)
                            }}
                          </span>
                        </p>
                        <p class="text-center">
                          <span class="text-product-estimate">
                            Last Bid: ${{
                              new Intl.NumberFormat("en-IN", {
                                maximumSignificantDigits: 3,
                              }).format(product.last_bid)
                            }}
                          </span>
                        </p>
                      </div>
                      <div class="col-md-12 col-12">
                        <p class="text-right">
                          <span class="text-danger"> </span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <p class="text-center product-bid-info">
                          <i class="fa-solid fa-gavel"></i>
                          {{ product.num_bided }}
                        </p>
                      </div>
                      <div class="col-md-6 col-6">
                        <p class="text-center">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                          {{ product.likes }}
                        </p>
                      </div>
                    </div>
                    <hr />
                    <p class="text-right">
                      <button class="btn btn-sm btn-auction">
                        View Product
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- {{ start_at }} -->
</template>

<script setup>
import { defineProps, inject } from "vue";
import { Link, router } from "@inertiajs/vue3";
import SessionItem from "./SessionItem.vue";

import { useAttrs } from "vue";
// Lấy đối tượng attrs

const Swal = inject("$swal");
const props = defineProps({
  auctionSession: Object,
  category_name: String,
  auth: Object,
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
const auth = props.auth;

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
console.log(auth);
function join() {
  //   swal("The Internet?", "That thing is still around?", "question");

  if (auth.user == null) {
    Swal.fire({
      title: "You need to login to join this auction",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Login",
    }).then((result) => {
      if (result.isConfirmed) {
        //redirect to login page
        location.href = "/login";
      }
    });
  } else if (auth.user != null && int_status == 1) {
    Swal("You have joined this auction.");
  } else if (auth.user != null && int_status == 2) {
    Swal("This auction is not started yet.");
  } else if (auth.user != null && int_status == 3) {
    Swal("This auction is ended.");
  } else {
    Swal("This auction is not available.");
  }
}

const cal_url = `https://www.google.com/calendar/event?action=TEMPLATE&text=AAO's Auction: ${auctionSession.name}&dates=${start_at_formatted}/${end_at_formatted}&details=AUCTION:${auctionSession.name} (Sale ${auctionSession.id}) | ${currentLocation} | Online Only&location=Online Only&trp=false&sprop=AAO&sprop=&name:Levie`;
// console.log(props);
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

.tabs-title {
  font-family: "Smythe", cursive;
  font-size: 1.2rem;
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

.nav-tabs .nav-item .nav-link {
  /* background-color: #634236b7; */
  color: #fff;
}

.tab-content {
  /* border: 1px solid #dee2e6; */
  border-top: transparent;
  padding: 15px;
}

.tab-content .tab-pane {
  background-color: #fff;
  /* color: #0080ff; */
  min-height: 200px;
  height: auto;
}

.text-product-estimate {
  color: #634236;
  font-size: large;
}

.text-roduct-name {
  font-family: "Smythe", cursive;
  font-size: 1.5rem;
  color: #634236;
  overflow: hidden;
}

.card-product {
  border: 1px solid #634236 !important;
  background-color: transparent;
  color: #634236;
  /* box-shadow: #634236 0px 0px 0px 1px inset !important; */
}

.overview-tab a {
  color: #634236 !important;
}

.overview-tab:hover {
  text-shadow: #634236 0px 0px 0px 1px !important;
}

.product-bid-info {
  font-family: "Smythe", cursive;
  font-size: 1.4rem !important;
  /* font-family: "Montserrat", sans-serif; */
}
</style>
