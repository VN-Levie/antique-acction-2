<template>
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      <span class="title_word"> Our Last Work</span>
    </div>
    <div class="col-12 d-flex justify-content-center">
      <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
    </div>
  </div>
  <div  class="col-12 d-flex justify-content-center">
  <div class="tabs">
<input type="radio" class="tabs_radio" name="tabs-example" id="tab1" checked>
<label for="tab1" class="tabs_label">New Variales</label>
<div class="tab-content">
  <div class="col-12 d-flex justify-content-center">
  <img src="/img/mt-1804-home-works1.png" alt="">
  </div>
</div>

<input type="radio" class="tabs_radio" name="tabs-example" id="tab2" checked>
<label for="tab2" class="tabs_label">Popular</label>
<div class="tab-content">
  <div class="col-12 d-flex justify-content-center">
  <img  src="/img/mt-1804-home-works1.png" alt="">
  <img src="/img/mt-1804-home-works1.png" alt="">
  <img src="/img/mt-1804-home-works1.png" alt="">
  <img src="/img/mt-1804-home-works1.png" alt="">
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

.title_word {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  color: #292929;
  font-size: 55px;
  line-height: 1.4;
  letter-spacing: 0px;
}
.tabs{
  display: flex;
  flex-wrap: wrap;
  max-width:400px;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
}
.tabs_label{
padding: 10px  50px;
cursor: pointer;
}
.tabs_radio{
  display: none;
}
.tab-content{ 
  order: 1;
  width: 100%;
  border-bottom: 3px solid #dddddd;
  line-height: 1.5;
  font-size: 0.9em;
  display: none;
}
.tabs{
  display: flex;
  flex-wrap: wrap;
  max-width: 400px;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
}
.tabs_radio:checked+ .tabs_label{
  font-weight: bold;
  /* color: #ffcc00; */
  border-bottom:2px   solid #ffcc00 ;
}

.tabs_radio:checked+ .tabs_label+ .tab-content{
  display: initial;
}
</style>