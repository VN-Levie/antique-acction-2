<template>
  <div class="col-md-9">
    <div class="product-section">
      <h2 class="text-center text-capitalize">
        {{ category_name }}
      </h2>
      <div class="container list-product">
        <div class="row">
          <div
            v-for="product in products"
            v-bind:key="product.id"
            class="col-md-6 col-12"
          >
            <ProductItem :product="product" />
          </div>
        </div>
      </div>

      <ul class="pagination justify-center bottom-0 product-pagination">
        <li
          v-for="page in links"
          v-bind:key="page"
          class="page-item product-page-item"
          :class="{ active: page.active }"
        >
          <Link class="page-link product-page-link" :href="page.url">
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
import ProductItem from "./ProductItem.vue";
const props = defineProps({
  products: Object,
  category_name: String,
  page: Number,
});

const category_name = props.category_name;
const products = props.products.data;
const links = props.products.links;
console.log(props.products);
</script>
  <style>
/* Smythe google font */

.product-section {
  /* import font Smythe google */

  /* width: 300px; */
  /* border: 1px dashed brown; thay đổi kiểu viền thành nét đứt màu nâu */
  padding: 10px;
}

.product-section h2 {
  font-family: "Smythe", cursive;
  text-align: center;
  text-transform: uppercase;
  color: #634236;
  font-size: 30px;
}
.list-product {
  margin-top: 20px;
  min-height: 450px;
}
.product-pagination {
  font-family: "Smythe", cursive;
  margin-top: 20px;
  border: none;
}
.product-page-item {
  border: none;
}
.product-page-link {
  color: #634236;
  /* font-size: 20px; */
  border: none;
}
/* product-page-item active */
.product-page-item.active .product-page-link {
  background-color: #634236;
  color: white;
  border-radius: 5px;
}
.product-page-link:hover {
  color: white;
  /* font-size: 20px; */
  border: none;
  font-weight: bold;
  background-color: #634236c9;
  border-radius: 5px;
}
</style>
