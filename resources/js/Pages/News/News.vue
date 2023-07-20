<template>
  <HomeLayout title="New">
      <div class="News-page">
        <div class="container-new">
          <h2>Post</h2>
          <div class="new-post">
            <div class="new-post_img">
              <img
                src="/img/services1.jpg"
                alt=""
              />
            </div>
            <div class="new-post_info">
              <div class="new-post_date">
                <span>Sagar Developer</span>
                <span>Nov 12 2021</span>
              </div>
              <h1 class="new-post_title">Lorem ipsum dolor sit amet.</h1>
              <p class="new-post_text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                a, tempore veniam quasi sint fugiat facilis, facere, amet magnam
                optio velit. Laudantium et temporibus soluta, esse cupiditate
                aliquid dicta accusantium.
              </p>
              <a href="#" class="new-post_cta">Read More</a>
            </div>
          </div>

          <div class="new-post">
            <div class="new-post_img">
              <img
                src="/img/services1.jpg"
                alt=""
              />
            </div>
            <div class="new-post_info">
              <div class="new-post_date">
                <span>Sagar Developer</span>
                <span>Dec 25 2021</span>
              </div>
              <h1 class="new-post_title">Lorem ipsum dolor sit amet.</h1>
              <p class="new-post_text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                a, tempore veniam quasi sint fugiat facilis, facere, amet magnam
                optio velit. Laudantium et temporibus soluta, esse cupiditate
                aliquid dicta accusantium.
              </p>
              <a href="#" class="new-post_cta">Read More</a>
            </div>
          </div>
        </div>
      </div>
  </HomeLayout>
</template>

<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
  setup() {
    return {};
  },
  components: {
    HomeLayout,
  },
};
</script>

<style>
.News-page,
.News-page::before,
.News-page::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.News-page {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #eee;
  padding: 0 1.5rem;
}

.container-new {
  margin-top: 150px;
}

.container-new h2 {
  letter-spacing: 1px;
  font-size: 50px;
  color: #6968aa;
  border: 2px dashed #0181a0;
  padding: 10px;
  text-transform: uppercase;
  border-radius: 10px;
  display: inline-block;
  cursor: pointer;
  text-align: center;
  margin-top: 90px;
  margin-left: 375px;
}

.new-post {
  width: 100%;
  max-width: 98rem;
  padding: 5rem;
  background-color: #dbf4ff21;
  box-shadow: 0 1.4rem 8rem rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  border-radius: 0.8rem;
  margin: 10px;
}

.new-post_img {
  min-width: 35rem;
  max-width: 35rem;
  height: 30rem;
  transform: translateX(-8rem);
  position: relative;
}

.new-post_img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 0.8rem;
  display: block;
}

.new-post_img img::before {
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  box-shadow: 0.5rem 0.5rem 3rem 1px rgba(0, 0, 0, 0.5);
  border-radius: 0.8rem;
}

.new-post_date span {
  display: block;
  color: #00000080;
  font-size: 1.6rem;
  font-weight: 600;
  margin: 0.5rem 0;
}

.new-post_title {
  font-size: 2.5rem;
  margin: 1.5rem 0 2rem;
  text-transform: uppercase;
  color: #4facfe;
}

.new-post_text {
  margin-bottom: 3rem;
  font-size: 1.4rem;
  color: #000000b3;
}

.new-post_cta {
  display: inline-block;
  padding: 1.5rem 3rem;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 1.2rem;
  color: #fff;
  text-decoration: none;
  border-radius: 0.8rem;
  /* background: linear-gradient(to right, #c945cf 0%, #04a6bd 100%); */
}

.new-post_cta:hover {
  /* background: linear-gradient(to right, #04a6bd 0%, #c945cf 100%); */
}

@media screen and (max-width: 1068px) {
  .new-post {
    max-width: 80rem;
  }
  .new-post_img {
    min-width: 30rem;
    max-width: 30rem;
  }
  .container-new h2 {
    margin-top: 120px;
    margin-left: 275px;
  }
}

@media screen and (max-width: 868px) {
  .new-post {
    max-width: 70rem;
  }
  .container-new h2 {
    margin-top: 20px;
    margin-left: 142px;
  }
}

@media screen and (max-width: 768px) {
  .new-post {
    padding: 2.5rem;
    flex-direction: column;
  }
  .new-post_img {
    min-width: 100%;
    max-width: 100%;
    transform: translate(0, -1rem);
  }
  .container-new {
    margin-top: auto;
  }
}

@media screen and (max-width: 823px) {
  .container-new h2 {
    margin-top: 35px;
    margin-left: 142px;
  }
}
</style>