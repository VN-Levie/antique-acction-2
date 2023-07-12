<template>
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      <span class="title_team">Team</span>
    </div>

    <div class="col-12 d-flex justify-content-center">
      <img
        src="../../../../public/img/mt-1804-home-divider1.png"
        alt="divider1"
      />
    </div>
  </div>

  <div class="row-team">
    <div class="column-team">
      <div class="card-team">
        <div class="img-container">
          <img src="../../../../public/img/team1.jpg" alt="" />
        </div>
        <h3>Tlee</h3>
        <p>Design</p>
        <div class="icons">
          <a href="#"> <font-awesome-icon :icon="['fab', 'facebook']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fab', 'github']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fass', 'envelope']" /> </a>
        </div>
      </div>
    </div>
    <!-- 2 -->
    <div class="column-team">
      <div class="card-team">
        <div class="img-container">
          <img src="../../../../public/img/team1.jpg" alt="" />
        </div>
        <h3>Chuong</h3>
        <p>Design</p>
        <div class="icons">
          <a href="#"> <font-awesome-icon :icon="['fab', 'facebook']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fab', 'github']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fass', 'envelope']" /> </a>
        </div>
      </div>
    </div>
    <!-- 3 -->
    <div class="column-team">
      <div class="card-team">
        <div class="img-container">
          <img src="../../../../public/img/team1.jpg" alt="" />
        </div>
        <h3>Duong</h3>
        <p>Leader</p>
        <div class="icons">
          <a href="#"> <font-awesome-icon :icon="['fab', 'facebook']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fab', 'github']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fass', 'envelope']" /> </a>
        </div>
      </div>
    </div>
    <!-- 4 -->
    <div class="column-team">
      <div class="card-team">
        <div class="img-container">
          <img src="../../../../public/img/team1.jpg" alt="" />
        </div>
        <h3>Vi</h3>
        <p>VJ</p>
        <div class="icons">
          <a href="#"> <font-awesome-icon :icon="['fab', 'facebook']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fab', 'github']" /> </a
          ><a href="#"> <font-awesome-icon :icon="['fass', 'envelope']" /> </a>
        </div>
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
.title_team {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  color: #292929;
  font-size: 55px;
  line-height: 1.4;
  letter-spacing: 0px;
}
.row-team {
  display: flex;
  flex-wrap: wrap;
  padding: 2em 1em;
  text-align: center;
  box-sizing: border-box;
}

.column-team {
  width: 100%;
  padding: 0.5em 0;
}

.card-team {
  box-shadow: 0 0 2.2em rgba(25, 0, 58, 0.1);
  padding: 3.5em 1em;
  border-radius: 0.6em;
  color: #1f003b;
  cursor: pointer;
  transition: 0.3s;
  background-color: #ffffff;
}

.card-team .img-container {
  width: 8em;
  height: 8em;
  background-color: #a993ff;
  padding: 0.5em;
  border-radius: 50%;
  margin: 0 auto 2em auto;
}

.card-team img {
  width: 100%;
  border-radius: 50%;
}

.card-team h3 {
  font-weight: 500;
}

.card-team p {
  font-weight: 300;
  text-transform: uppercase;
  margin: 0.5em 0 2em 0;
  letter-spacing: 2px;
}

.icons {
  width: 50%;
  min-width: 180px;
  margin: auto;
  display: flex;
  justify-content: space-between;
}

.card-team a {
  text-decoration: none;
  color: inherit;
  font-size: 1.4em;
}

.card-team:hover {
  background: linear-gradient(
    #6045ea, #8567f7
  );
  color: #ffffff;
}

.card-team:hover .img-container {
  transform: scale(1.15);
}

@media screen and (min-width: 768px) {
  ::selection {
    padding: 1em 7em;
  }
}

@media screen and (min-width: 992px) {
  ::selection {
    padding: 1em;
  }
  .card-team {
    padding: 5em 1em;
  }

  .column-team {
    flex: 0 0 25%;
    max-width: 25%;
    padding: 0 1em;
  }
}
</style>