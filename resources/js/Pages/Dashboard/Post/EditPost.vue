<template>
  <Head title="Home" />
  <DashboardLayout :title="title + ' edit'">
    <!-- <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  Dashboard
              </h2>
          </template> -->

    <div class="py-12">
      <div class="max-w-12xl mx-auto px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- here -->
          <EditPost :post="post" :categoryselect="categoryselect" :Categories="Categories" />
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
  
  <script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import EditPost from "../../../Components/Dashboard/Post/EditPost.vue";

import { defineComponent, useAttrs } from "vue";
import { Link, router } from "@inertiajs/vue3";

export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const post = attrs.post;
    const Categories = attrs.Categories;
    const title = attrs.post.title;
    const categoryselect = attrs.post.category;

    return { post, title, categoryselect, Categories };
  },
  components: { DashboardLayout, EditPost },
  methods: {},
});
</script>
  
