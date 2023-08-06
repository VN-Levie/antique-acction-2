<template>
  <DashboardLayout>
    <AppraiserPost :appraiserdata="appraiserdata"/>
  </DashboardLayout>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import AppraiserPost from "@/Components/Dashboard/Appraiser/AppraiserPost.vue";
import { defineComponent, useAttrs } from "vue";
import { Link, router } from "@inertiajs/vue3";

export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const appraiserdata = attrs.appraiserdata;

    return { appraiserdata };
  },
  components: { DashboardLayout, AppraiserPost },
  methods: {},
});
</script>
