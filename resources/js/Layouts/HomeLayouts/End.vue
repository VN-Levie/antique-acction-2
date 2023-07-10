<template>
  <div
    class="footer moto-widget moto-widget-block moto-bg-color2_3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
  >
    <div class="container-fluid">
      <div class="row">
        <div class="moto-cell col-sm-12" data-container="container">
          <div
            class="moto-widget moto-widget-row row-fixed moto-justify-content_center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
          >
            <div class="container-fluid">
              <div class="row" data-container="container">
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                >
                  <div
                    class="moto-widget moto-widget-image moto-widget_with-deferred-content moto-preset-default moto-align-center_mobile-h moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <router-link
                      to="/"
                      class="moto-widget-image-link moto-link"
                    >
                      <img
                        src="/img/mt-1804-home-logo-footer.png"
                        class="moto-widget-image-picture moto-widget-deferred-content lazyloaded"
                      />
                    </router-link>
                  </div>
                </div>
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-6 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                >
                  <div
                    class="moto-widget moto-widget-social-links-extended moto-preset-3 moto-align-center moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <ul class="moto-widget-social-links-extended__list">
                      <li class="moto-widget-social-links-extended__item">
                        <a
                          href="#"
                          class="moto-widget-social-links-extended__link"
                          target="_self"
                        >
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="moto-widget-social-links-extended__item">
                        <a
                          href="#"
                          class="moto-widget-social-links-extended__link"
                          target="_self"
                        >
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="moto-widget-social-links-extended__item">
                        <a
                          href="#"
                          class="moto-widget-social-links-extended__link"
                          target="_self"
                        >
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="moto-widget-social-links-extended__item">
                        <a
                          href="#"
                          class="moto-widget-social-links-extended__link"
                          target="_self"
                        >
                          <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="moto-widget-social-links-extended__item">
                        <a
                          href="#"
                          class="moto-widget-social-links-extended__link"
                        >
                          <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                    <!-- <style type="text/css"></style> -->
                  </div>
                </div>
                <div
                  class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                >
                  <div
                    class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                  >
                    <div
                      class="moto-widget-text-content moto-widget-text-editable"
                    >
                      <p class="moto-text_system_10" style="text-align: center">
                        Copyright © {{ year }}. All Rights Reserved
                      </p>
                    </div>
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
  setup() {
    return {};
  },
  data() {
    return { year: year };
  },
  //   year variable
};
var year = new Date().getFullYear();
</script>
<style>
.footer {
  background-color: #292929;
  padding-top: 30px;
  padding-bottom: 30px;
}
</style>
