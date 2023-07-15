<template>
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      <span class="title_team">Team</span>
    </div>

    <div class="col-12 d-flex justify-content-center">
      <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
    </div>
  </div>
  <div class="team">
    <div class="team-container">
      <div class="team-card">
        <div class="team-card-img team-card-1"></div>
        <h2>Christian Hall</h2>
        <h4>Antique Furniture Master</h4>
      </div>
      <div class="team-card">
        <div class="team-card-img team-card-2"></div>
        <h2>Eugene Rivera</h2>
        <h4>Gilder</h4>
      </div>
      <div class="team-card">
        <div class="team-card-img team-card-3"></div>
        <h2>John Sanders</h2>
        <h4>Bookbinder</h4>
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
.team {
  box-sizing: border-box;
  padding: 20px 0 0 0;
  margin: 0;
}

.title_team {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  color: #292929;
  font-size: 55px;
  line-height: 1.4;
  margin-top: 20px;
}

.team-container {
  display: flex;
  justify-content: center;
  text-align: center;
  flex-wrap: wrap;
}

.team-card {
  width: 370px;
  height: 505px;
  margin: 10px 0 100px 0;
}

.team-card h2 {
  font-weight: 600;
  font-style: normal;
  font-family: "Montserrat", sans-serif;
  color: #292929;
  font-size: 28px;
  line-height: 1.4;
}

.team-card-img {
  height: 440px;
  margin: 20px;
  background-size: cover;
}

.team-card-1 {
  background-image: url(img/team1.jpg);
}

.team-card-2 {
  background-image: url(img/team3.jpg);
}
.team-card-3 {
  background-image: url(img/team2.jpg);
}

@media (max-width: 768px) {
  .title_team {
    font-weight: 300px;
    font-size: 30px;
  }
  .team img {
    width: 180px;
  }

  .team-card {
    margin: 10px 0 40px 0;
  }
}
</style>
  