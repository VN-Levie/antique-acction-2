<template>
  <div class="brands-logo-slider">
    <div class="brands-logos">
      <div class="brands-logos-slide">
        <img src="/img/l1.png" alt="aaa" />
        <img src="/img/l2.png" alt="aaa" />
        <img src="/img/l3.png" alt="aaa" />
        <img src="/img/l4.png" alt="aaa" />
        <img src="/img/l5.png" alt="aaa" />
        <img src="/img/l6.png" alt="aaa" />
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
.brands-logo-slider {
  margin: 0;
  box-sizing: border-box;
  background-color: yellow;
}
.brands-logos-slide {
  padding: 30px 0;
  justify-content: center;
  text-align: center;

}
.brands-logos-slide img{
  width: 170px;
  height: 121px;
  display: inline-block;
  margin: 0 20px;
}

@media (max-width: 768px) {
  .brands-logos-slide img{
  width: 85px;
  height: 60px;
  margin: 0 20px;
}
}

</style>