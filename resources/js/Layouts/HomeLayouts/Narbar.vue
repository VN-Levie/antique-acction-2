<template>
  <div id="Navbar">
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

          <div class="hidden lg:flex lg:items-center lg:ml-6 mt-4" id="primary">
            <span class="nav-item nav-text active">
              <a class="nav-link active" href="#">GALLERY </a>
            </span>
            <span class="nav-item nav-text">
              <a class="nav-link" href="#">WORKS </a>
            </span>
            <span class="nav-item nav-text">
              <a class="nav-link nav-text" href="#">CONTACTS </a>
            </span>
            <span class="nav-item nav-text dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                >Account</a
              >
              <ul class="dropdown-menu dropdown-menu-custom">
                <span>
                  <a class="dropdown-item dropdown-item-custom" href="#"
                    >Login</a
                  >
                </span>
                <span>
                  <a class="dropdown-item dropdown-item-custom" href="#"
                    >Register</a
                  >
                </span>
              </ul>
            </span>
          </div>
          <div class="hidden lg:flex lg:items-center lg:ml-6 mt-4" id="primary">
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
              class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
              @click="showingNavigationDropdown = !showingNavigationDropdown"
            >
              <svg
                class="h-6 w-6"
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
        class="lg:hidden"
      >
        <div class="pt-2 pb-3 space-y-1">
          <ResponsiveNavLink
            :href="route('home')"
            :active="route().current('home')"
          >
            Home
          </ResponsiveNavLink>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
          <div class="flex items-center px-4">
            <div>
              <div class="font-medium text-base text-gray-800">
                Tên (nếu đã đăng nhập)
              </div>
              <div class="font-medium text-sm text-gray-500">
                email (nếu đã đăng nhập)
              </div>
            </div>
          </div>

          <div class="mt-3 space-y-1">
            <ResponsiveNavLink
              :href="route('profile.show')"
              :active="route().current('profile.show')"
            >
              Profile
            </ResponsiveNavLink>

            <ResponsiveNavLink
              v-if="$page.props.jetstream.hasApiFeatures"
              :href="route('api-tokens.index')"
              :active="route().current('api-tokens.index')"
            >
              API Tokens
            </ResponsiveNavLink>

            <!-- Authentication -->
            <form method="POST" @submit.prevent="logout">
              <ResponsiveNavLink as="button"> Log Out </ResponsiveNavLink>
            </form>

            <!-- Team Management -->
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/Dashboard/ApplicationMark.vue";

import Dropdown from "@/Components/Dashboard/Dropdown.vue";
import DropdownLink from "@/Components/Dashboard/DropdownLink.vue";
import NavLink from "@/Components/Dashboard/NavLink.vue";
import ResponsiveNavLink from "@/Components/Dashboard/ResponsiveNavLink.vue";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);
</script>
