<template>
  <DashboardLayout>
    <EditPost
      :productCategories="productCategories"
      :count="count"
      :filter_date="filter_date"
    />
  </DashboardLayout>
</template>
  <script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import EditPost from "../../../Components/Dashboard/Post/EditPost.vue";
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
const props = defineProps({
  productCategories: Array,
  count: Number,
  filter_date: Array,
});
</script>
