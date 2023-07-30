<template>
  <div class="col-md-3 order-1 order-md-0">
    <div class="session-category">
      <h2 class="text-center text-capitalize">session category</h2>
      <ul>
        <li>
          <Link
            :href="route('session.index')"
            :class="{
              'category-active':
                route().params.slug == null || route().params.slug == cr_page,
            }"
            >All Session Available</Link
          >
        </li>
        <li v-for="item in productCategories" v-bind:key="item.id">
          <Link
            :href="route('session.index', item.slug)"
            :class="{ 'category-active': route().params.slug == item.slug }"
            >{{ item.name }}</Link
          >
        </li>
      </ul>
      <!-- {{ route().params.slug }} -->
    </div>
  </div>
</template>
<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
const props = defineProps({ productCategories: Array, page: Number });
const productCategories = props.productCategories;
const cr_page = props.page;
</script>
<style>


.session-category {
  /* import font Smythe google */
  font-family: "Smythe", cursive;
  /* width: 300px; */
  /* border: 1px dashed brown; thay đổi kiểu viền thành nét đứt màu nâu */
  padding: 10px;
}
.category-active {
  color: #634236;
  font-weight: bold;
  /* font-size: 20px; */
}
.session-category h2 {
  text-align: center;
  text-transform: uppercase;
  color: #634236;
  font-size: 30px;
}

.session-category ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.session-category li {
  margin-bottom: 10px;
  border-bottom: 3px dashed #634236; /* thêm viền nét đứt màu nâu phía dưới mỗi thẻ li */
  position: relative; /* tạo vị trí tương đối cho thẻ li */
}

.session-category li::before {
  content: "•"; /* tạo nội dung là một chấm đen */
  color: black; /* màu chấm đen */
  font-size: 20px; /* kích thước chấm đen */
  position: absolute; /* tạo vị trí tuyệt đối cho chấm đen */
  left: -10px; /* đặt chấm đen sang trái */
  top: 9px; /* đặt chấm đen xuống dưới */
}

.session-category li::after {
  content: "•"; /* tạo nội dung là một chấm đen */
  color: #634236; /* màu chấm đen */
  font-size: 20px; /* kích thước chấm đen */
  position: absolute; /* tạo vị trí tuyệt đối cho chấm đen */
  right: -10px; /* đặt chấm đen sang phải */
  top: 9px; /* đặt chấm đen xuống dưới */
}

.session-category a {
  display: block;
  /* color: blue; */
  text-decoration: none;
}
</style>
