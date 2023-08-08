<template>
  <DashboardLayout title="Session Manager">
    <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

    <div class="py-12">
      <div class="max-w-12xl mx-auto px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row mt-3 mb-3">
              <h1 class="text-center session-manager-title">
                Sessions Manager
              </h1>
              <hr class="mt-3 mb-3" />
              <div class="col-md-4 col-12 mt-3">
                <p class="text-center">
                  <Link
                    :href="route('dashboard.session.create')"
                    class="btn btn-success rounded"
                  >
                    <i class="fa-solid fa-plus"></i> Create New Seesion
                  </Link>
                </p>
              </div>
              <div class="col-md-4 col-12 mt-3">
                <div class="input-group">
                  <span class="input-group-text text-capitalize">Category</span>
                  <select
                    name="category_slug"
                    id="category_slug"
                    v-model="category_slug"
                    @change="change_category()"
                    class="form-control"
                  >
                    <option
                      value="all"
                      :selected="
                        route().params.category_slug == null ||
                        category_slug == null ||
                        route().params.category_slug == 'all'
                      "
                    >
                      All ({{ count }})
                    </option>
                    <option
                      v-for="product_category in product_categories"
                      :key="product_category.id"
                      :value="product_category.slug"
                      :selected="product_category.slug == category_slug"
                    >
                      {{ product_category.name }} ({{
                        product_category.sessions_count
                      }})
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-12 mt-3">
                <form action="#" @submit="doSearch">
                  <div class="row">
                    <div class="col-md-6 col-12"></div>
                    <div class="col-md-6 col-12 mt-1"></div>
                    <div class="input-group">
                      <input
                        type="text"
                        name="search"
                        id="search"
                        class="form-control rounded-l"
                        placeholder="Search"
                        aria-describedby="helpId"
                        v-model="search"
                      />
                      <button
                        type="submit"
                        class="btn btn-info border-right-0 bg-info text-white text-bold"
                      >
                        <i class="fa-solid fa-search"></i>
                      </button>
                      <Link
                        :href="
                          route('dashboard.session.index', {
                            category_slug: category_slug,
                          })
                        "
                        class="btn btn-danger bg-danger"
                      >
                        <i class="fa-solid fa-eraser"></i>
                      </Link>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <hr class="" />
            <div class="row mb-3">
              <h1 class="text-center session-manager-title">
                {{ category_name }}
              </h1>
              <hr class="mt-1 mb-1" />
              <div class="p-3 table-responsive">
                <table class="table">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Main Category</th>
                    <th>Status</th>
                    <th>Qick Action</th>
                  </thead>
                  <tbody>
                    <tr
                      v-for="auction_session in auctionSession"
                      :key="auction_session.id"
                    >
                      <td>{{ auction_session.id }}</td>
                      <td>{{ auction_session.name }}</td>
                      <td>
                        <Link
                          :href="
                            route('dashboard.session.index', {
                              category_slug: auction_session.category.slug,
                            })
                          "
                        >
                          {{ auction_session.category.name }}
                        </Link>
                      </td>
                      <td>
                        <span
                          v-if="auction_session.status == 0"
                          class="badge bg-warning text-dark"
                          >Pending</span
                        >
                        <span
                          v-if="auction_session.status == '2'"
                          class="badge bg-success"
                          >Running</span
                        >
                        <span
                          v-if="auction_session.status == '3'"
                          class="badge bg-danger"
                          >Finished</span
                        >
                      </td>
                      <td>
                        <Link
                          :href="
                            route('dashboard.session.edit', {
                              session_id: 1,
                            })
                          "
                          class="btn btn-sm btn-info mr-1"
                        >
                          <i class="fa-solid fa-edit"></i>
                        </Link>
                        <Link
                          :href="
                            route('dashboard.session.show', {
                              session_id: 1,
                            })
                          "
                          class="btn btn-sm btn-success mr-1"
                        >
                          <i class="fa-solid fa-eye"></i>
                        </Link>
                        <button
                          class="btn btn-sm btn-danger"
                          @click="delete_session(auction_session.id)"
                        >
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <ul
                  class="pagination justify-center bottom-0 session-pagination"
                >
                  <li
                    v-for="page in links"
                    v-bind:key="page"
                    class="page-item session-page-item"
                    :class="{ active: page.active }"
                  >
                    <Link class="page-link session-page-link" :href="page.url">
                      <span v-html="page.label"></span>
                    </Link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Welcome from "@/Components/Dashboard/Welcome.vue";
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { useAttrs, inject } from "vue";
defineProps({
  title: String,
});
// Khia báo
const attrs = useAttrs();
const product_categories = attrs.product_categories;
var category_slug = ref(attrs.category_slug);
var search = ref(attrs.search);
const count = attrs.count;
const auctionSession = attrs.auction_sessions.data;
const category_name = attrs.category_name;
const links = attrs.auction_sessions.links;
const Swal = inject("$swal");
//Hàm
function change_category() {
  console.log(route().params.category_slug);
  if (
    category_slug.value == route().params.category_slug ||
    (category_slug.value == "all" && route().params.category_slug == null)
  ) {
    return;
  }
  if (category_slug.value != "all" && category_slug.value != "") {
    router.visit(
      route("dashboard.session.index", {
        category_slug: category_slug.value,
      })
    );
  } else {
    router.visit(route("dashboard.session.index"));
  }
}
function doSearch(e) {
  e.preventDefault();
  doSearch = e.target.search.value;
  if (doSearch == "") {
    Swal({
      icon: "warning",
      title: "Oops...",
      text: "You must enter a keyword to search!",
    });
    // showNotification("You must enter a keyword to search!", "danger");
    return;
  }
  router.visit(
    route("dashboard.session.index", {
      category_slug: category_slug.value,
      search: doSearch,
    })
  );
}


</script>
<style>
.session-manager-title {
  font-size: 2rem;
  font-weight: 600;
  color: #4b5563;
}
</style>
