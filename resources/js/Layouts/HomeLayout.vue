<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/Dashboard/ApplicationMark.vue";
import Banner from "@/Components/Dashboard/Banner.vue";
import Dropdown from "@/Components/Dashboard/Dropdown.vue";
import DropdownLink from "@/Components/Dashboard/DropdownLink.vue";
import NavLink from "@/Components/Dashboard/NavLink.vue";
import ResponsiveNavLink from "@/Components/Dashboard/ResponsiveNavLink.vue";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
  router.post(route("logout"));
};

var year = new Date().getFullYear();
</script>

<template>
  <div>
    <Head :title="title" />

    <Banner />

    <div class="min-h-screen bg-gray-100">
      <nav class="bg-white navbar-expand-lg fixed-top">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 md:px-6 md:px-8 mt-1">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="shrink-0 flex items-center">
                <Link :href="route('home')">
                  <img src="/img/mt-1804-home-logo.png" />
                </Link>
              </div>
            </div>

            <div
              class="hidden lg:flex lg:items-center lg:ml-6 mt-4"
              id="primary"
            >
              <span class="nav-item nav-text">
                <Link :href="route('product.index')">
                    Products
                </Link>
              </span>
              <span class="nav-item nav-text">
                <a class="nav-link" href="#">GALLERY </a>
              </span>
              <span class="nav-item nav-text">
                <a class="nav-link" href="#">WORKS </a>
              </span>
              <span class="nav-item nav-text">
                <a class="nav-link nav-text" href="#">CONTACTS </a>
              </span>
              <span
                v-if="$page.props.auth.user"
                class="nav-item nav-text dropdown"
              >
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  >{{ $page.props.auth.user.name }}</a
                >
                <ul
                  class="dropdown-menu dropdown-menu-custom mt-2 justify-center"
                >
                  <span>
                    <DropdownLink
                      :href="route('profile.show')"
                      :active="route().current('profile.show')"
                    >
                      Profile
                    </DropdownLink>
                  </span>
                  <span>
                    <form @submit.prevent="logout">
                      <DropdownLink> Log Out </DropdownLink>
                    </form>
                  </span>
                </ul>
              </span>
              <span v-else class="nav-item nav-text dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  >Account</a
                >
                <ul
                  class="dropdown-menu dropdown-menu-custom mt-2 justify-center"
                >
                  <span>
                    <DropdownLink :href="route('login')"> Login </DropdownLink>
                  </span>
                  <span>
                    <DropdownLink :href="route('register')">
                      Register
                    </DropdownLink>
                  </span>
                </ul>
              </span>
            </div>
            <div
              class="hidden lg:flex lg:items-center lg:ml-6 mt-4"
              id="primary"
            >
              <div class="col-1 nav-icon">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </div>
              <div class="col-1 nav-icon">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </div>
              <div class="col-1 nav-icon">
                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
              </div>
              <div class="col-1 nav-icon">
                <i class="fa fa-google-plus" aria-hidden="true"></i>
              </div>
            </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
              <button
                class="eff-menu-btn inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                @click="showingNavigationDropdown = !showingNavigationDropdown"
              >
                <svg
                  class="h-6 w-6 eff-menu-btn"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    :class="{
                      hidden: showingNavigationDropdown,
                      'inline-flex': !showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                    :class="{
                      hidden: !showingNavigationDropdown,
                      'inline-flex': showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="lg:hidden eff-menu mt-2"
        >
          <div class="pt-2 pb-3 space-y-1" id="primary">
            <span class="nav-item nav-text active">
              <a class="nav-link active" href="#">GALLERY </a>
            </span>
            <span class="nav-item nav-text">
              <a class="nav-link" href="#">WORKS </a>
            </span>
            <span class="nav-item nav-text">
              <a class="nav-link nav-text" href="#">CONTACTS </a>
            </span>
            <span
              v-if="$page.props.auth.user"
              class="nav-item nav-text dropdown"
            >
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                >{{ $page.props.auth.user.name }}</a
              >
              <ul
                class="dropdown-menu dropdown-menu-custom mt-2 justify-center"
              >
                <span>
                  <DropdownLink
                    :href="route('profile.show')"
                    :active="route().current('profile.show')"
                  >
                    Profile
                  </DropdownLink>
                </span>
                <span>
                  <form @submit.prevent="logout">
                    <DropdownLink> Log Out </DropdownLink>
                  </form>
                </span>
              </ul>
            </span>
            <span v-else class="nav-item nav-text dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                >Account</a
              >
              <ul
                class="dropdown-menu dropdown-menu-custom mt-2 justify-center"
              >
                <span>
                  <DropdownLink :href="route('login')"> Login </DropdownLink>
                </span>
                <span>
                  <DropdownLink :href="route('register')">
                    Register
                  </DropdownLink>
                </span>
              </ul>
            </span>
          </div>
          <div class="pt-2 pb-3 space-y-1 text-center" id="primary">
            <div class="col-1 nav-icon">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
            <div class="col-1 nav-icon">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </div>
            <div class="col-1 nav-icon">
              <i class="fa fa-pinterest-p" aria-hidden="true"></i>
            </div>
            <div class="col-1 nav-icon">
              <i class="fa fa-google-plus" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header v-if="$slots.header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot />
      </main>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 col-12">
          <img src="/img/mt-1804-home-logo-footer.png" class="text-center" />
        </div>
        <div class="col-md-4 col-12">
          <div class="text-center">
            <a href="#" class="text-white">
              <i class="fa fa-facebook icon-footer" aria-hidden="true"></i>
            </a>
            <a href="#" class="text-white">
              <i class="fa fa-twitter icon-footer" aria-hidden="true"></i>
            </a>
            <a href="#" class="text-white">
              <i class="fa fa-instagram icon-footer" aria-hidden="true"></i>
            </a>
            <a href="#" class="text-white">
              <i class="fa fa-pinterest-p icon-footer" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <p class="moto-text_system_10" style="text-align: center">
            Copyright © {{ year }}. All Rights Reserved
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>
<style>
.footer {
  background-color: #292929;
  padding-top: 30px;
  padding-bottom: 30px;
}
.icon-footer {
  padding: 10px;
  font-size: 16px;
  line-height: 16px;
}
</style>
