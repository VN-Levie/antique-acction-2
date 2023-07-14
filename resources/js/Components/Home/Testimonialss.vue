<template>
  <div class="Testimonial-backgroud">
    <div class="Testimonial">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <span class="title_team">Testimonial</span>
        </div>

        <div class="col-12 d-flex justify-content-center">
          <img
            src="../../../../public/img/mt-1804-home-divider1.png"
            alt="divider1"
          />
        </div>
      </div>
      <div class="container">
        <div class="quote-left">
          <i class="fas fa-angle-left fa-quote" @click="rotateMessageleft()"></i>
        </div>
        <div class="quote-right">
          <i class="fas fa-angle-right fa-quote" @click="rotateMessageright()"></i>
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
    setInterval(this.rotateMessage, 5000);
  },
  methods: {
    rotateMessageright() {
      this.currentIndex++;
      if (this.currentIndex >= this.message.length) {
        this.currentIndex = 0;
      }
    },
    rotateMessageleft() {
      this.currentIndex--;
      if (this.currentIndex >= this.message.length) {
        this.currentIndex = 0;
      }
    },
  },
};
</script>

<style>
.Testimonial-backgroud {
  background-image: url(/img/mt-1804-home-parallax1.jpg);
  background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
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
}

.container {
  margin: 20px auto;
  padding: 50px 80px;
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
}

.quote-right {
  position: absolute;
  right: 40px;
  top: 70px;
  font-size: 30px;
}

.content-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-grow: 1;
}

.content {
  line-height: 28px;
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
  .container {
    padding: 20px 30px;
  }
  .quote-left,
  .quote-right {
    display: none;
  }
}
</style>