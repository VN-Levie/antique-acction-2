<template>
  <HomeLayout>
  <div class="clear-fix"></div>
  <div class="News-page">
    <div class="left">
      <div class="container-new">
        <div v-for="Newpost in posts" :key="Newpost.id" class="new-post">
          <div class="new-post_img">
            <img :src="Newpost.thumbnail" alt="" />
          </div>
          <div class="new-post_info">
            <div class="new-post_date">
              <span>{{ Newpost.name }}</span>
              <!-- <span>{{ post.created_at }}</span> -->
            </div>
            <h1 class="new-post_title">{{ Newpost.title }}</h1>
            <p class="new-post_text">{{ shorttext(Newpost.content, 80) }}</p>
            <!-- <p class="new-post_text">{{ post.content  }}</p> -->
            <!-- <a :to="params: {id: Newpost.id}"" value="">" class="new-post_cta">Read More</a> -->
            <!-- <router-link :to="'/post/' + Newpost.id" class="new-post_cta">Read More</router-link> -->
          </div>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="tags-narbar">
        <h4>Các tags khác</h4>
        <ul>
          <li>
            <a class="tags-news" href="#" v-for="taga in tags" :key="taga.id">{{
              taga.nameTags
            }}</a>
          </li>
        </ul>
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
        })
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
.News-page,
.News-page::before,
.News-page::after {
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  height: 1200px;
}

.left {
  width: 920px;
}

.new-post_info {
  height: 180px;
  width: 570px;
}

.tags-narbar h4 {
  font-size: 18px;
  font-weight: bolder;
  line-height: 27px;
  display: block;
  margin: 10px 0;
}

.tags-narbar {
  padding-left: 20px;
}

.tags-news:hover {
  border-bottom: 2px solid #f3c95c;
  display: inline;
}

.tags-news {
  font-size: 16px;
  line-height: 40px;
  font-weight: 300px;
  justify-content: center;
  align-items: center;
  display: block;
}

.new-post {
  max-width: 900px;
  padding: 15px;
  box-shadow: 0 1.4rem 8rem rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  border-radius: 0.8rem;
  margin: 10px;
}

.new-post_info {
  margin-left: 20px;
  width: 635px;
}

.new-post_img {
  width: 250px;
  max-width: 350px;
  height: 180px;
  position: relative;
}

.new-post_img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 0.8rem;
  display: block;
}

/* .new-post_img img::before {
  content: "";

  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  box-shadow: 0.5rem 0.5rem 3rem 1px rgba(0, 0, 0, 0.5);
  border-radius: 0.8rem;
} */

.new-post_date span {
  display: block;
  color: #00000080;
  font-size: 16px;
  font-weight: 600;
}

.new-post_title {
  font-size: 20px;
  margin: 5px 0;
  text-transform: uppercase;
  color: #4facfe;
}

.new-post_text {
  margin-bottom: 20px;
  font-size: 14px;
  color: #000000b3;
}

.new-post_cta {
  display: inline-block;
  padding: 2px 10px;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 16px;
  text-decoration: none;
  border-radius: 0.8rem;
}

.new-post_cta:hover {
  background: #f3c95c;
}

@media screen and (max-width: 768px) {
  .News-page {
    margin: 10px 0 0 0;
    flex-direction: column;
  }
  .new-post {
    padding: 2.5px;
    flex-direction: column;
  }
  .container-new {
    margin-top: auto;
  }

  .new-post_img {
    padding-top: 10px;
    height: auto;
  }
}
</style>