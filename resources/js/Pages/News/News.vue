<template>
  <HomeLayout title="New">
    <div class="clear-fix"></div>
    <div class="News-page">
      <div class="left">
        <div class="container-new">
          <div v-for="post in posts" :key="post.id" class="new-post">
            <div class="new-post_img">
              <img :src="post.imgSrc" alt="" />
            </div>
            <div class="new-post_info">
              <div class="new-post_date">
                <span>{{ post.author }}</span>
                <span>{{ post.date }}</span>
              </div>
              <h1 class="new-post_title">{{ post.title }}</h1>
              <p class="new-post_text">{{ shorttext(post.content, 80) }}</p>
              <!-- <p class="new-post_text">{{ post.content  }}</p> -->
              <a href="#" class="new-post_cta">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="tags-narbar">
          <h4>Các tags khác</h4>
          <ul>
            <li>
              <a
                class="tags-news"
                href="#"
                v-for="tag in tags"
                @click="selectedTag = tag.nameTags"
                :key="tag.id"
                >{{ tag.nameTags }}</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </HomeLayout>
</template>

<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
  setup() {
    const tags = [
      {
        id: 1,
        nameTags: "WritingPrompts",
      },
      {
        id: 2,
        nameTags: "Tình Yêu",
      },
      {
        id: 3,
        nameTags: "Ngôn Ngữ",
      },
      {
        id: 4,
        nameTags: "Bài Dịch Khác",
      },
      {
        id: 5,
        nameTags: "Bootstrap",
      },
      {
        id: 6,
        nameTags: "PHP",
      },
      {
        id: 7,
        nameTags: "Tài nguyên đồ họa",
      },
    ];
    const posts = [
      {
        id: 1,
        imgSrc: "/img/services1.jpg",
        author: "Sagar Developer",
        date: "Nov 12 2021",
        title: "Lopx ipsum dolor sit amet.",
        content:
          "Lopx ipsum dolor sit amet consectetur adipisicing elit. Dolores a, tempore veniam quasi sint fugiat facilis, facere, amet magnam optio velit. Laudantium et temporibus soluta, esse cupiditate aliquid dicta accusantium.",
      },
      {
        id: 2,
        imgSrc: "/img/services1.jpg",
        author: "Sagar Developer",
        date: "Nov 12 2021",
        title: "Lopx ipsum dolor sit amet.",
        content:
          "Lopx ipsum dolor sit amet consectetur adipisicing elit. Dolores a, tempore veniam quasi sint fugiat facilis, facere, amet magnam optio velit. Laudantium et temporibus soluta, esse cupiditate aliquid dicta accusantium.",
      },
      {
        id: 3,
        imgSrc: "/img/services1.jpg",
        author: "Sagar Developer",
        date: "Nov 12 2021",
        title: "Lopx ipsum dolor sit amet.",
        content:
          "Lopx ipsum dolor sit amet consectetur adipisicing elit. Dolores a, tempore veniam quasi sint fugiat facilis, facere, amet magnam optio velit. Laudantium et temporibus soluta, esse cupiditate aliquid dicta accusantium.",
      },
    ];


    return { posts, tags, };
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

};
</script>

<style>
.News-page,
.News-page::before,
.News-page::after {
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
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