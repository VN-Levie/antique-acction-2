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
                {{ session.name }}
              </h1>
              <hr class="mt-3 mb-3" />
              <div class="col-md-4 col-12 mt-3">
                <p class="text-center">
                  <Link
                    :href="route('dashboard.product.create', {session_id : session.id})"
                    class="btn btn-success rounded"
                  >
                    <i class="fa-solid fa-plus"></i> Add Product
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
                Products of {{ session.name }}
              </h1>
              <hr class="mt-1 mb-1" />
              <div class="p-3 table-responsive">
                <table class="table">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    <tr v-for="product in list_products.data" :key="product.id">
                      <td>{{ product.id }}</td>
                      <td>{{ product.name }}</td>
                      <td>
                        {{ product.category.name }}
                    
                      </td>

                      <td class="text-center">
                        {{ get_status(product.status) }}
                      </td>
                      <td class="text-center">
                        <Link
                          :href="
                            route('dashboard.product.edit', {
                              product_id: product.id,
                            })
                          "
                          class="btn btn-sm btn-info mr-1"
                        >
                          <i class="fa-solid fa-edit"></i>
                        </Link>

                        <button
                          class="btn btn-sm btn-danger mr-1"
                          @click="delete_product(product.id)"
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

import { ckeditor } from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

const attrs = useAttrs();
const product_categories = attrs.product_categories;

const session = attrs.session;
const id = attrs.id;
const links = attrs.session.links;
const Swal = inject("$swal");
const list_products = attrs.list_products;
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
function delete_product(id) {
  Swal.fire({
    title: "Delete this product?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "bg-danger",
    cancelButtonColor: "bg-secondary",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      //   Swal.fire("Deleted!", "Your file has been deleted.", "success");
      doDetele(id);
    }
  });
}
async function doDetele(id) {
  const data_send = {
    id: id,
  };
  const response = await fetch(route("dashboard.product.del"), {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      "X-Requested-With": "XMLHttpRequest",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
    },
    body: JSON.stringify(data_send),
  });
  if (response.status == 500) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong! Please try again!",
      timer: 2000,
    });
    return;
  }
  console.log("response", response);
  const data = await response.json();
  console.log("data", data);
  if (response.status == 200) {
    if (data.status_code == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: data.message,
        // timer: 2000,
      });
    } else {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: data.message,
        timer: 2000,
      });
      //remlod page
      location.reload();
      // last_bid_var = data.bid;
      // last_uid_var = data.uid;
    }
  } else if (response.status == 500) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
      timer: 2000,
    });
  } else if (response.status == 419) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Token expired! Reload page!",
      timer: 2000,
    });
    //reload page
    location.reload();
  } else if (response.status == 404) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Product not found!",
      timer: 2000,
    });
    //reload page
    // location.reload();
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong! Try again!",
      timer: 2000,
    });
  }
}

// function format day| input: 2023-08-16 23:58:00 | output: 2023 Aug 16
function format_date(date) {
  var d = new Date(date);
  var month = new Array();
  month[0] = "Jan";
  month[1] = "Feb";
  month[2] = "Mar";
  month[3] = "Apr";
  month[4] = "May";
  month[5] = "Jun";
  month[6] = "Jul";
  month[7] = "Aug";
  month[8] = "Sep";
  month[9] = "Oct";
  month[10] = "Nov";
  month[11] = "Dec";
  var n = month[d.getMonth()];
  var day = d.getDate();
  var year = d.getFullYear();
  return " " + n + " " + day;
}
//function get status base on start date and end date
function get_status(status) {
  if (status == 0) {
    return "Not started";
  } else if (status == 1) {
    return "In progress";
  } else if (status == 2) {
    return "Finished";
  } else if (status == 3) {
    return "Canceled";
  }
}
</script>
<style>
.session-manager-title {
  font-size: 2rem;
  font-weight: 600;
  color: #4b5563;
}
</style>
