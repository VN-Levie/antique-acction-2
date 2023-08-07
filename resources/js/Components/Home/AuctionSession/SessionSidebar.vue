<template>
  <div class="col-md-3 order-0 d-none d-md-block">
    <div class="session-category">
      <h2 class="text-center text-capitalize">category</h2>
      <ul>
        <li>
          <Link
            :href="route('session.index')"
            :class="{
              'category-active': route().params.slug == null,
            }"
            class="category-link"
          >
            All Session Available ({{ count }})
          </Link>
        </li>
        <li v-for="item in productCategories" v-bind:key="item.id">
          <Link
            :href="route('session.index', item.slug)"
            :class="{ 'category-active': route().params.slug == item.slug }"
            class="category-link"
          >
            {{ item.name }} ({{ item.sessions_count }})
          </Link>
        </li>
      </ul>
      <!-- {{ route().params.slug }} -->
    </div>
  </div>

  <div class="col-12 d-block d-md-none session-category">
    <div class="row mt-3 text-center">
      <div class="col-12">
        <h2 class="text-center text-capitalize">category</h2>
      </div>

      <div class="col-10 list-categorys-mobile">
        <div class="categorys-mobile">
          <Link
            :href="route('session.index')"
            :class="{
              'category-active': route().params.slug == null,
            }"
            class="category-link"
            ref="activeLink"
          >
            All Session Available ({{ count }})
          </Link>
        </div>
        <div
          v-for="item in productCategories"
          v-bind:key="item.id"
          class="categorys-mobile"
        >
          <Link
            :href="route('session.index', item.slug)"
            :class="{ 'category-active': route().params.slug == item.slug }"
            class="category-link"
            ref="activeLink"
          >
            {{ item.name }} ({{ item.sessions_count }})
          </Link>
        </div>
      </div>
      <div class="col-2">
        <div class="categorys-mobile-arrow">→</div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
const props = defineProps({ productCategories: Array, count: Number });
const productCategories = props.productCategories;
const count = props.count;

const activeLink = ref(null);

function goToActiveLink() {
  // Đợi trang tải xong
  document.addEventListener("DOMContentLoaded", function () {
    // Cuộn đến phần tử có class category-active
    if (activeLink.value) {
      activeLink.value.scrollIntoView({ behavior: "smooth", block: "center" });
    }
  });
}
goToActiveLink();
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
.session-category a:hover {
  color: #634236e0;
  font-weight: bold;
}
</style>
