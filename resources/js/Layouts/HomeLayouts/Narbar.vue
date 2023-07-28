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
      <div class="flex items-center justify-between ">
        <a :href="route('home')" class="mt-0">
          <img style="width: 80%;" src="/img/mt-1804-home-logo.png" class="cursor-pointer ">
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
            class="navbar-text cool-link ul-letter-spaceing py-2 pr-4 pl-3 "
            :aria-current="navigation.isCurrent ? 'page' : null">
            {{ navigation.name }}
          </a>
          <button v-else @click="toggleDropdown(index)" class=" cool-link navbar-text ul-letter-spaceing py-2 pr-4 pl-3"
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
        <!--   -->
        <div @mouseenter="accountAndListFunc(true)" @mouseleave="accountAndListFunc(false)" class="border-after mt-8 space-x-5 space-y-0md:flex md:space-y-0 md:mt-0
        cursor-pointer">
          <div>
            <div class=" text-[12px]">
              <i class="fa fa-fw fa-user"></i>
              Hello,
              <span class="text-[10px] font-extrabold">sign in</span>
            </div>
            <div class="flex items-center ">
              <div class="text-[15px] k ">
                Account & List
                <i class="fa fa-caret-down text-gray-400" aria-hidden="true"></i>
              </div>
            </div>

          </div>
          <div v-if="accountAndList"
            class="bg-white absolute border-[2px] hover:drop-shadow-sm border-gray-600 shadow-sm top-[70px] w-[480px] rounded-sm px-6 "
            style="margin-left:-30px">
            <div>
              <div class="flex items-center justify-between py-2.5 border-b">
                <div class="text-[12px]">Who's Auction ? Select a profile.</div>
                <div class=" flex items-center text-sm font-bold text-teal-600 hover:text-red-600 hover:underline px-5">
                  Manager profile </div>
              </div>
              <div class="flex">
                <div class="w-1/2 border-r">
                  <div class="pb-3">
                    <div class="font-extrabold pt-3">Your List</div>
                    <div class="text-sm hover:text-red-600 hover:underline pt-3">Create a list.</div>
                  </div>
                </div>
                <div class="w-1/2 ml-5">
                  <div class="pb-3">
                    <div class="font-extrabold pt-3" style="padding-bottom: 13px;">Your Account</div>
                    <div>
                      <a :href="route('login')" class="text-sm hover:text-red-600 hover:underline pt-3">Account </a>
                    </div>
                    <div class="text-sm hover:text-red-600 hover:underline pt-3">SignOut
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="border-after
        mt-8
        space-x-5
        space-y-0
        md:flex md:space-y-0 md:mt-0
        cursor-pointer">
          <div>
            <div class=" text-[12px] ">
              <i class="fa fa-shopping-cart text-[20]" aria-hidden="true"></i>
              Return
            </div>
            <div class="flex items-center ">
              <div class="text-[15px] ">
                &Order
                <i class="fa fa-caret-down text-gray-400" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>



        <!--Social Media-->
        <div class="border-after
        mt-8
        space-x-5
        space-y-0
        md:flex md:space-y-0 md:mt-0
        cursor-pointer">
          <a href="#" class="cool-link navbar-text" target="_self">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="#" class="cool-link navbar-text" target="_self">
            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
          </a>
          <a href="#" class="cool-link navbar-text" target="_self">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
          <a href="#" class="cool-link navbar-text">
            <i class="fa fa-google-plus" aria-hidden="true"></i>
          </a>

        </div>
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
    let accountAndList = ref(false);

    const accountAndListFunc = (bool) => {
      setTimeout(() => {
        accountAndList.value = bool;
      }, 150);
    };


    const toggleNav = () => (showMenu.value = !showMenu.value);
    return { showMenu, toggleNav, navigations, isOpenDropdown, toggleDropdown, setScrollBg, dropdownStates, accountAndList, accountAndListFunc };

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

.navbar-text {
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
