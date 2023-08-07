<template>
  <Head title="Home" />
  <DashboardLayout title="Posts Manager">
    <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

    <div class="py-12">
      <div class="max-w-12xl mx-auto px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <ListPost :articleList="articleList" />
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import ListPost from "@/Components/Dashboard/Post/ListPost.vue";
import { defineComponent, useAttrs } from "vue";
import { Link, router } from "@inertiajs/vue3";

export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const articleList = attrs.Posts;

    return { articleList };
  },
  components: { DashboardLayout, ListPost },
  methods: {},
});
</script>
