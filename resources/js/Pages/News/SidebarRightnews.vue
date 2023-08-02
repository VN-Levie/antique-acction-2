<template>
  <div id="SidebarRightnews" class="sidebar_right">
    <div class="sidebar-widget">
      <div class="widget-title-cover">
        <h4 class="widget-title">
          <Link :href="route('news.index')"><span>Categories</span></Link>
        </h4>
      </div>
      <ul class="bottom_menu">
        <li v-for="Categories in Categories_Sidebar" :key="Categories">
          <Link :href="route('news.index', Categories.slug)" class="">{{
            Categories.name
          }}</Link>
        </li>
      </ul>
    </div>

    <div class="widget-title-cover">
      <h4 class="widget-title">
        <span>Popular Articles</span>
      </h4>
    </div>
    <div class="latest_style_1">
      <div
        class="latest_style_1_item"
        v-for="post in latestPosts"
        :key="post.id"
      >
        <!-- <span class="item-count vertical-align">1.</span> -->
        <div class="alith_post_title_small">
          <Link
            :href="route('news.Detail', [post.category.slug ,post.slugNews])"
            ><strong>{{ post.title }}</strong></Link
          >
          <p class="meta">
            <span>{{ formatDate(post.created_at) }}</span>
          </p>
        </div>
        <figure class="alith_news_img">
          <a href=""
            ><img :src="post.thumbnail" alt="aaaaaaaaa" class="Popular_img"
          /></a>
        </figure>
      </div>
    </div>

    <!-- <div class="sidebar-widget">
      <div class="widget-title-cover">
        <h4 class="widget-title"><span>Tags cloud</span></h4>
      </div>
      <div class="alith_tags_all">
        <a
          href=""
          class="alith_tagg"
          v-for="tagcloud in tags_cloud"
          :key="tagcloud"
          >{{ tagcloud }}</a
        >
      </div>
    </div> -->

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
    formatDate(date) {
      const formattedDate = new Date(date);
      const day = String(formattedDate.getDate()).padStart(2, "0");
      const month = String(formattedDate.getMonth() + 1).padStart(2, "0");
      const year = formattedDate.getFullYear();
      const hours = String(formattedDate.getHours()).padStart(2, "0");
      const minutes = String(formattedDate.getMinutes()).padStart(2, "0");
      return `${day}/${month}/${year} ${hours}:${minutes}`;
    },
  },
  components: { Link },
};
</script>

<style>
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