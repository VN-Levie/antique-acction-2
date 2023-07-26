<template>
  <div class="RecentPosts">
    <div class="post_list_style_1">
      <div class="alith_heading">
        <h2 class="alith_heading_patern_2">Recent Posts</h2>
      </div>
      <article class="row m-2" v-for="post in posts" :key="post.id">
        <div class="col-md-3">
          <figure class="">
            <a href="#"><img :src="post.thumbnail" alt="aaa" /></a>
          </figure>
        </div>
        <div class="col-md-9">
          <h3 class="alith_post_title">
            <a href="">{{ post.title }}</a>
          </h3>
          <div class="post_meta">
            <span>{{ post.name }}</span>
            <span class="meta_categories">
              <a
                v-for="category in post.tag.split(', ')"
                :key="category"
                href="#"
                >{{ category }}</a
              >
            </span>
            <span class="meta_date">{{ formatDate(post.created_at) }}</span>
          </div>
          <p class="alith_post_except">
            {{ post.content }}
          </p>
          <a href="" class="read_more">Read More</a>
        </div>
      </article>
    </div>
  </div>
</template>

<script>
export default {
  name: "RecentPosts",
  setup() {
    return {};
  },
  props: {
    posts: {
      type: Object,
      default: [],
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
</style>