<template>
  <div class="container-fluid session-detail-section bg-white">
    <div class="row">
      <div class="col-md-4">
        <div class="ecommerce-gallery" data-mdb-zoom-effect="true">
          <div class="row py-3 shadow-5">
            <div class="col-12 mb-1">
              <div class="lightbox">
                <VueMagnifier
                  :src="main_img"
                  id="main_img"
                  class="main_img img-responsive img-center"
                  zoomFactor="1.7"
                  mgWidth="170"
                  mgHeight="170"
                />
              </div>
            </div>
            <div class="col-12 list-img-sp">
              <div class="row">
                <div class="col-3 mt-1" v-for="img in imgs" :key="img.id">
                  <img
                    @click="swap_img(img)"
                    :src="img"
                    alt="Gallery image 2"
                    class="img-fluid img-eff"
                    :class="{ active: img == main_img }"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 p-5">
        <h2 class="sec-title text-capitalize text-center">
          {{ product.name }}
        </h2>
        <div class="row">
          <div class="col-12">
            <div class="description-sp mt-3">
              <p>
                <span class="text-product-estimate">
                  Est: ${{
                    new Intl.NumberFormat("en-IN", {
                      maximumSignificantDigits: 20,
                    }).format(JSON.parse(product.estimate).form)
                  }}
                  - ${{
                    new Intl.NumberFormat("en-IN", {
                      maximumSignificantDigits: 20,
                    }).format(JSON.parse(product.estimate).to)
                  }}
                </span>
              </p>
              <p>
                <span class="text-product-estimate">
                  Last Bid: ${{
                    new Intl.NumberFormat("en-IN", {
                      maximumSignificantDigits: 3,
                    }).format(last_bid)
                  }}
                  <span v-if="auth.user">
                    {{ last_uid == auth.user.id ? "(You)" : "" }}
                  </span>
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <!-- Manual Auction and Auto Auction. Using boostrap tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item overview-tab">
              <a
                class="nav-link tabs-title"
                data-bs-toggle="tab"
                href="#auto-auction"
              >
                Auto Auction
              </a>
            </li>
            <li class="nav-item overview-tab">
              <a
                class="nav-link tabs-title active"
                data-bs-toggle="tab"
                href="#manual-auction"
                >Manual Auction</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <div id="auto-auction" class="container tab-pane fade text-dark">
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post" @submit.prevent="submit">
                    <div class="form-group">
                      <label for="bid">Max Price</label>
                      <input
                        type="text"
                        class="form-control rounded"
                        id="bid"
                        name="bid"
                        v-model="form.bid"
                        autofocus
                        placeholder="Enter your max price"
                      />
                    </div>
                    <div class="form-group">
                      <label for="bid">Bid Increment per Turn</label>
                      <input
                        type="text"
                        class="form-control rounded"
                        id="bid"
                        name="bid"

                        autofocus
                        placeholder="Enter your bid increment"
                      />
                    </div>
                    <div class="form-group">
                      <label for="">When bids go over budget</label>
                      <br />
                      <input
                        type="radio"
                        name="acction_over"
                        id="acction_over_stop"
                        class="form-control"
                        checked
                      />
                      <label for="acction_over_stop" class="p-1">
                        Remind me via email and stop bidding</label
                      >
                      <br />
                      <input
                        type="radio"
                        name="acction_over"
                        id="acction_over_continue"
                        class="form-control"
                      />

                      <label for="acction_over_continue" class="p-1">
                        Remind me via email and continue bidding (with step
                        increment)</label
                      >
                    </div>
                    <div class="form-group mt-3">
                      <button class="btn btn-sm btn-success form-control">
                        Save
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div id="manual-auction" class="container tab-pane active">
              <div class="card">
                <div class="card-body">
                  <form action="#" method="post" @submit.prevent="submit">
                    <div class="form-group">
                      <label for="bid">Bid</label>
                      <input
                        type="text"
                        class="form-control rounded"
                        id="bid"
                        name="bid"
                        v-model="form.bid"
                        autofocus
                        placeholder="Enter your bid"
                      />
                    </div>
                    <div class="form-group mt-3">
                      <button class="btn btn-sm btn-success form-control">
                        Send
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="alert alert-auction">
            <div class="alert-header">
              <h3 class="text-center text-uppercase product-description-h3">
                product description
              </h3>
            </div>

            <hr class="mt-3" />
            <p class="mt-3" v-html="product.description"></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- {{ start_at }} -->
</template>

  <script setup>
import { defineProps, inject, ref } from "vue";
import { Link, router, useForm } from "@inertiajs/vue3";

import { useAttrs } from "vue";
import VueMagnifier from "@websitebeaver/vue-magnifier";
import "@websitebeaver/vue-magnifier/styles.css";
// Lấy đối tượng attrs
const form = useForm({
  bid: "",
  body: "",
});

const Swal = inject("$swal");
const props = defineProps({
  product: Object,
  category_name: String,
  auth: Object,
  messages: Object,
  pusher: Object,
  last_bid: Number,
  last_uid: Number,
});
const auth = props.auth;
const pusher = props.pusher;
const product = props.product;
const messages = props.messages;
var last_bid_var = props.last_bid;
var last_uid_var = props.last_uid;
//get last bid

const submit = async () => {
  if (auth.user == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "You need to login to abid!",
    });
    return;
  }
  if (props.pusher == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
      timer: 2000,
    });
    return;
  }

  if (form.bid == null || form.bid == "") {
    console.log(form);
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "You need to enter your bid!",
    });
    return;
  }
  if (form.bid <= last_bid_var) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Your bid must be greater than the highest bid!",
    });
    return;
  }
  if (last_uid_var == auth.user.id) {
    Swal.fire({
      icon: "warning",
      title: "Oops...",
      text: "You are currently the highest bidder!",
    });
    return;
  }
  //show loading
  Swal.fire({
    title: "Loading...",
    text: "Please wait",
    allowOutsideClick: false,
    showConfirmButton: false,
    willOpen: () => {
      Swal.showLoading();
    },
  });
  const response = await fetch(
    route("product.test", { product_id: product.id, bid: form.bid }),
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
          .content,
        //   socket_id: props.pusher.socket_id,
        "X-Socket-Id": pusher.connection.socket_id,
      },
      body: {
        bid: form.bid,
      },
    }
  );
  const data = await response.json();
//   console.log("data", data);
  if (response.status == 200) {
    if(data.status_code == 'error'){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: data.message,
            // timer: 2000,
        });
    }else{
        Swal.fire({
            icon: "success",
            title: "Success",
            text: data.message,
            timer: 2000,
        });
        // last_bid_var = data.bid;
        // last_uid_var = data.uid;
    }
  } else if (response.status == 500) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
      timer: 2000,
    });
  } else if (response.status == 419) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Token expired! Reload page!",
      timer: 2000,
    });
    //reload page
    location.reload();
  } else if (response.status == 404) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Product not found!",
      timer: 2000,
    });
    //reload page
    // location.reload();
  } else {
    Swal.fire({
      icon: "error",
      title: response.status,
      text: "Something went wrong! Try again!",
      timer: 2000,
    });
    //reload page
    // location.reload();
  }
//   console.log(response);
  //   form.post(route("product.test", {id: 1}));
};

const imgs = JSON.parse(product.images);
var main_img = ref(imgs[0]);
function swap_img(img) {
  main_img.value = img;
}
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
  font-size: 1.2rem !important;
  /* font-family: "Montserrat", sans-serif; */
}
.main_img {
  width: 427px !important;
  height: 427px !important;
}
.img-eff {
  width: 81px !important;
  height: 81px !important;
}
.lightbox {
  max-width: 100%;
  max-height: 100%;
}
.list-img-sp {
  width: 100% !important;
  height: 100% !important;
  /* object-fit: cover; */
}
.alert-auction {
  background-color: #63423657;
  font-family: "Smythe", cursive;
  font-size: 20px;
  /* color: #634236; */
  /* font-weight: bold; */
}
.product-description-h3 {
  color: #634236;
  font-size: 1.3rem;
  font-weight: bold;
}
</style>
