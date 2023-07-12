<template>
  <div class="container-fluid-About">
    <div id="About" class="spacing-bottom ">
      <div class="">
        <p class="text-center moto-text_system_8">
          RESTORERS, SPECIALISTS
        </p>
        <h2 class="text-center moto-text_system_5">
          We Are Professional
        </h2>

        <div class="moto-widget-image moto-preset-default moto-align-center moto-spacing-top-small">
          <span class="moto-widget-image-link">
            <img src="/img/mt-1804-home-divider2.png" class="" />
          </span>
        </div>
        <div class=" container-fluid moto-spacing-top-medium1 col-sm-1 col-sm-10">
          <h3 class="text-about-center moto-text_system_9">
            {{ title }}
          </h3>
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

.moto-spacing-top-medium1 {
  padding-top: 90px;
}

.moto-spacing-bottom-large1 {
  padding-bottom: 95px;
}

.text-center {
  text-align: center;

}

.text-about-center {
  text-align: center;
  font-weight: 700;
  color: rgb(132, 132, 132);
}

.spacing-bottom {
  padding-bottom: 250px;
  margin-top: -90px;
  padding-top: 158px;
  margin-bottom: -20px;

}

.container-fluid-About {
  background-color: white;
}
</style>