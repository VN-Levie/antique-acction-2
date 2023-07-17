<template>
  <div class="services">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_services">services</span>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
      </div>
    </div>
    <div class="services-container">
      <div class="services-card">
        <div class="services-card-img services-card-1"></div>
        <h2 class="title_services">Custom Finishing</h2>
      </div>
      <div class="services-card">
        <div class="services-card-img services-card-2"></div>
        <h2>Furniture Repair</h2>
      </div>
      <div class="services-card">
        <div class="services-card-img services-card-3"></div>
        <h2 class="title_services">Furniture Refinishing</h2>
      </div>
      <div class="services-card">
        <div class="services-card-img services-card-4"></div>
        <h2 class="title_services">Reproductions</h2>
      </div>
    </div>
  </div>
</template>
  
  <script>
export default {
  setup() {
    return {};
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

.services-card-1 {
  background-image: url(img/services1.jpg);
}

.services-card-2 {
  background-image: url(img/services3.jpg);
}
.services-card-3 {
  background-image: url(img/services2.jpg);
}
.services-card-4 {
  background-image: url(img/services4.jpg);
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
}
</style>
  