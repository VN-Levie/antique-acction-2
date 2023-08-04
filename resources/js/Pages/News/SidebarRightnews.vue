<template>
  <div id="SidebarRightnews">
    <div class="col-md-10 order-0 d-none d-md-block">
      <div class="session-category">
        <h2 class="text-center text-capitalize">category</h2>
        <ul>
          <li>
            <Link
              :href="route('news.index')"
              :class="{
                'category-active': route().params.slug == null,
              }"
              class="category-link"
            >
              All Post
            </Link>
          </li>
          <li
            v-for="Categories in Categories_Sidebar"
            :key="Categories.id"
          >
            <Link
              :href="route('news.index', Categories.slug)"
              :class="{
                'category-active': route().params.slug == Categories.slug,
              }"
              class="category-link"
            >
              {{ Categories.name }}
            </Link>
          </li>
        </ul>
        <!-- {{ route().params.slug }} -->
      </div>
    </div>

    <div class="widget-title-cover">
      <h4 class="widget-title">
        <span>new post</span>
      </h4>
      <div class="container mt-3">
        <div class="mb-2" v-for="post in latestPosts" :key="post.id">
          <Link :href="route('news.Detail', [ post.category.slug, post.slug])">
            <div class="row g-0">
              <div class="col-md-4">
                <img :src="post.thumbnail" alt="aaa" class="card-img-top" />
              </div>
              <div class="col-md-8">
                <div class="card-body ml-2">
                  <h3 class="card-title font-weight-bold"><strong>{{ post.title }}</strong></h3>
                  <p class="card-text">{{ formatDate(post.created_at) }}</p>
                  <p class="card-text">
                    {{ shorttext(post.content, 30) }}
                  </p>
                </div>
              </div>
            </div>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
  name: "#SidebarRightnews",
  setup() {
    return {};
  },
  props: {
    Categories_Sidebar: {
      type: Object,
      defualt: [],
    },
    latestPosts: {
      type: Object,
      defualt: [],
    },
  },
  methods: {
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
    formatDate(date) {
      const formattedDate = new Date(date);
      const day = String(formattedDate.getDate()).padStart(2, "0");
      const month = String(formattedDate.getMonth() + 1).padStart(2, "0");
      const year = formattedDate.getFullYear();
      const hours = String(formattedDate.getHours()).padStart(2, "0");
      const minutes = String(formattedDate.getMinutes()).padStart(2, "0");
      return `${day}/${month}/${year} ${hours}:${minutes}`;
    },
    goToActiveLink() {
      // Đợi trang tải xong
      document.addEventListener("DOMContentLoaded", function () {
        // Cuộn đến phần tử có class category-active
        if (activeLink.value) {
          activeLink.value.scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
        }
      });
    },
  },
  components: { Link },
};
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
  border-bottom: 3px dashed #634236; /*thêm viền nét đứt màu nâu phía dưới mỗi thẻ li*/
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

/* here */
.bottom_menu {
  overflow: hidden;
}
.bottom_menu li {
  float: left;
  margin: 2px 0;
  width: 110%;
}

.bottom_menu li a {
  float: left;
  margin: 2px 0;
  width: 50%;
}
</style>