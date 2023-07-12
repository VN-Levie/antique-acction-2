<template>
  <div
    id="adsbar"
    class="slider3 moto-widget moto-widget-block moto-spacing-top-large  moto-spacing-bottom-large moto-spacing-left-auto"
  >
 

    <div class="container-fluid">
      <div class="row">
        <div class="moto-cell col-sm-12">
          <div
            class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto "
          >
            <div class="container-fluid">
              <div class="row">
                <div
                  class="moto-cell col-sm-5   "
                ></div>
                <div
                  class=" moto-cell col-sm-7 moto-spacing-right-auto  moto-spacing-left-auto"
                >
                    <div
                      class="moto-widget-text-content "
                    >
                      <h2 class="text moto-text_system_6">
                        Need to Refinish Furniture?
                      </h2>
                      <p class="text moto-text_system_9">&nbsp;</p>
                      <p class="text moto-text_system_9">
                        <span class="moto-color5_5">{{ title }}</span>
                      </p>
                    </div>
                  
                  <div
                    class="moto-widget moto-widget-button moto-preset-default moto-align-center moto-spacing-top-medium  "
                  >
                    <a
                      href="/#about"
                      class="moto-widget-button-link moto-size-medium moto-link"
                      ><span>READ MORE</span
                      ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  el: "#adsbar",
  data() {
    return {
      title:
        "Wood is very sensitive to water and changes in relative humidity. As the weather changes from season to season, so does the humidity in your home and also the moisture content of your wood furniture.",
    };
  },
};
</script>

<style>
.slider3 {
  background-image: url(/img/mt-1804-home-parallax1.jpg);
  background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
}
.text {
  text-align: center;
}
</style>