<template>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="sidebar-widget">
      <div class="widget-title-cover">
        <h4 class="widget-title"><span>Related Articles</span></h4>
      </div>
      <div
        class="latest_style_3"
        v-for="(SimilarPosts, index) in relatedArticles"
        :key="SimilarPosts.id"
      >
        <div class="latest_style_3_item">
          <span class="item-count vertical-align">{{ index + 1 }}.</span>
          <div class="alith_post_title_small">
            <Link
              :href="
                route('news.Detail', [
                  SimilarPosts.category.slug,
                  SimilarPosts.slug,
                ])
              "
              ><strong>{{ SimilarPosts.title }}</strong>
              <br />
              <span>{{ shorttext(SimilarPosts.content, 40) }}</span>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
  <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
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
    </div> -->
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
  setup() {
    return {};
  },
  props: {
    relatedArticles: {
      type: Object,
      default: [],
    },
    topViewedPosts: {
      type: Object,
      default: [],
    },
  },
  methods: {
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
  },
  components: { Link },
};
</script>

<style>
.sidebar-widget {
  margin: 0 0 30px 0;
}
.widget-title-cover {
  line-height: 1;
  margin-bottom: 10px;
  overflow: hidden;
}

h4.widget-title {
  font-size: 16px;
  position: relative;
  text-transform: uppercase;
  display: inline-block;
}
h4.widget-title::after {
  background: #000 none repeat scroll 0 0;
  bottom: 10px;
  content: "";
  display: inline-block;
  height: 1px;
  left: 100%;
  position: absolute;
  width: 100vw;
}
h4.widget-title span {
  padding-left: 15px;
  padding-right: 10px;
}
h4.widget-title span::before {
  background: #000 none repeat scroll 0 0;
  border-radius: 50%;
  content: "";
  height: 8px;
  left: 0;
  margin-top: -4px;
  position: absolute;
  top: 50%;
  width: 8px;
}
.latest_style_3_item {
  border-bottom: 1px solid #eee;
  min-height: 50px;
  overflow: hidden;
  padding: 40px 0;
  position: relative;
}
.latest_style_3_item span.item-count {
  float: left;
  font-size: 30px;
}
.latest_style_3_item .alith_post_title_small {
  clear: none;
  float: left;
  left: 12%;
  margin-left: 0;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 90%;
}
.latest_style_3 .latest_style_3_item:last-child {
  border: none;
}

.vertical-align {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}

.latest_style_2_item_first h3.alith_post_title {
  font-size: 18px;
  font-weight: 300;
}
.latest_style_2_item_first {
  border-bottom: 1px solid #eee;
  margin-bottom: 20px;
  overflow: hidden;
  padding-bottom: 10px;
}
.latest_style_2_item {
  border-bottom: 1px solid #eee;
  margin-bottom: 20px;
  overflow: hidden;
  padding-bottom: 20px;
  position: relative;
}
.latest_style_2_item figure {
  display: block;
  float: left;
  margin: 0 15px 0 0;
  position: relative;
  width: 35%;
}
.latest_style_2_item h3.alith_post_title {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 15px;
}
.latest_style_2 .latest_style_2_item:last-child {
  border-bottom: 0 none;
  margin: 0;
  padding: 0;
}

.latest_style_1_item .alith_news_img {
  display: block;
  float: right;
  margin: 0;
  position: relative;
  width: 35%;
}

.alith_news_img {
  height: 106px !important;
  width: 122px p !important;
  max-width: 100%;
}

.latest_style_2_item figure {
  width: 25%;
}

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