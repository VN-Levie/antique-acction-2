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
                  zoomFactor="1.8"
                  mgWidth="200"
                  mgHeight="200"
                />
              </div>
            </div>
            <div class="col-12 list-img-sp">
              <div class="row">
                <div class="col-3 mt-1" v-for="img in imgs" :key="img.id">
                  <img
                    @click="changeimg(img)"
                    :src="img"
                    alt="Gallery image 2"
                    class="w-100 img-eff"
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
          <div class="row">
            <div></div>
            <h1>Test</h1>
            <button class="btn btn-sm btn-success" @click="sendMEss()">
              Send
            </button>
          </div>
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
                  Last Bid:
                  <span
                    class="text-product-estimate"
                    v-for="(m, index) in messages"
                    :key="index"
                  >
                    {{
                      index == messages.length - 1
                        ? "$" +
                          new Intl.NumberFormat("en-IN", {
                            maximumSignificantDigits: 20,
                          }).format(m.last_bid)
                        : null
                    }}
                  </span>
                  <!-- ${{
                    new Intl.NumberFormat("en-IN", {
                      maximumSignificantDigits: 3,
                    }).format(product.last_bid)
                  }} -->
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="card">
            <div class="card-header">
              <h3 class="text-center text-uppercase product-description-h3">
                bid now
              </h3>
            </div>
            <div class="card-body">
              <form action="#" method="post">
                <div class="form-group">
                  <label for="bid">Bid</label>
                  <input
                    type="text"
                    class="form-control"
                    id="bid"
                    placeholder="Enter your bid"
                  />
                </div>
              </form>
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
  <div class="row">
    <form name="createForm" @submit.prevent="submit">
      <div className="flex flex-col">
        <div className="mb-4">
          <label for="title" value="Title" > s</label>

          <input
            id="bid"
            name="bid"
            type="text"
            class="mt-1 block w-full"
            v-model="form.bid"
            autofocus
          />

          <span className="text-red-600" v-if="form.errors.title">
            {{ form.errors.title }}
          </span>
        </div>

        <div className="mb-4">
          <BreezeLabel for="body" value="Body" />

          <BreezeTextArea
            id="body"
            class="mt-1 block w-full"
            v-model="form.body"
            autofocus
          />

          <span className="text-red-600" v-if="form.errors.body">
            {{ form.errors.body }}
          </span>
        </div>
      </div>

      <div className="mt-4">
        <button
          type="submit"
          className="px-6 py-2 font-bold text-white bg-green-500 rounded"
        >
          Save
        </button>
      </div>
    </form>
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
});
const auth = props.auth;
const pusher = props.pusher;
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


  if (form.bid == null) {
    console.log(form);
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "You need to enter your bid!",
    });
    return;
  }
  await fetch(route("product.test", { id: 1, bid: form.bid }), {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      "X-Requested-With": "XMLHttpRequest",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      //   socket_id: props.pusher.socket_id,
      "X-Socket-Id": pusher.connection.socket_id,
    },
    body: {
      bid: form.bid,
    },
  });
  console.log(pusher.connection.socket_id);
  //   form.post(route("product.test", {id: 1}));
};
const product = props.product;
const imgs = JSON.parse(product.images);
console.log(typeof imgs);
var main_img = ref(imgs[0]);
function changeimg(img) {
  main_img.value = img;
  console.log(main_img);
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
