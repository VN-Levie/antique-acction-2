
<template>
    <HomeLayout :title="title">
      <div class="container-fluid bg-gray rounded p-5">
        <div class="row">
          <ProductDetail :product="product" />
        </div>
      </div>
    </HomeLayout>
  </template>;
  <script setup>
  import HomeLayout from "@/Layouts/HomeLayout.vue";
  import ProductDetail from "@/Components/Home/Product/ProductDetail.vue";
  import { useAttrs } from "vue";
  // Lấy đối tượng attrs
  const attrs = useAttrs();
  const product = attrs.product;
  const auth = attrs.auth;
  const title = product.name + " - " + product.session.name;
  </script>
