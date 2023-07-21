<template>
  <div id="services" class="services">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_services">services</span>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
      </div>
    </div>
    <div class="services-container">
      <div v-for="(service, index) in services" :key="index" class="services-card">
        <img :src="service.image" :alt="service.name" />
        <h2 class="title_services">{{ service.name }}</h2>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      services: [
        {
          name: "Custom Finishing",
          image: "/img/services1.jpg",
        },
        {
          name: "Furniture Repair",
          image: "/img/services3.jpg",
        },
        {
          name: "Furniture Refinishing",
          image: "/img/services2.jpg",
        },
        {
          name: "Reproductions",
          image: "/img/services4.jpg",
        },
      ],
    };
  },
};
</script>
  
<style>
.services {
  box-sizing: border-box;
  padding: 50px 0 0 0;
  margin: 0;
}

.title_services {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  color: #292929;
  font-size: 55px;
  line-height: 1.4;
}

.services-container {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  flex-wrap: wrap;
}

.services-card {
  width: 300px;
  height: 415px;
  margin: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.services-card img {
  width: 270px;
  height: 320px;
  margin: 20px 5px;
  object-fit: cover;
}

.services-container {
  display: flex;
  justify-content: center;
  text-align: center;
  flex-wrap: wrap;
}

.services-card {
  width: 300px;
  height: 415px;
  margin: 30px 0 30px 0;
}

.services-card h2 {
  font-weight: 600;
  font-style: normal;
  font-family: "Montserrat", sans-serif;
  color: #292929;
  font-size: 16px;
  line-height: 1.4;
}

.services-card-img {
  width: 270px;
  height: 320px;
  margin: 20px 5px;
  background-size: cover;
}

@media (max-width: 768px) {
  .title_services {
    font-weight: 400px;
    font-size: 40px;
  }

  .services img {
    width: 200px;
  }

  .services-card {
    margin: 10px 0 10px 0;
  }

  .services {
    padding: 30px 0 0 0;
  }

  .services-card img {
    width: 270px;
    height: 320px;
    margin: 20px 5px;
    object-fit: cover;
  }
}</style>
  