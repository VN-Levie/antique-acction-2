<script setup>
import { ref, onMounted } from "vue";
const showMobileMenu = ref("false");
const scrollBg = ref(false);

const navigations = [
  {
    name: 'HOME',
    href: '/#home',
    children: null,
  },
  {
    name: 'GALLERY',
    href: '/#gallery',
    children: null,
  },
  {
    name: 'WORK',
    href: '/#work',
    children: null,
  },
  {
    name: 'CONTACTS',
    href: '/#contact',
    children: null,
  },
  {
    name: 'ALL BLOCK',
    href: '/#allblock',
    children: [
      {
        name: 'ABOUT',
        href: '/#about',
      },
      {
        name: 'ADS BAR',
        href: '/#adsbar',
      },
      {
        name: 'WORKS',
        href: '/#work',
      },
      {
        name: 'GALLERY',
        href: '/##',
      },
      {
        name: 'SERVICES',
        href: '/#services',
      },
      {
        name: 'TESTIMONIALS',
        href: '/#testimonaials',
      },
      {
        name: 'TEAM',
        href: '/#team',
      },
      {
        name: 'SPONSORS',
        href: '/#service1',
      },
      {
        name: 'CONTACTS',
        href: '/#contact',
      },

    ],
  },
  // Add more navigation items as needed
];
const dropdownStates = ref({});

const isOpenDropdown = (index) => {
  return dropdownStates.value[index] || false;
};

const toggleDropdown = (index) => {
  dropdownStates.value[index] = !dropdownStates.value[index];
};
const setScrollBg = (value) => {
  scrollBg.value = value;
};

onMounted(() => {
  window.addEventListener("scroll", () => {
    return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
  });
});
</script>
<template>
  <nav class=" bg-color-sliver w-full fixed z-20 px-2 sm:px-4 ">
    <div class="container container-edit flex flex-wrap justify-between items-center mx-auto" bis_skin_checked="1">
      <a class="edit-img flex items-center">
        <img src="../../../../public/img/mt-1804-home-logo.png" class="edit-img mr-3 h-6 sm:h-9" alt="Laraveller Logo" />

      </a>
      <!--Menu on Mobile-->
      <button @click="showMobileMenu = !showMobileMenu" data-collapse-toggle="navbar-default" type="button" class="
          inline-flex
          items-center
          p-2
          ml-3
          text-sm text-gray-500
          rounded-lg
          md:hidden
          hover:bg-gray-100
          focus:outline-none focus:ring-2 focus:ring-gray-200
          dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
        " aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
      </button>


      <!--Menu on Mobile-->

      <div class="w-full md:block md:w-auto" :class="{ hidden: showMobileMenu }" id="navbar-default" bis_skin_checked="1">
        <ul class="flex flex-col flex-edit p-4 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0">
          <li v-for="(navigation, index) in navigations" :key="index" class="relative">
            <a v-if="!navigation.children" :href="navigation.href"
              class="block py-2 pr-4 pl-3 text-light-tail-500 rounded dark:text-dark-navy-100 dark:hover:text-white"
              :aria-current="navigation.isCurrent ? 'page' : null">
              {{ navigation.name }}
            </a>
            <button v-else @click="toggleDropdown(index)"
              class="block py-2 pr-4 pl-3 text-light-tail-500 rounded dark:text-dark-navy-100 hover:text-light-tail-100 dark:hover:text-white"
              aria-haspopup="true" :aria-expanded="isOpenDropdown(index) ? 'true' : 'false'">
              {{ navigation.name }}
            </button>
            <!-- Dropdown menu -->
            <ul v-if="navigation.children && isOpenDropdown(index)" class="absolute mt-2 bg-white shadow-lg rounded">
              <li v-for="(child, childIndex) in navigation.children" :key="childIndex">
                <a :href="child.href"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-light-tail-100 hover:text-light-tail-500">
                  {{ child.name }}
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style>
.bg-color-sliver {
  background-color: #c9caca;
}

.edit-img {
  height: 4.25rem;
  margin-right: 14.75rem;
}

.container-edit {
  padding: 0 0 0 150px;
  background-color: #c9caca;
}

.flex-edit {
  margin-right: 150px;
}
</style>
