<template>
  <div class="work" id="work">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_word"> Our Last Work</span>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <img
          src="/img/mt-1804-home-divider1.png"
          alt="divider1"
          class="logo-img"
        />
      </div>
    </div>

    <div class="work-content">
      <ul class="tab-work">
        <li
          :class="{ toggoArrivals }"
          @click="changetabs('ARRIVALS'), changeclassArrivals()"
        >
          NEW ARRIVALS
        </li>
        <li
          :class="{ toggoPopular }"
          @click="changetabs('POPULAR'), changeclassPopular()"
        >
          POPULAR
        </li>
      </ul>
      <div class="work-container" v-if="tabSelected === 'ARRIVALS'">
        <div v-for="(card, index) in arrivals" :key="index" class="work-card">
          <div class="col">
            <img :src="card.image" :alt="card.title" class="work-card-img" />
            <h2 class="title_work">{{ card.title }}</h2>
          </div>
        </div>
      </div>
      <div class="work-container" v-else>
        <div v-for="(card, index) in popular" :key="index" class="work-card">
          <div class="col">
            <img :src="card.image" :alt="card.title" class="work-card-img" />
            <h2 class="title_work">{{ card.title }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  el: "#work", // This is unnecessary if you are using Vue 3's single-file components
  data() {
    return {
      tabSelected: "ARRIVALS",
      toggoArrivals: true,
      toggoPopular: false,
      arrivals: [
        { title: "French Empire figural", image: "img/works1.png" },
        { title: "George II Mahogany", image: "img/works2.png" },
        { title: "Classical Gilt Wood", image: "img/works3.png" },
        { title: "Hammond Multiplex", image: "img/works4.png" },
        { title: "Oriental Furniture", image: "img/works5.png" },
        { title: "Antique Replica", image: "img/works6.png" },
        { title: "Retro Antique Country", image: "img/works7.png" },
        { title: "Antique Reproduction", image: "img/works8.png" },
      ],
      popular: [
        { title: "Antique Reproduction", image: "img/works8.png" },
        { title: "Oriental Furniture", image: "img/works5.png" },
        { title: "Retro Antique Country", image: "img/works7.png" },
        { title: "Antique Replica", image: "img/works6.png" },
      ],
    };
  },
  methods: {
    changetabs(tab) {
      this.tabSelected = tab;
    },
    changeclassArrivals() {
      (this.toggoArrivals = true), (this.toggoPopular = false);
    },
    changeclassPopular() {
      (this.toggoArrivals = false), (this.toggoPopular = true);
    },
  },
  computed: {
    objClass: function () {
      return {
        toggoArrivals: true,
        toggoPopular: false,
      };
    },
  },
};
</script>

<style>
.work {
  margin-top: 40px;
}

.tab-work {
  margin: 0;
  padding: 0;
}

.tab-work li {
  display: inline-block;
  padding: 10px 15px;
  margin: 10px;
}

.title_word {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  color: #292929;
  font-size: 55px;
  line-height: 1.4;
  letter-spacing: 0px;
}

.logo-img {
  width: 500px;
}

.work-content {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 700;
  justify-content: center;
  text-align: center;
  margin: 30px 0 0 0;
  box-sizing: border-box;
  flex-direction: column;
}

.work-content span {
  margin: 20px 7px;
  color: #292929;
}

.title_work {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  /* color: #292929; */
  font-size: 20px;
  line-height: 1.5;
  letter-spacing: 0px;
}

.work-container {
  display: flex;
  justify-content: center;
  text-align: center;
  flex-wrap: wrap;
  padding: 30px;
  width: 1270px;
  margin: auto;
}

.work-card {
  width: 300px;
  height: 415px;
  margin: 30px 0 30px 0;
  background-color: #f3f3f3; /* Set a background color if you want to display something behind the image */
  display: flex;
  justify-content: center;
  align-items: center;
}

.work-card h2 {
  font-weight: 600;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  font-size: 20px;
  line-height: 1.4;
}

.work-card-img {
  width: 270px;
  height: 320px;
  margin: 20px 20px;
  background-size: cover;
}

.toggoArrivals {
  padding: 10px;
  border-bottom: 2px solid #f3c95c;
}

.toggoPopular {
  padding: 10px;
  border-bottom: 2px solid #f3c95c;
}

@media (max-width: 767px) {
  .title_word {
    font-weight: 700;
    font-style: normal;
    font-family: "Libre Baskerville", serif;
    color: #292929;
    font-size: 40px;
    line-height: 1.4;
  }
  .work-container {
    max-width: 100%; /* Đặt chiều rộng tối đa của work-container là 100% */
    padding: 15px; /* Giảm lề cho các màn hình nhỏ hơn */
  }

  .work-card {
    margin: 15px 0; /* Điều chỉnh khoảng cách giữa các card */
    align-items: center; /* Căn chỉnh hình ảnh và tiêu đề theo chiều ngang */
    justify-content: center;
  }

  .work-card h2 {
    font-size: 16px; /* Giảm cỡ chữ cho các màn hình nhỏ hơn */
    margin-top: 10px; /* Điều chỉnh khoảng cách giữa hình ảnh và tiêu đề */
  }

  .work-card-img {
    margin-bottom: auto; /* Điều chỉnh khoảng cách giữa hình ảnh và tiêu đề */
  }
}
.ten{
  padding-bottom:50px;
}
</style>