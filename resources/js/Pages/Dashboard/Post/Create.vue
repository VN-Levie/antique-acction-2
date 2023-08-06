<template>
  <DashboardLayout>
    <CreatePost :Categories="Categories" />
  </DashboardLayout>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import CreatePost from "@/Components/Dashboard/Post/Createpost.vue";

import { defineComponent, useAttrs } from "vue";
import { Link, router } from "@inertiajs/vue3";

export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const Categories = attrs.Categories;
    return { Categories };
  },
  components: { DashboardLayout, CreatePost },
  methods: {},
});
</script>
