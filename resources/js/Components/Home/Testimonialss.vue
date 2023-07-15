<template>
  <div class="Testimonial-backgroud">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_Testimonial">Testimonial</span>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <img
          src="../../../../public/img/mt-1804-home-divider1.png"
          alt="divider1"
        />
      </div>
    </div>
    <div class="Testimonial">
      <div class="testimonial-content">
        <div class="quote-left">
          <i class="fas fa-angle-left fa-quote" @click="rotateMessage()"></i>
        </div>
        <div class="quote-right">
          <i class="fas fa-angle-right fa-quote" @click="rotateMessagea()"></i>
        </div>
        <div class="content-wrapper">
          <p class="content">{{ currentMessage.text }}</p>
        </div>
        <div class="person">
          <div class="user-details">
            <h4 class="username">{{ currentMessage.name }}</h4>
            <p class="manage">{{ currentMessage.position }}</p>
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
      message: [
        {
          name: "Gerald Welaskes",
          position: "IT Eng",
          text: "In forty-three years of antiquarian bookselling, we have come across many old and rare books that are in need of care and restoration. We are very grateful for the loving attention they get from Christian. ",
        },
        {
          name: "Phillip Moore",
          position: "IT Eng",
          text: "Diana has been,  and continues to be, my binder of choice for over ten years. In reference to my specialization in 18th century books, her restoration and rebinding is state of the art was perfect!",
        },
        {
          name: "Tlee",
          position: "IT",
          text: " Diana is  really talented, examples of her work grace the shelves of many private and institutional collections on both sides of the Atlantic. My highest recommendation for her talents and reliability. ",
        },
      ],
      currentIndex: 0,
    };
  },
  computed: {
    currentMessage() {
      return this.message[this.currentIndex];
    },
  },
  mounted() {
    setInterval(this.rotateMessage, 3000);
  },
  methods: {
    rotateMessage() {
      this.currentIndex++;
      if (this.currentIndex >= this.message.length) {
        this.currentIndex = 0;
      }
    },
    rotateMessagea() {
      this.currentIndex--;
      if (this.currentIndex <= this.message.length) {
        this.currentIndex = 0;
      }
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
    padding: 10px 30px;
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