<template>
  <!--Header-->

  <Header class="sticky top-0 z-50" />

  <main class=relative>
    <slot />
  </main>
  <!--Footer-->
  <Footer />
</template>
<script setup>
import Header from '../Layouts/HomeLayouts/Narbar.vue'
import Footer from '../Layouts/HomeLayouts/End.vue';
</script>
<style>
.hscreen-1 {
  height: 10vh;
}

main {
  overflow-x: hidden;
}
</style>