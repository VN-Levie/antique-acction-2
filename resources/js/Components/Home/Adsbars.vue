<template>
  <div
    id="adsbar"
    class="slider3 moto-widget moto-widget-block moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
  >
    <a class="moto-anchor" name="ads bar"></a>

    <div class="container-fluid">
      <div class="row">
        <div class="moto-cell col-sm-12">
          <div
            class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
          >
            <div class="container-fluid">
              <div class="row">
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-5 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                ></div>
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-7 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                >
                  <div
                    class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <div
                      class="moto-widget-text-content moto-widget-text-editable"
                    >
                      <h2 class="text moto-text_system_6">
                        Need to Refinish Furniture?
                      </h2>
                      <p class="text moto-text_system_9">&nbsp;</p>
                      <p class="text moto-text_system_9">
                        <span class="moto-color5_5">{{ title }}</span>
                      </p>
                    </div>
                  </div>
                  <div
                    class="moto-widget moto-widget-button moto-preset-default moto-preset-provider-default moto-align-center moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <a
                      href="/#about"
                      class="moto-widget-button-link moto-size-medium moto-link"
                      ><span class="fa moto-widget-theme-icon"></span
                      ><span class="moto-widget-button-divider"></span
                      ><span class="moto-widget-button-label"
                        >READ MORE</span
                      ></a
                    >
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