<template>
  <div class="RecentPosts">
    <div class="container">
      <div class="card mb-2" v-for="post in articleList.data" :key="post.id">
        <div class="row g-0">
          <div class="col-md-4">
              <img :src="post.thumbnail" alt="aaa" class="card-img-top" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title font-weight-bold"><strong>{{ post.title }}</strong></h3>
              <p class="card-text">{{ formatDate(post.created_at) }}</p>
              <p class="card-text">{{ post.author.name }}</p>
              <a
                v-for="category in post.tag.split(', ')"
                :key="category"
                href="#"
                >{{ category }}</a
              >
              <p class="card-text">
                {{ shorttext(post.content, 100) }}
              </p>
              
              <Link
                :href="route('news.Detail', [post.category.slug, post.slug])"
                class="btn float-right"
                >Read More</Link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <ul class="pagination justify-center bottom-0 session-pagination mb-3 mt-3">
      <li
        v-for="page in links"
        v-bind:key="page"
        class="page-item session-page-item"
        :class="{ active: page.active }"
      >
        <Link class="page-link session-page-link" :href="page.url">
          <span v-html="page.label"></span>
        </Link>
      </li>
    </ul>
    </div>
  </div>
</template>

  <script>
import { defineComponent, useAttrs } from "vue";
import { Link } from "@inertiajs/vue3";
import PostItem from "./PostItem.vue";

export default defineComponent({
  name: "RecentPosts",
  setup() {
    const attrs = useAttrs();

    const links = attrs.articleList.links;
    const articleList = attrs.articleList;
    return {
      articleList,
      links,
    };
  },
  components: { PostItem },
  methods: {
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
  components: { Link },
});
</script>

  <style>
</style>
