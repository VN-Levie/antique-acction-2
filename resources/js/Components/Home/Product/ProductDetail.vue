<template>
    <div class="container-fluid session-detail-section bg-white">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <h2 class="text-center">{{ product.name }}</h2>
            <p class="text-center text-uppercase action-titles-type">
              Online Auction
            </p>
            <!-- {{ product.images }} -->



            <img
              src="/img/mt-1804-home-divider2.png"
              class="img-center mt-1 lazyload"
            />
          </div>
        </div>
        <div class="col-md-4">

          <div>
            <p class="mt-3">
              <i class="fa fa-share-alt" aria-hidden="true"></i> Share
            </p>
          </div>
        </div>
      </div>


    </div>
    <!-- {{ start_at }} -->
  </template>

  <script setup>
  import { defineProps, inject } from "vue";
  import { Link, router } from "@inertiajs/vue3";


  import { useAttrs } from "vue";
  // Lấy đối tượng attrs

  const Swal = inject("$swal");
  const props = defineProps({
    product: Object,
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
  const product = props.product;

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

  </style>
