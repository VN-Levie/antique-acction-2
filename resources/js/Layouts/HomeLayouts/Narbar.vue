<template>
  <div class="bg-white ">
    <nav class="

        container
        px-5
        py-
        mx-auto
        md:flex md:justify-between md:items-center
      ">
      <!--LoGO NAV BAR-->
      <div class="flex items-center justify-between">
        <a href="/" class="
            text-xl
            font-bold
            text-black
            md:text-2xl
            hover:text-indigo-400
          "><img style="width: 80%;" src="../../../../public/img/mt-1804-home-logo.png" class=" cursor-pointer">
        </a>
        <!-- Mobile menu button -->
        <div @click="toggleNav" class="flex md:hidden">
          <button type="button" class="

              text-gray-100
              hover:text-gray-400
              focus:outline-none focus:text-gray-400
            ">
            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current bg-black hover:after:bg-yellow-300">
              <path fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
              </path>
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <ul :class="showMenu ? 'flex' : 'hidden'" class="
          border-after
          flex-col
          mt-8
          space-y-4
          md:flex md:space-y-0 flex-algight-end  md:flex-row md:space-x-10 md:mt-0
          cursor-pointer">
        <li v-for="(navigation, index) in navigations" :key="index" class="text-black-100">
          <a v-if="!navigation.children" :href="navigation.href"
            class="text-font cool-link ul-letter-spaceing py-2 pr-4 pl-3 "
            :aria-current="navigation.isCurrent ? 'page' : null">
            {{ navigation.name }}
          </a>
          <button v-else @click="toggleDropdown(index)" class=" cool-link text-font ul-letter-spaceing py-2 pr-4 pl-3"
            aria-haspopup="true" :aria-expanded="isOpenDropdown(index) ? 'true' : 'false'">
            {{ navigation.name }}
          </button>
          <!-- Dropdown menu -->
          <ul v-if="navigation.children && isOpenDropdown(index)"
            class="absolute dropdown-content mt-2 bg-white shadow-lg rounded">
            <li v-for="(child, childIndex) in navigation.children" :key="childIndex">
              <a :href="child.href" class="ul-letter-spaceing cool-link block px-4 py-2 text-sm ">
                {{ child.name }}
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</template>
<script>
import { ref } from 'vue';
export default {
  setup() {
    const navigations = [

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
            href: '/#',
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
    let showMenu = ref(false);
    const toggleNav = () => (showMenu.value = !showMenu.value);
    return { showMenu, toggleNav, navigations, isOpenDropdown, toggleDropdown, setScrollBg, dropdownStates };
  },
};
</script>
<style >
.cool-link {
  display: inline-block;
  color: #000;
  text-decoration: none;
}

.cool-link::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  font-size: 0.85rem;
  background: #f3c95c;
  transition: width .1s;
}

.text-sm:hover {
  font-size: 0.7rem;
  transition: width 1000s;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.cool-link:hover::after {
  width: 100%;
}

.border-after::after {
  border-width: 4px;
  --tw-border-opacity: 1;
  border-color: rgb(14 165 233 / var(--tw-border-opacity));
}

.ul-letter-spaceing {
  letter-spacing: 2.6px;
}

.text-font {
  font-size: 80%;
  font-family: 'Raleway', sans-serif;
  font-weight: 700;
  font-style: normal;
  color: #292929;
  text-decoration: none;
  border-color: transparent;
}

.flex-algight-end {

  align-items: flex-end;

}
</style>
