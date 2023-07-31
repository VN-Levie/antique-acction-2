<template>
  <article class="section_margin">
    <div class="post-content">
      <div class="single-content">
        <div class="column-2">
          <p v-for="(content, index) in content.split('. ')" :key="index">
            {{ content }}
          </p>
        </div>
        <div class="post-tags">
          <div class="post-tags-inner">
            <a rel="tag" href="">{{ categorytag.name }}</a>
          </div>
        </div>
        <!-- <div class="post-share">
          <ul>
            <li class="facebook">
              <a href="single.html"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="twitter">
              <a href="single.html"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="google-plus">
              <a href="single.html"><i class="fa fa-google-plus"></i></a>
            </li>
            <li class="instagram">
              <a href="single.html"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </article>
</template>

<script>
export default {
  components: {},
  props: {
    content: {
      type: Object,
      defualt: [],
    },
    categorytag: {
      type: Object,
      defualt: [],
    },
  },
};
</script>

<style>
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
