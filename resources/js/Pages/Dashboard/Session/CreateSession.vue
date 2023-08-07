<template>
  <DashboardLayout title="Create New Session">
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
                Create New Session
              </h1>
              <hr class="mt-3 mb-3" />
              <div>
                <form action="#" method="post" @submit.prevent="submit_create">
                  <div class="form-group">
                    <label for="session_name" class="text-capitalize mb-2"
                      >Session Name</label
                    >
                    <input
                      type="text"
                      name="session_name"
                      id="session_name"
                      class="form-control rounded"
                      placeholder="Session Name"
                      aria-describedby="helpId"
                      v-model="session_name"
                      @keyup="gen_slug(session_name)"
                    />
                  </div>
                  <div class="form-group">
                    <label for="session_slug" class="text-capitalize mb-2"
                      >Session Slug</label
                    >
                    <input
                      type="text"
                      name="session_slug"
                      id="session_slug"
                      class="form-control rounded"
                      placeholder="Session Name"
                      aria-describedby="helpId"
                      v-model="session_slug"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="product_categories" class="text-capitalize mb-2"
                      >Main category</label
                    >
                    <select
                      name="product_categories"
                      id="product_categories"
                      class="form-control rounded"
                    >
                      <option
                        v-for="product_category in product_categories"
                        :key="product_category.id"
                        :value="product_category.id"
                        v-text="product_category.name"
                      ></option>
                    </select>
                  </div>
                  <div class="form-group mt-3">
                    <label for="description" class="text-capitalize mb-2"
                      >description</label
                    >
                    <textarea
                      name="description"
                      id="description"
                      class="form-control rounded"
                      rows="3"
                      placeholder="Description"
                      v-model="description"
                    ></textarea>
                  </div>
                  <div class="form-group mt-3">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <label for="description" class="text-capitalize mb-2"
                          >Date Start</label
                        >
                        <input
                          type="date"
                          name="date_start"
                          id="date_start"
                          class="form-control rounded"
                          placeholder="Date Start"
                          aria-describedby="helpId"
                          v-model="date_start"
                        />
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="description" class="text-capitalize mb-2"
                          >Date End</label
                        >
                        <input
                          type="date"
                          name="date_end"
                          id="date_end"
                          class="form-control rounded"
                          placeholder="Date End"
                          aria-describedby="helpId"
                          v-model="date_end"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <label for="payment_and_shipping" class="text-capitalize mb-2"
                      >payment and shipping</label
                    >
                    <textarea
                      name="payment_and_shipping"
                      id="payment_and_shipping"
                      class="form-control rounded"
                      rows="3"
                      placeholder="Payment And Shipping"
                      v-model="payment_and_shipping"
                    ></textarea>
                  </div>
                  <div class="form-group mt-3">
                    <label for="goal" class="text-capitalize mb-2"
                      >goal</label
                    >
                    <textarea
                      name="goal"
                      id="goal"
                      class="form-control rounded"
                      rows="3"
                      placeholder="goal"
                      v-model="goal"
                    ></textarea>
                  </div>
                </form>
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
import { useAttrs } from "vue";
defineProps({
  title: String,
});
// Lấy đối tượng attrs
const attrs = useAttrs();
const product_categories = attrs.product_categories;
const session_name = ref("");
var session_slug = ref("");
const submit = async () => {
  if (auth.user == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "You need to login to abid!",
    });
    return;
  }
  if (props.pusher == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
      timer: 2000,
    });
    return;
  }

  if (form.bid == null || form.bid == "") {
    console.log(form);
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "You need to enter your bid!",
    });
    return;
  }
  if (form.bid <= last_bid_var) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Your bid must be greater than the highest bid!",
    });
    return;
  }
  if (last_uid_var == auth.user.id) {
    Swal.fire({
      icon: "warning",
      title: "Oops...",
      text: "You are currently the highest bidder!",
    });
    return;
  }
  //show loading
  Swal.fire({
    title: "Loading...",
    text: "Please wait",
    allowOutsideClick: false,
    showConfirmButton: false,
    willOpen: () => {
      Swal.showLoading();
    },
  });
  const response = await fetch(
    route("product.test", { product_id: product.id, bid: form.bid }),
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
          .content,
        //   socket_id: props.pusher.socket_id,
        "X-Socket-Id": pusher.connection.socket_id,
      },
      body: {
        bid: form.bid,
      },
    }
  );
  const data = await response.json();
  //   console.log("data", data);
  if (response.status == 200) {
    if (data.status_code == "error") {
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
      title: response.status,
      text: "Something went wrong! Try again!",
      timer: 2000,
    });
    //reload page
    // location.reload();
  }
  //   console.log(response);
  //   form.post(route("product.test", {id: 1}));
};
function gen_slug(val) {
  var slug = val;
  slug = slug.toLowerCase();
  //trim
  slug = slug.replace(/^\s+|\s+$/g, "");
  slug = slug.replace(/ /g, "-");
  //xoá tất cả các ký tự đặc biệt
  slug = removeAccents(slug);
  slug = slug.replace(/[`~!@#$%^&*()_|+=?;:'",.<>\{\}\[\]\\\/]/gi, "");
  //thêm số ngẫu nhiên vào cuối chuỗi
  var random = Math.floor(Math.random() * 100);
  if (slug.length > 0) {
    slug = slug + "-" + random;
  }
  session_slug.value = slug;
}
//hàm xoá dấu tiếng việt
function removeAccents(str) {
  return str
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/đ/g, "d")
    .replace(/Đ/g, "D");
}
</script>
<style>
.session-manager-title {
  font-size: 2rem;
  font-weight: 600;
  color: #4b5563;
}
</style>
