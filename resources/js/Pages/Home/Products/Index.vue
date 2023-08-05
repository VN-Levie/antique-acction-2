

<template>
    <HomeLayout title="Our Products">
      <div class="container rounded mt-5">
        <div class="row">
          <Sidebar :product-categories="product_categories" :count="count" :filter_date="filter_date" />
          <ListSession
            :products="products"
            :category_name="category_name"
          />
        </div>

      </div>

    </HomeLayout>
  </template>
  <script setup>
  import HomeLayout from "@/Layouts/HomeLayout.vue";
  import Sidebar from "@/Components/Home/Product/ProductSidebar.vue";
  import ListSession from "@/Components/Home/Product/ListProducts.vue"
  import { useAttrs } from "vue";
  // Lấy đối tượng attrs
  const attrs = useAttrs();
  // Lấy giá trị của $attrs.auction_session
  const products = attrs.products;
  const product_categories = attrs.product_categories;
  // console.log(products.data);
  const category_name = attrs.category_name;
  const count = attrs.count;
  const filter_date = attrs.filter_date;

  // Sử dụng giá trị này trong logic của component
  // console.log(products);
  </script>
  <style>
  .bg-gray{
      /* background-color: #f5f5f5cb; */
  }
  </style>
