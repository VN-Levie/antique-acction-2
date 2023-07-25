<template>
  <HomeLayout>
    <div class="clear-fix"></div>
    <div class="margin-lr">
      <div class="container-fluid">
        <div class="container">
          <div class="margin-15">
            <div class="row">
              <div class="col-md-8">
                <div class="post_list_style_1">
                  <div class="alith_heading">
                    <h2 class="alith_heading_patern_2">Recent Posts</h2>
                  </div>
                  <article class="row">
                    <div class="col-md-3">
                      <figure class="">
                        <a href="#"><img src="/img/works1.png" alt="" /></a>
                      </figure>
                    </div>
                    <div class="col-md-9">
                      <h3 class="alith_post_title">
                        <a href="">Magna aliqua ut enim ad minim veniam</a>
                      </h3>
                      <div class="post_meta">
                        <span>name</span>
                        <span class="meta_categories"
                          ><a href="#">Politics</a>, <a href="#">News</a></span
                        >
                        <span class="meta_date">18 Sep, 2023</span>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
              <aside class="col-md-4">
                <div class="sidebar_right">
                  <div class="">
                    <div class="widget-title-cover">
                      <h4 class="widget-title">
                        <span>Popular Articles</span>
                      </h4>
                    </div>
                    <div class="latest_style_1">
                      <div class="latest_style_1_item">
                        <!-- <span class="item-count vertical-align">1.</span> -->
                        <div class="alith_post_title_small">
                          <a href=""
                            ><strong
                              >Ut enim ad minima veniam, quis nostrum</strong
                            ></a
                          >
                          <p class="meta">
                            <span>2 Sep, 2023</span> <span>268 views</span>
                          </p>
                        </div>
                        <figure class="alith_news_img">
                          <a href=""><img src="/img/works1.png" alt="" /></a>
                        </figure>
                      </div>
                    </div>
                  </div>

                  <div class="sidebar-widget">
                    <div class="widget-title-cover">
                      <h4 class="widget-title"><span>Tags cloud</span></h4>
                    </div>
                    <div class="alith_tags_all">
                      <a href="" class="alith_tagg">Business</a>
                      <a href="" class="alith_tagg">Technology</a>
                      <a href="" class="alith_tagg">Sport</a>
                      <a href="" class="alith_tagg">Art</a>
                      <a href="" class="alith_tagg">Lifestyle</a>
                      <a href="" class="alith_tagg">Three</a>
                      <a href="" class="alith_tagg">Photography</a>
                      <a href="" class="alith_tagg">Lifestyle</a>
                      <a href="" class="alith_tagg">Art</a>
                      <a href="" class="alith_tagg">Education</a>
                      <a href="" class="alith_tagg">Social</a>
                      <a href="" class="alith_tagg">Three</a>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="container">
          <div class="bottom margin-15">
            <div class="row">
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
                    <li><a href="" class=""> Business</a></li>
                    <li><a href="" class=""> Entertainment</a></li>
                    <li><a href="" class=""> Environment</a></li>
                    <li><a href="" class=""> Health</a></li>
                    <li><a href="" class=""> Life style</a></li>
                    <li><a href="" class=""> Politics</a></li>
                    <li><a href="" class=""> Technology</a></li>
                    <li><a href="" class=""> World</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </HomeLayout>
</template>

<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { defineComponent, ref } from "vue";

export default defineComponent({
  setup() {
    const posts = ref([]);

    const getposts = () => {
      axios
        .get("http://127.0.0.1:8000/api/news")
        .then(function (response) {
          posts.value = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    };
    getposts();
    return {
      tags: [
        {
          id: 1,
          nameTags: "tag1",
        },
        {
          id: 2,
          nameTags: "tag2",
        },
        {
          id: 3,
          nameTags: "tag3",
        },
        {
          id: 4,
          nameTags: "tag4",
        },
        {
          id: 5,
          nameTags: "tag5",
        },
        {
          id: 6,
          nameTags: "tag6",
        },
      ],
      posts,
    };
  },
  components: {
    HomeLayout,
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

.sidebar-widget {
  margin: 0 0 30px 0;
}
.vertical-align {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
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
.bottom_menu {
  overflow: hidden;
}
.bottom_menu li {
  float: left;
  margin: 2px 0;
  width: 50%;
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

.latest_style_2_item figure {
  width: 25%;
}

/*image hover*/
.hover_grey:hover {
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
  transition: filter 0.5s ease-in-out;
}

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