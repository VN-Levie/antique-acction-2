<template>
  <div id="SidebarRightnews" class="sidebar_right ">
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

    <div class="sidebar-widget">
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
    </div>
  </div>
</template>

<script>
export default {
  name:"#SidebarRightnews",
  setup() {
    return {};
  },
  props: {
    tags_cloud: {
      type: Object,
      defualt: [],
    }
  }
};
</script>

<style>
</style>