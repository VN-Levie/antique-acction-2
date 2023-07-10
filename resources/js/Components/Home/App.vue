<template>
  <PageNarbar />
  <div class="clear-top"></div>
  <router-view></router-view>
  <PagesFooter />
</template>
<script>
// chỉ cần import navbar và footer vào đây thôi. Những component khác sẽ được import vào trong các component con
import PageNarbar from "../layouts/home/Narbar.vue";
import PagesFooter from "../layouts/home/footer.vue";
export default {
  name: "Layout",
  components: {
    PageNarbar,
    PagesFooter,
  },
};
</script>
<style>
.clear-top {
  margin-top: 100px;
}
</style>
