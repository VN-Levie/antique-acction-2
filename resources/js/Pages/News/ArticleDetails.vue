<template>
  <div class="container-fluid session-detail-section bg-white mb-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h2 class="text-center">{{ newsDetailData.title }}</h2>
          <p class="text-center text-uppercase action-titles-type">
            BY {{ newsDetailData.author.name }}
          </p>
          <p class="text-center action-titles-type">
            <span class="text-warning">
              {{ formatDate(newsDetailData.created_at) }}</span
            >
          </p>

          <div class="card-footer mt-3">
            <div class="row">
              <div class="col-md-12 col-12">
                <p class="auction-card-footer-text text-center">
                  <i class="fa fa-eye"></i>
                  <span>VIEW {{ newsDetailData.count_view }}</span>
                </p>
              </div>
            </div>
          </div>
          <img
            src="/img/mt-1804-home-divider2.png"
            class="img-center mt-1 lazyload"
          />
        </div>
      </div>
    </div>
  </div>
  <article class="section_margin row">
    <div class="post-content col-md-12 col-12">
      <div class="single-content">
        <div class="column-2">
          <p
            v-for="(content, index) in newsDetailData.content.split('.')"
            :key="index"
          >
            {{ content }}
            <span v-if="index < newsDetailData.content.split('. ').length - 1"
              >.</span
            >
          </p>
        </div>
        <div class="post-tags">
          <div class="post-tags-inner">
            <Link
              rel="tag"
              :href="route('news.index', newsDetailData.category.slug)"
              >{{ newsDetailData.category.name }}</Link
            >
          </div>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
  setup(props) {
    const newsDetailData = props.newsDetail;
    return { newsDetailData };
  },
  components: { Link },
  props: {
    content: {
      type: Object,
      defualt: [],
    },
    newsDetail: {
      type: Object,
      defualt: [],
    },
    categorytag: {
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
};
</script>

<style>
.session-detail-section {
  /* border: 0.5px solid #ccc; */
  /* padding: 10px; */
  margin-bottom: 10px;
  transition: all 0.3s ease-in-out;
}
.session-detail-section h2 {
  font-family: "Smythe", cursive;
  font-size: 30px;
}
.tabs-title {
  font-family: "Smythe", cursive;
  font-size: 1.2rem;
}
.action-titles-type {
  font-family: "Montserrat", sans-serif;
  font-size: 0.8rem;
}
.img-center {
  margin: 0 auto;
}
.session-description p {
  font-size: 1.5rem;
  /* font-size: 30px; */
}
.session-detail-section .card {
  border: none;
}
.session-detail-section .card-footer {
  border: none;
  background-color: white;
  font-size: 21px;
}
.auction-card-footer-text {
  font-size: 0.8rem;
}
.nav-tabs .nav-item .nav-link {
  /* background-color: #634236b7; */
  color: #fff;
}

.tab-content {
  /* border: 1px solid #dee2e6; */
  border-top: transparent;
  padding: 15px;
}

.tab-content .tab-pane {
  background-color: #fff;
  /* color: #0080ff; */
  min-height: 200px;
  height: auto;
}
.text-product-estimate {
  color: #634236;
  font-size: large;
}
.text-roduct-name {
  font-family: "Smythe", cursive;
  font-size: 1.5rem;
  color: #634236;
  overflow: hidden;
}
.card-product {
  border: 1px solid #634236 !important;
  background-color: transparent;
  color: #634236;
  /* box-shadow: #634236 0px 0px 0px 1px inset !important; */
}
.overview-tab a {
  color: #634236 !important;
}
.overview-tab:hover {
  text-shadow: #634236 0px 0px 0px 1px !important;
}
.product-bid-info {
  font-family: "Smythe", cursive;
  font-size: 1.2rem !important;
  /* font-family: "Montserrat", sans-serif; */
}

/* here */
.dropcap p:first-child::first-letter {
  display: block;
  float: left;
  font-size: 5em;
  font-weight: 700;
  line-height: 1;
  margin: 5px 18px 10px 0;
}
.dropcap blockquote p:first-child::first-letter {
  display: inline;
  float: none;
  font-size: inherit;
  font-weight: inherit;
  line-height: inherit;
  margin: 0;
  padding: 0;
}
.column-2 {
  columns: 2;
  -webkit-columns: 2;
  -moz-column-count: 2;
  -webkit-column-gap: 30px; /* Chrome, Safari, Opera */
  -moz-column-gap: 30px; /* Firefox */
  column-gap: 30px;
  text-align: justify;
}
.single-content h1,
.single-content h2,
.single-content h3,
.single-content h4,
.single-content h5,
.single-content h6 {
  margin-bottom: 1rem;
}
.single-content {
  background: #fff none repeat scroll 0 0;
  font-size: 120%;
  font-weight: 500;
  padding: 20px;
  text-align: left;
}

.post-tags {
  text-align: center;
  margin: 40px 0;
}
.post-tags-inner {
  background: #eee;
  display: inline;
  padding: 2px 10px;
  margin: 0 auto;
}
.post-tags a {
  padding: 0 10px;
}
.single-comment-title::before,
.comment-reply-title::before {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 10px;
  width: 30px;
}
.single-comment-title::after,
.comment-reply-title::after {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-left: 10px;
  width: 30px;
}
.single-comment-title,
.comment-reply-title {
  font-size: 1.75rem;
  position: relative;
  text-align: center;
  text-transform: uppercase;
}

.comments-title {
  text-align: center;
}
.comments-title p {
  background: #000 none repeat scroll 0 0;
  color: #fff;
  display: inline;
  padding: 0 20px;
  text-align: center;
}

ol.commentlist {
  list-style: outside none none;
  margin: 0;
  padding: 50px 50px 0;
}
ol.commentlist li {
  list-style: outside none none;
}
ol.commentlist li article {
  padding: 0 50px 20px 0;
  position: relative;
}
ol.commentlist ul {
  padding: 0 0 0 30px;
}
ol.commentlist .comment-author {
  float: left;
  margin: 0 20px 0 0;
}
ol.commentlist .comment-author img {
  border: 1px solid;
  padding: 3px;
}
ol.commentlist .reply {
  position: absolute;
  right: -20px;
  top: 20%;
}
ol.commentlist li ul article {
  padding: 0 50px 20px 0;
}
ol.commentlist li article:hover a.comment-reply-link {
  background: #000;
  color: #fff;
  transition-duration: 0.2s;
}
a#cancel-comment-reply-link {
  display: none;
}
.single-comment-title::before,
.comment-reply-title::before {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 10px;
  width: 30px;
}
.single-comment-title::after,
.comment-reply-title::after {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-left: 10px;
  width: 30px;
}
.single-comment-title,
.comment-reply-title {
  font-size: 1.75rem;
  position: relative;
  text-align: center;
  text-transform: uppercase;
}
.comments-title {
  text-align: center;
}
.comments-title p {
  background: #000 none repeat scroll 0 0;
  color: #fff;
  display: inline;
  padding: 0 20px;
  text-align: center;
}

.comment-navigation {
  text-align: right;
}
.comment-respond {
  padding-top: 30px;
}

.comment-form textarea,
.comment-form input {
  border: 1px solid #000;
  color: #000;
  font-size: 14px;
  margin: 0 0 20px;
}
.comment-form textarea {
  min-height: 150px;
}
.comment-form input.submit {
  background: #000 none repeat scroll 0 0;
  border: medium none;
  color: #fff;
  height: 50px;
  line-height: 1;
  padding: 10px 25px;
  text-transform: uppercase;
}

.comment-notes {
  margin-bottom: 30px;
  text-align: center;
}
</style>
