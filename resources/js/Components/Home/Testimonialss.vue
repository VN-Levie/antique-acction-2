<template>
  <div class="Testimonial-backgroud">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_Testimonial">Testimonial</span>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
      </div>
    </div>
    <div class="Testimonial">
      <div class="testimonial-content">
        <div class="quote-left">
          <i class="fas fa-angle-left fa-quote" @click="rotateMessageright()"></i>
        </div>
        <div class="quote-right">
          <i class="fas fa-angle-right fa-quote" @click="rotateMessageleft()"></i>
          <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="content-wrapper">
          <template v-if="message.length > 0">
            <p class="content">{{ currentMessage.content }}</p>
          </template>
        </div>
        <div class="person">
          <div class="user-details">
            <template v-if="message.length > 0">
              <h4 class="username">{{ currentMessage.name }}</h4>
              <p class="manage">{{ currentMessage.author }}</p>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: [],
      currentIndex: 0,
    };
  },
  computed: {
    currentMessage() {
      return this.message[this.currentIndex];
    },
  },
  mounted() {
    setInterval(this.rotateMessageleft, 3000);
    this.TestimonialApi();
  },
  methods: {
    rotateMessageleft() {
      this.currentIndex++;
      if (this.currentIndex >= this.message.length) {
        this.currentIndex = 0;
      }
    },
    rotateMessageright() {
      this.currentIndex--;
      if (this.currentIndex < 0) {
        this.currentIndex = this.message.length - 1;
      }
    },
    TestimonialApi() {
      axios
        .get("/api/data/Testimonial")
        .then((response) => {
          this.message = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>



<style>
.Testimonial-backgroud {
  padding-top: 70px;
  background-image: url(/img/mt-1804-home-parallax2.jpg);
  background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
}

.title_Testimonial {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  font-size: 55px;
  line-height: 1.4;
  color: white;
}

.Testimonial {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 50vh;
  justify-content: center;
  overflow: hidden;
  padding: 10px;
  color: white;
}

.testimonial-content {
  padding: 40px 80px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center; /* Center the content horizontally */
}

.quote-left {
  position: absolute;
  left: 40px;
  top: 70px;
  font-size: 30px;
  background-color: aqua;
}

.quote-right {
  position: absolute;
  right: 40px;
  top: 70px;
  font-size: 30px;
  background-color: aqua;
}

.content-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-grow: 1;
}

.content {
  line-height: 28px;
  font-family: Arial, Helvetica, sans-serif;
  width: 850px;
}

.username {
  font-family: Arial, Helvetica, sans-serif;
  width: 400px;
  line-height: 20px;
  font-size: 32px;
  padding-bottom: 20px;
}

.person {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 26px;
}

.person .role {
  font-weight: normal;
  margin: 12px 0;
}

@media (max-width: 768px) {
  .testimonial-content {
    padding: 10px 0;
  }
  .Testimonial {
    height: 40vh;
  }
  .quote-left,
  .quote-right {
    display: none;
  }

  .content {
    line-height: 14px;
    font-family: Arial, Helvetica, sans-serif;
    width: 350px;
  }

  .username {
    width: 300px;
    font-size: 20px;
    padding-bottom: 0px;
  }
}
/* .divider {
  height: 5px;
  width: 100%;
  background-color: #fff;
  transform-origin: left;
  animation: rise 10s linear infinite;
} */

/* @keyframes rise {
  0% {
    transform: scaleX(0);
  }
} */
</style>