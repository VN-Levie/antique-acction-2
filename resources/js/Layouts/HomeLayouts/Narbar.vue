<template>
  <div class="bg-white">
    <nav
      class="container px-5 py- mx-auto md:flex md:justify-between md:items-center"
    >
      <!--LoGO NAV BAR-->
      <div class="flex items-center justify-between flex-col">
        <Link :href="route('home')">
          <img src="/img/mt-1804-home-logo.png" />
        </Link>

        <!-- Mobile menu button -->
        <div @click="toggleNav" class="flex md:hidden mt-3">
          <button
            type="button"
            class="text-gray-100 hover:text-gray-400 focus:outline-none focus:text-gray-400"
          >
            <svg
              viewBox="0 0 24 24"
              class="w-6 h-6 md:mt-20 fill-current bg-black hover:after:bg-yellow-300"
            >
              <path
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      <!--    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: flex-start;
    align-items: center;
    justify-content: flex-start;-->
      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <ul
        :class="showMenu ? 'flex' : 'hidden'"
        class="border-after flex-col mt-8 space-y-4 md:flex md:space-y-0 flex-algight-end md:flex-row md:space-x-10 md:mt-0 cursor-pointer"
        style="align-items: center"
      >
        <li
          v-for="(navigation, index) in navigations"
          :key="index"
          class="text-black-100"
        >
          <Link
            v-if="!navigation.children"
            :href="navigation.href"
            class="navbar-text cool-link ul-letter-spaceing py-2 pr-4 pl-3 text-uppercase"
            :aria-current="navigation.isCurrent ? 'page' : null"
          >
            {{ navigation.name }}
          </Link>
          <button
            v-else
            @click="toggleDropdown(index)"
            class="cool-link navbar-text ul-letter-spaceing py-2 pr-4 pl-3"
            aria-haspopup="true"
            :aria-expanded="isOpenDropdown(index) ? 'true' : 'false'"
          >
            {{ navigation.name }}
          </button>
          <!-- Dropdown menu -->
          <ul
            v-if="navigation.children && isOpenDropdown(index)"
            class="absolute dropdown-content mt-2 bg-white shadow-lg rounded"
          >
            <li
              v-for="(child, childIndex) in navigation.children"
              :key="childIndex"
            >
              <a
                :href="child.href"
                class="ul-letter-spaceing cool-link block px-4 py-2 text-sm1"
              >
                {{ child.name }}
              </a>
            </li>
          </ul>
        </li>
        <!--   -->
        <div
          @mouseenter="accountAndListFunc(true)"
          @mouseleave="accountAndListFunc(false)"
          class="border-after mt-8 space-x-5 space-y-0 md:flex md:space-y-0 md:mt-0 cursor-pointer"
        >
          <div>
            <!-- {{ $page.props.auth.user }} -->
            <div class="text-[12px]">
              <i class="fa fa-fw fa-user"></i>
              Hello,
              <span
                v-if="$page.props.auth.user"
                class="text-[10px] font-extrabold"
                >{{ $page.props.auth.user.name }}</span
              >
              <span class="text-[12px] font-extrabold" v-else>sign in</span>
            </div>
            <div class="flex items-center">
              <div class="text-[15px]">
                Account & List
                <i
                  class="fa fa-caret-down text-gray-400"
                  aria-hidden="true"
                ></i>
              </div>
            </div>
          </div>
          <div
            v-if="accountAndList"
            class="bg-white md:mt-10 border-after absolute border-[2px] hover:drop-shadow-sm border-gray-600 shadow-sm top-[70px] w-[480px] rounded-sm px-6 box-media"
            style="margin-left: -80px"
          >
            <div v-if="$page.props.auth.user">
              <div
                class="flex items-center justify-between py-2.5 border-b text-media"
              >
                <div class="text-[12px]">Who's Auction ? Select a profile.</div>
                <div
                  class="flex items-center text-sm font-bold text-teal-600 hover:text-red-600 hover:underline px-5"
                >
                  Manager profile
                </div>
              </div>
              <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/2 border-r">
                  <div class="pb-3">
                    <div class="font-extrabold pt-3">Your List</div>
                    <div
                      class="text-sm hover:text-red-600 hover:underline pt-3"
                    >
                      Create a list.
                    </div>
                    <div class="font-extrabold pt-3">My Address</div>
                    <div>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      <a
                        v-if="
                          $page.props.auth.user.addresses &&
                          $page.props.auth.user.addresses.length > 0
                        "
                        class="text-sm hover:text-red-600 hover:underline pl-1 pt-3"
                      >
                        {{ $page.props.auth.user.addresses[0].address1 }},
                        {{ $page.props.auth.user.addresses[0].address2 }},
                        {{ $page.props.auth.user.addresses[0].city }}
                      </a>
                      <a
                        v-else
                        class="text-sm hover:text-red-600 hover:underline pl-1 pt-3"
                      >
                        Add Address
                      </a>
                    </div>
                  </div>
                </div>
                <div class="w-full md:w-1/2 md:ml-5">
                  <div class="pb-3">
                    <div
                      class="font-extrabold pt-3"
                      style="padding-bottom: 13px"
                    >
                      Your Account
                    </div>

                    <div>
                      <Link
                        :href="route('profile.index')"
                        class="text-sm hover:text-red-600 hover:underline"
                        >Account
                      </Link>
                    </div>
                    <div
                      v-if="
                        $page.props.auth.user.roles.name != null &&
                        $page.props.auth.user.roles.name != 'user'
                      "
                    >
                      <Link
                        :href="route('dashboard')"
                        class="text-sm hover:text-red-600 hover:underline"
                        >Dashboard
                      </Link>
                    </div>
                    <div>
                      <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="text-sm hover:text-red-600 hover:underline"
                        >SignOut
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-else>
              <div class="p-4 text-center">
                <Link
                  :href="route('login')"
                  class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                >
                  Sign in
                </Link>
                <div>
                  <Link
                    :href="route('register')"
                    class="text-blue-900 hover:text-red-600"
                  >
                    you are not have account ! Start here .
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="border-after mt-8 space-x-5 space-y-0 md:flex md:space-y-0 md:mt-0 cursor-pointer"
        >
          <div>
            <div class="text-[12px]">
              <i class="fa fa-shopping-cart text-[20]" aria-hidden="true"></i>
              Return
            </div>
            <div class="flex items-center">
              <div class="text-[15px]">
                &Order
                <i
                  class="fa fa-caret-down text-gray-400"
                  aria-hidden="true"
                ></i>
              </div>
            </div>
          </div>
        </div>

        <!--Social Media-->
        <div
          class="border-after mt-8 space-x-5 space-y-0 md:flex md:space-y-0 md:mt-0 cursor-pointer"
        >
          <a href="#" class="cool-link navbar-text" target="_self">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
          <a href="#" class="cool-link navbar-text" target="_self">
            <i class="fa-brands fa-linkedin"></i>
          </a>
          <a href="#" class="cool-link navbar-text">
            <i class="fa-brands fa-facebook"></i>
          </a>
        </div>
      </ul>
    </nav>
  </div>
</template>
<script>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
export default {
  setup() {
    const navigations = [
      {
        name: "Home",
        href: "/",
        children: null,
      },
      {
        name: "Session",
        href: "/session",
        children: null,
      },
      {
        name: "products",
        href: "/products",
        children: null,
      },
      {
        name: "News",
        href: "/news",
        children: null,
      },
      {
        name: "ALL BLOCK",
        href: "/#allblock",
        children: [
          {
            name: "ABOUT",
            href: "/#about",
          },
          {
            name: "ADS BAR",
            href: "/#adsbar",
          },
          {
            name: "WORKS",
            href: "/#work",
          },
          {
            name: "GALLERY",
            href: "/#",
          },
          {
            name: "SERVICES",
            href: "/#services",
          },
          {
            name: "TESTIMONIALS",
            href: "/#testimonaials",
          },
          {
            name: "TEAM",
            href: "/#team",
          },
          {
            name: "SPONSORS",
            href: "/#service1",
          },
          {
            name: "CONTACTS",
            href: "/#contact",
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
    return {
      showMenu,
      toggleNav,
      navigations,
      isOpenDropdown,
      toggleDropdown,
      setScrollBg,
      dropdownStates,
      accountAndList,
      accountAndListFunc,
    };
  },
  components: {
    Link,
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
  content: "";
  display: block;
  width: 0;
  height: 2px;
  font-size: 0.85rem;
  background: #f3c95c;
  transition: width 0.1s;
}

.text-sm1:hover {
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
  font-family: "Raleway", sans-serif;
  font-weight: 700;
  font-style: normal;
  color: #292929;
  text-decoration: none;
  border-color: transparent;
}

.flex-algight-end {
  align-items: flex-end;
}

@media (max-width: 480px) {
  .box-media {
    margin-left: -80px;
    margin-top: -30px;
    width: 70%;
    text-align: center;
  }
}

@media (max-width: 480px) {
  .text-media {
    display: flex;
    flex-direction: column-reverse;
  }
}
</style>
