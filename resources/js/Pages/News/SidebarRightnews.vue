<template>
  <div id="SidebarRightnews" class="sidebar_right">
    <div class="widget-title-cover">
      <h4 class="widget-title">
        <span>Popular Articles</span>
      </h4>
    </div>
    <div class="latest_style_1">
      <div class="latest_style_1_item">
        <!-- <span class="item-count vertical-align">1.</span> -->
        <div class="alith_post_title_small">
          <a href=""><strong>Ut enim ad minima veniam, quis nostrum</strong></a>
          <p class="meta">
            <span>2 Sep, 2023</span>
          </p>
        </div>
        <figure class="alith_news_img">
          <a href=""
            ><img src="/img/works1.png" alt="" class="Popular_img"
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

    <div class="sidebar-widget">
      <div class="widget-title-cover">
        <h4 class="widget-title"><Link :href="route('news.index')">Categories</Link></h4>
      </div>
      <ul class="bottom_menu">
<<<<<<< HEAD
        <li v-for="CategoriesTag in Categories_tags" :key="CategoriesTag">
          <Link :href="route('news.index', CategoriesTag.slug)" class="">{{
            CategoriesTag.name
          }}</Link>
=======
        <li>
          <a
            href=""
            class=""
            v-for="CategoriesTag in Categories_tags"
            :key="CategoriesTag"
            >{{ CategoriesTag }}</a
          >
>>>>>>> parent of 6edf043 (T)
        </li>
      </ul>
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
    tags_cloud: {
      type: Object,
      defualt: [],
    },
    Categories_tags: {
      type: Object,
      defualt: [],
    },
<<<<<<< HEAD
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
=======
>>>>>>> parent of 6edf043 (T)
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
  width: 80%;
}

.bottom_menu li a {
  float: left;
  margin: 2px 0;
  width: 50%;
}
</style>