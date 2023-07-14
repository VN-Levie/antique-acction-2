<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_services">WHAT WE OFFER</span>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <h2 class="title_services_2">Our Services</h2>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <img
          src=""
          alt="divider1"
        />
      </div>

      <div class="container mb-5">
        <div class="row pt-5">
          <div class="col-12 d-flex justify-content-center">
            <p style="text-align: center" class="content_services">
              Our services include furniture refinishing and restoration; oil
              painting cleaning, touch up and varnishing; antique conservation;
              restoration of family heirlooms.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row">
        <div class="col-sm-3 col-12">
          <div class="card">
            <img src="" alt="" />
            <div class="card-title d-flex justify-content-center">
              <h4>Custom Finishing</h4>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-12">
          <div class="card">
            <img src="" alt="" />
            <div class="card-title d-flex justify-content-center">
              <h4>Furniture Refinishing</h4>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-12">
          <div class="card">
            <img src="" alt="" />
            <div class="card-title d-flex justify-content-center">
              <h4>Reproductions</h4>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-12">
          <div class="card">
            <img src="" alt="" />
            <div class="card-title d-flex justify-content-center">
              <h4>Furniture Repair</h4>
            </div>
          </div>
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
* {
  padding: 0;
  margin: 0;
}
.title_services {
  font-weight: 600;
  font-style: normal;
  font-family: "Montserrat", sans-serif;
  color: #292929;
  font-size: 18px;
  line-height: 1.4;
  letter-spacing: 4px;
}

.title_services_2 {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  color: #292929;
  font-size: 55px;
  line-height: 1.4;
  letter-spacing: 0px;
}

.content_services {
  font-weight: 400;
  font-style: normal;
  font-family: "Raleway", sans-serif;
  color: #7c7b7b;
  font-size: 20px;
  line-height: 1.6;
  letter-spacing: 0px;
  padding: 0 30px;
  margin: 0 50px;
}

.card-image {
  width: 100%;
  height: 370px;
  object-fit: cover;
}
</style>