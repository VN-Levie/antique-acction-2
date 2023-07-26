<template>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
      <div class="sidebar-widget">
        <div class="widget-title-cover">
          <h4 class="widget-title"><span>Most comments</span></h4>
        </div>
        <div class="latest_style_3">
          <div class="latest_style_3_item">
            <span class="item-count vertical-align">1.</span>
            <div class="alith_post_title_small">
              <a href=""
                ><strong
                  >Frtuitous spluttered unlike ouch vivid blinked far
                  inside</strong
                ></a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
      <div class="sidebar-widget">
        <div class="widget-title-cover">
          <h4 class="widget-title"><span>Latest</span></h4>
        </div>
        <div class="latest_style_2">
          <div class="latest_style_2_item">
            <figure class="alith_news_img">
              <a href=""
                ><img alt="" src="/img/works1.png" class="hover_grey"
              /></a>
            </figure>
            <h3 class="alith_post_title">
              <a href="">Magna aliqua ut enim ad minim veniam</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
      <div class="sidebar-widget">
        <div class="widget-title-cover">
          <h4 class="widget-title"><span>Categories</span></h4>
        </div>
        <ul class="bottom_menu">
          <li>
            <a
              href=""
              class=""
              v-for="CategoriesTag in Categories_tags"
              :key="CategoriesTag"
              >{{ CategoriesTag }}</a
            >
          </li>
        </ul>
      </div>
    </div>
</template>

<script>
export default {
  setup() {
    return {};
  },
  props: {
    Categories_tags: {
      type: Object,
      default: []
    }
  }
};
</script>

<style>
</style>