<template>
  <div
    id="About"
    class="moto-widget moto-widget-block moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
  >
    <a class="moto-anchor" name="about"></a>
    <div class="container-fluid">
      <div class="row">
        <div class="moto-cell col-sm-12">
          <div
            class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
          >
            <div class="container-fluid">
              <div class="row">
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                >
                  <div
                    class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                  >
                    <div
                      class="moto-widget-text-content moto-widget-text-editable"
                    >
                      <p class="text moto-text_system_8">
                        RESTORERS, SPECIALISTS
                      </p>
                      <h2 class="text moto-text_system_5">
                        We Are Professional
                      </h2>
                    </div>
                  </div>

                  <div
                    class="moto-widget moto-widget-image moto-widget_with-deferred-content moto-preset-default moto-align-center moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <span class="moto-widget-image-link">
                      <img
                        src="/img/mt-1804-home-divider2.png"
                        class="moto-widget-image-picture moto-widget-deferred-content lazyload"
                      />
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
          >
            <div class="container-fluid">
              <div class="row">
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-1 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                ></div>
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-10 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                >
                  <div
                    class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <div
                      class="moto-widget-text-content moto-widget-text-editable"
                    >
                      <p class="text moto-text_system_9">
                        {{ title }}
                      </p>
                    </div>
                  </div>
                </div>
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-1 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                ></div>
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
  el: "#About",
  data() {
    return {
      title:
        "With 35 years of experience, much of our business is from loyal repeat customers, some we have known for over twenty years, as well as word of mouth referrals and new customers from our advertising. A large portion of our many restoration projects are items of furniture that have a special sentimental value to our customers.",
    };
  },
};
</script>

<style>
#About {
  background-image: url(/img/mt-1804-home-about-bg.jpg);
  background-position: right bottom;
  background-repeat: no-repeat;
  background-size: contain;
}
.text {
  text-align: center;
}
</style>