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
                    <th class="text-center">Date</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
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
                      <td class="text-center">
                        {{ format_date(auction_session.start_at) }} -
                        {{ format_date(auction_session.end_at) }}
                      </td>
                      <td class="text-center">
                        {{
                          get_status(
                            auction_session.start_at,
                            auction_session.end_at
                          )
                        }}
                      </td>
                      <td>
                        <Link
                          :href="
                            route('dashboard.session.edit', {
                              session_id: auction_session.id,
                            })
                          "
                          class="btn btn-sm btn-info mr-1"
                        >
                          <i class="fa-solid fa-edit"></i>
                        </Link>

                        <button
                          class="btn btn-sm btn-danger mr-1"
                          @click="delete_session(auction_session.id)"
                        >
                          <i class="fa-solid fa-trash"></i>
                        </button>
                        <Link
                          :href="
                            route('dashboard.session.show', {
                              session_id: 1,
                            })
                          "
                          class="btn btn-sm btn-secondary mr-1"
                        >
                          Products ({{ auction_session.products_count }})
                        </Link>
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
function delete_session(id) {
  Swal.fire({
    title: "Are you sure?",
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
  const response = await fetch(route("dashboard.session.del"), {
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
function get_status(start_date, end_date) {
  var now = new Date();
  var start = new Date(start_date);
  var end = new Date(end_date);
  if (now < start) {
    return "Upcoming";
  } else if (now > start && now < end) {
    return "Ongoing";
  } else {
    return "Ended";
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
