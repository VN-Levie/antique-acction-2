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
      <div
        v-for="(member, index) in teamMembers"
        :key="index"
        class="team-card"
      >
        <img
          :src="member.avatar"
          :alt="member.name"
          class="team-member-image"
        />
        <h2>{{ member.name }}</h2>
        <h4>{{ member.titles }}</h4>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      teamMembers: [],
    };
  },
  mounted() {
    this.fetchDataFromApi();
  },
  methods: {
    fetchDataFromApi() {
      axios
        .get("/api/data/team")
        .then((response) => {
          this.teamMembers = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
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
  margin: 10px 20px 100px 20px;
}
.team-card img {
  height: 440px;
  width: 370px;
  object-fit: cover;
  justify-content: center;
}
.team-card img.team-member-image {
  height: 440px;
  object-fit: cover;
  width: 100%;
  display: inline-block;
}

.team-card h2 {
  font-weight: 600;
  font-style: normal;
  font-family: "Montserrat", sans-serif;
  color: #292929;
  font-size: 28px;
}

.team-card-img {
  height: 440px;
  margin: 20px;
  background-size: cover;
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
  