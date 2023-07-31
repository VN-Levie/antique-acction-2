<template>
  <div class="RecentPosts">
    <div class="post_list_style_1">
      <div class="alith_heading">
        <h2 class="alith_heading_patern_2">Recent Posts</h2>
      </div>
<<<<<<< HEAD
      <article class="row m-2" v-for="post in paginatedList" :key="post.id">
=======
      <article class="row m-2" v-for="post in posts" :key="post.id">
>>>>>>> parent of 6edf043 (T)
        <div class="col-md-3">
          <figure class="">
            <a href="#"><img :src="post.thumbnail" alt="aaa" /></a>
          </figure>
        </div>
        <div class="col-md-9">
          <h3 class="alith_post_title">
            <a href="">{{ post.title }}</a>
          </h3>
          <div class="post_meta">
            <span>{{ post.name }}</span>
            <span class="meta_categories">
              <a v-for="category in post.tag.split(', ')" :key="category" href="#">{{ category }}</a>
            </span>
            <span class="meta_date">{{ formatDate(post.created_at) }}</span>
          </div>
          <p class="alith_post_except">
            {{ shorttext(post.content, 80) }}
          </p>
          <a :href="'/news/newsDetail/' + post.id" class="read_more"
            >Read More</a
          >
        </div>
      </article>
      <nav class="pagination_width">
        <ul class="pagination justify-content-center">
          <li class="page-item" @click="prevPage" :disabled="isFirstPage">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li
            class="page-item"
            v-for="page in totalPages"
            :key="page"
            @click="setPage(page)"
          >
            <a
              class="page-link"
              :class="{ active: page === currentPage }"
              href="#"
              >{{ page }}</a
            >
          </li>
          <li class="page-item" @click="nextPage" :disabled="isLastPage">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import { defineComponent, toRef, ref, computed } from "vue";

export default defineComponent({
  name: "RecentPosts",
<<<<<<< HEAD
  setup(props) {
    const article_list = toRef(props, "articleList");
    const currentPage = ref(1);
    const itemsPerPage = 7;

    const totalPages = computed(() =>
      Math.ceil(article_list.value.length / itemsPerPage)
    );

    const setPage = (pageNumber) => {
      currentPage.value = pageNumber;
    };

    const paginatedList = computed(() => {
      const startIndex = (currentPage.value - 1) * itemsPerPage;
      const endIndex = startIndex + itemsPerPage;
      return article_list.value.slice(startIndex, endIndex);
    });

    return {
      article_list,
      currentPage,
      totalPages,
      setPage,
      paginatedList,
    };
=======
  setup() {
    return {};
>>>>>>> parent of 6edf043 (T)
  },
  props: {
    posts: {
      type: Object,
      default: [],
    },
  },
  methods: {
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
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
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
  },
});
</script>

<style>
.pagination_width {
  margin: 50px 0 0 0;
}
</style>
