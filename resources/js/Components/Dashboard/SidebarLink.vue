<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  href: String,
  active: Boolean,
});

const classes = computed(() => {
  return props.active
    ? "text-bold text-white bg-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
    : "text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md";
});
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
