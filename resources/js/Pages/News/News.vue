<template>
  <HomeLayout title="News">
    <div class="clear-fix"></div>
    <div class="margin-lr">
      <div class="container-fluid">
        <div class="container">
          <div class="margin-15">
            <div class="row">
              <div class="col-md-8">
                <RecentPosts :articleList="articleList" />
              </div>
              <aside class="col-md-4">
                <SidebarRightnews
                  :Categories_Sidebar="Categories_Sidebar"
                  :latestPosts="latestPosts"
                />
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
  </HomeLayout>
</template>

<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import RecentPosts from "./Recent_Posts.vue";
import SidebarRightnews from "./SidebarRightnews.vue";
import SiderBotom from "./SiderBotompost.vue";
import { defineComponent, useAttrs } from "vue";
import PostItem from "./PostItem.vue";


export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const articleList = attrs.Posts;

    const Categories_Sidebar = attrs.Categories;
    const latestPosts = attrs.latestPosts;

    return {
      Categories_Sidebar,
      articleList,
      latestPosts,
    };
  },
  components: {
    HomeLayout,
    RecentPosts,
    SidebarRightnews,
    SiderBotom,
    PostItem,
  },
  methods: {},
});
</script>

<style>
</style>
