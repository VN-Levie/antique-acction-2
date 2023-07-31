<template>
  <HomeLayout :title="$attrs.title">
    <div class="clear-fix"></div>
    <div class="margin-lr">
      <div class="container-fluid">
        <div class="container">
          <div class="margin-15">
            <div class="row">
              <div class="col-md-8">
                <ArticleDetails :content="$attrs.content" :categorytag="categorytag"/>
              </div>
              <aside class="col-md-4">
                <SidebarRightnews :latestPosts="latestPosts" :Categories_Sidebar="Categories_Sidebar"/>
              </aside>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="container">
          <div class="bottom margin-15">
            <div class="row">
              <SiderBotom :relatedArticles="relatedArticles" />
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
import ArticleDetails from "./ArticleDetails.vue";

import { defineComponent, useAttrs } from "vue";

export default defineComponent({
  setup() {
    const attrs = useAttrs();

    const Categories_Sidebar = attrs.Categories;
    const latestPosts = attrs.latestPosts;
    const relatedArticles = attrs.relatedArticles;
    const categorytag = attrs.categorytag;
    return {
      Categories_Sidebar,
      latestPosts,
      relatedArticles,
      categorytag
    };
  },
  components: {
    HomeLayout,
    RecentPosts,
    SidebarRightnews,
    SiderBotom,
    ArticleDetails,
  },
  methods: {
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
  },
});
</script>

<style>
.margin-lr {
  margin: 0 100px;
}

/* a {
  color: #000000;
  text-decoration: none;
}
strong {
  font-weight: 500;
} */
.aligncenter,
img.aligncenter {
  clear: both;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.Popular_img {
  height: 106px;
  width: 122px;
}
.alith_post_except {
  font-size: 16px;
  padding-right: 150px;
}
.alith_post_except a {
  border-bottom: 1px solid;
  padding-bottom: 2px;
  text-transform: uppercase;
}

.alith_post_except {
  font-size: 16px;
  padding-right: 100px;
}
.read_more {
  background: #fff none repeat scroll 0 0;
  /* color: #fff; */
  font-size: 80%;
  padding: 0 2px;
  text-transform: uppercase;
}

/*COLOR*/
a:focus,
a:hover,
.top_bar .social a:hover i,
.post_meta span a:hover,
a.link-active,
.sticky .alith_post_title a {
  color: #e5633f;
  text-decoration: none;
}
::selection {
  background: #000;
  /* WebKit/Blink Browsers */
  color: #fff;
}
::-moz-selection {
  background: #000;
  /* Gecko Browsers */
  color: #fff;
}
.alith_tagg:hover,
.alith_tagg:focus {
  background: #e5633f;
}

.alith_heading_patern_2 {
  font-size: 50px;
  margin-bottom: 50px;
  text-align: center;
  text-transform: uppercase;
}
.alith_heading_patern_2::before {
  content: "";
  display: inline-block;
  height: 30px;
  margin-right: 10px;
  width: 60px;
}
.alith_heading_patern_2::after {
  content: "";
  display: inline-block;
  height: 30px;
  margin-left: 10px;
  width: 60px;
}
.alith_post_title {
  font-size: 24px;
  font-weight: 500;
  margin-bottom: 15px;
}
.post_meta {
  font-size: 80%;
  font-weight: 300;
}
.post_meta span {
  color: #888;
  margin: 0 20px 0 0;
}
.post_meta span a {
  color: #888;
}
.post_meta .meta_author_avatar img {
  height: 20px;
  width: 20px;
  border-radius: 50%;
}
.post_meta .meta_categories,
.post_meta .meta_date,
.post_meta_date {
  text-transform: uppercase;
}
.meta_categories a:hover {
  color: #e5633f;
}

.sidebar_right {
  position: relative;
}
.sidebar_right::after {
  background: #eee none repeat scroll 0 0;
  content: "";
  height: 100%;
  left: -10px;
  position: absolute;
  top: 0;
  width: 1px;
}
.latest_style_1_item {
  border-bottom: 1px solid #eee;
  overflow: hidden;
  padding: 10px 0;
  position: relative;
  min-height: 80px;
}
.latest_style_1 .latest_style_1_item:last-child {
  border: none;
}
.latest_style_1 .latest_style_1_item:first-child {
  padding-top: 0;
}
.latest_style_1_item span.item-count {
  float: left;
  font-size: 30px;
}
.latest_style_1_item .alith_post_title_small {
  clear: none;
  float: left;
  left: 12%;
  margin-left: 0;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 50%;
  color: #888;
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

.alith_tagg {
  background: #f1f1f1;
  padding: 10px 15px;
  color: #222;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
  -ms-transition: all 0.5s ease;
  transition: all 0.5s ease;
  margin-right: 8px;
  margin-top: 5px;
  margin-bottom: 5px;
  display: inline-block;
}
.alith_tagg:hover,
.alith_tagg:focus {
  color: #fff;
  text-decoration: none;
}
.bottom {
  border-bottom: 3px solid;
  padding: 30px 0 0;
}

.bottom-logo {
  border: 1px solid #333;
  transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  width: 30px;
  height: 30px;
  display: block;
}
.bottom-logo {
  background: #333;
  transition-duration: 0.2s;
}

.bottom-logo {
  color: #fff;
}
.bottom-logo {
  transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
}

.post_list_style_1 .post_meta {
  margin-bottom: 20px;
}

/*image hover*/

@media (max-width: 1024px) {
  .latest_style_1_item .alith_post_title_small {
    left: 16% !important;
    top: 50% !important;
    width: auto !important;
  }

  .post_meta {
    font-size: 80%;
    font-weight: 300;
  }
  .alith_heading_patern_2 {
    font-size: 40px;
    margin-bottom: 30px;
  }
}

@media (max-width: 768px) {
  .alith_post_title {
    font-size: 2em;
  }
}
@media (max-width: 480px) {
  .alith_post_title {
    font-size: 1.2em;
    margin: 0;
  }
  .alith_heading_patern_2 {
    font-size: 25px;
  }
  .alith_heading_patern_2::before,
  .alith_heading_patern_2::after {
    height: 10px;
  }
}
</style>
