<template>
  <div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
      <ul class="ul-sidebar">
        <li
          class="li-sidebar mt-1"
          :class="{ 'sidebar-link-active': route().current('dashboard') }"
        >
          <Link :href="route('dashboard')" class="sidebar-link"> Link 1 </Link>
        </li>
        <li
          class="li-sidebar mt-2"
          :class="{ 'sidebar-link-active': route().current('home') }"
        >
          <Link
            :href="route('home')"
            class="sidebar-link"
            :class="{ 'sidebar-link-active': route().current('home') }"
          >
            Link 2
          </Link>
        </li>
      </ul>
      <h2 class="text-xl font-medium text-gray-900">Getting Started</h2>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import NavLink from "@/Components/Dashboard/NavLink.vue";
//tô màu cho link đang active
// const route = router.currentRoute;
</script>
<style>
.sidebar-link {
}
.sidebar-link-active {
  background-image: linear-gradient(195deg, #e91e63, #e91e63);
}
.li-sidebar {
  padding: 5px;
  background-color: hsla(0, 0%, 78%, 0.2);
  margin-top: 1.5px;
  margin-bottom: 1.5px;
  font-weight: 400;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
  border-radius: 0.375rem;
  margin-top: 1.5px;
  margin-bottom: 1.5px;
  display: flex;
  align-items: center;
  white-space: nowrap;
}
.li-sidebar:hover {
  background-color: hsla(81, 94%, 49%, 0.3);
}

</style>
