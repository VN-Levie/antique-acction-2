<template>
  <DashboardLayout title="Create New Product">
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
                Add product for {{ session.name }}'s
              </h1>
              <hr class="mt-3 mb-3" />
              <div>
                <form
                  action="#"
                  method="POST"
                  id="create_pin"
                  enctype="multipart/form-data"
                  @submit.prevent="submit_create"
                  
                >
                  <div class="form-group">
                    <label for="product_name" class="text-capitalize mb-2"
                      >Product Name</label
                    >
                    <input
                      type="text"
                      name="product_name"
                      id="product_name"
                      class="form-control rounded"
                      placeholder="Product Name"
                      aria-describedby="helpId"
                      v-model="form.product_name"
                      @keyup="gen_slug(form.product_name)"
                    />
                  </div>
                  <div class="form-group">
                    <label for="product_slug" class="text-capitalize mb-2"
                      >Product Slug</label
                    >
                    <input
                      type="text"
                      name="product_slug"
                      id="product_slug"
                      class="form-control rounded"
                      placeholder="Product Name"
                      aria-describedby="helpId"
                      v-model="form.product_slug"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="product_categories" class="text-capitalize mb-2"
                      >category</label
                    >
                    <select
                      name="product_categories"
                      id="product_categories"
                      class="form-control rounded"
                      v-model="form.category_id"
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
                      v-model="form.description"
                    ></textarea>
                  </div>
            
                  <div class="form-group mt-3">
                    <label for="images" class="text-capitalize mb-2"
                      >Images</label
                    >
                    <br />
                    <input
                      type="file"
                      name="images[]"
                      id="images"
                      class="form-control rounded border-1"
                      placeholder="Images"
                      aria-describedby="helpId"
                      multiple
                     >
                  </div>
                  <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success bg-success">
                      Save
                    </button>
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
import { ckeditor } from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Welcome from "@/Components/Dashboard/Welcome.vue";
import { ref } from "vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { useAttrs, inject } from "vue";
defineProps({
  title: String,
});
//min day start
const today = new Date();
const minDate_time = ref(formatDate(today));
function formatDate(date) {
  var d = new Date(date),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = "" + d.getFullYear(),
    hour = "" + d.getHours(),
    minute = "" + d.getMinutes();
  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;
  if (hour.length < 2) hour = "0" + hour;
  if (minute.length < 2) minute = "0" + minute;
  return [year, month, day].join("-") + "T" + [hour, minute].join(":");
}
function minDate() {
  var d = new Date(),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = "" + d.getFullYear(),
    hour = "" + d.getHours(),
    minute = "" + d.getMinutes();
  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;
  if (hour.length < 2) hour = "0" + hour;
  if (minute.length < 2) minute = "0" + minute;
  return [year, month, day].join("-") + "T" + [hour, minute].join(":");
}
function resetEdnday() {
  form.date_end = "";
}
// Lấy đối tượng attrs
const form = useForm({
  product_name: "",
  product_slug: "",
  product_categories: "",
  description: "",
  date_start: "",
  date_end: "",
  payment_and_shipping: "",
  goal: "",
  images: "",
});
const minDate_2 = ref(form.date_start);
const attrs = useAttrs();
const product_categories = attrs.product_categories;
const session = attrs.session;
const auth = attrs.auth;
const Swal = inject("$swal");

const submit_create = async () => {
  var images = document.querySelector('input[type="file"]').files;
    console.log(images);
  // return;
  if (auth.user == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Login session expired! Please login again!",
    });
    location.href = route("login");
    return;
  }
  if (form.product_name == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Product name is required!",
    });
    return;
  }
  
  if (form.category_id == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Main categories is required!",
    });
    return;
  }
  if (form.description == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Description is required!",
    });
    return;
  }

  if (!images) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Thumbnail is required!",
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
  var data_send = {
    product_name: form.product_name,
    product_slug: form.product_slug,
    category_id: form.category_id,
    description: form.description,
    date_start: form.date_start,
    date_end: form.date_end,
    payment_and_shipping: form.payment_and_shipping,
    goal: form.goal,
    images: images,
    images_name: images.name,
  };
  const response = await fetch(route("dashboard.product.store"), {
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

  //close loading
  Swal.close();
  //   console.log("data", data);
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
  form.product_slug = slug;
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
.thumb {
  margin: 0px 0px 0 0;
  width: 200px;
}
.btn-file {
  position: relative;
  overflow: hidden;
  vertical-align: middle;
}
.btn-file {
  position: relative;
  overflow: hidden;
  vertical-align: middle;
}
.btn-file > input {
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  margin: 0;
  font-size: 23px;
  cursor: pointer;
  filter: alpha(opacity=0);
  opacity: 0;
  direction: ltr;
}

.fileinput {
  display: inline-block;
  margin-bottom: 9px;
}

.fileinput .form-control {
  display: inline-block;
  padding-top: 7px;
  padding-bottom: 5px;
  margin-bottom: 0;
  vertical-align: middle;
  cursor: text;
}

.fileinput .images {
  display: inline-block;
  margin-bottom: 10px;
  overflow: hidden;
  text-align: center;
  vertical-align: middle;
  max-width: 360px;
}

.fileinput .images.img-circle {
  border-radius: 50%;
  max-width: 100px;
}

.fileinput .images > img {
  max-height: 100%;
  width: 100%;
}

.fileinput .btn {
  vertical-align: middle;
}

.fileinput-exists .fileinput-new,
.fileinput-new .fileinput-exists {
  display: none;
}

.fileinput-inline .fileinput-controls {
  display: inline;
}

.fileinput-filename {
  display: inline-block;
  overflow: hidden;
  vertical-align: middle;
}

.form-control .fileinput-filename {
  vertical-align: bottom;
}

.fileinput.input-group {
  display: table;
}

.fileinput.input-group > * {
  position: relative;
  z-index: 2;
}

.fileinput.input-group > .btn-file {
  z-index: 1;
}

.fileinput-new.input-group .btn-file,
.fileinput-new .input-group .btn-file {
  border-radius: 0 4px 4px 0;
}

.fileinput-new.input-group .btn-file.btn-sm,
.fileinput-new .input-group .btn-file.btn-sm,
.fileinput-new.input-group .btn-file.btn-xs,
.fileinput-new .input-group .btn-file.btn-xs,
.fileinput-new.input-group .btn-group-sm > .btn-file.btn,
.fileinput-new .input-group .btn-group-sm > .btn-file.btn {
  border-radius: 0 3px 3px 0;
}

.fileinput-new.input-group .btn-file.btn-lg,
.fileinput-new .input-group .btn-file.btn-lg,
.fileinput-new.input-group .btn-group-lg > .btn-file.btn,
.fileinput-new .input-group .btn-group-lg > .btn-file.btn {
  border-radius: 0 6px 6px 0;
}

.form-group.has-warning .fileinput .fileinput-preview {
  color: #ff9800;
}

.form-group.has-warning .fileinput .images {
  border-color: #ff9800;
}

.form-group.has-error .fileinput .fileinput-preview {
  color: #f44336;
}

.form-group.has-error .fileinput .images {
  border-color: #f44336;
}

.form-group.has-success .fileinput .fileinput-preview {
  color: #4caf50;
}

.form-group.has-success .fileinput .images {
  border-color: #4caf50;
}

.input-group-addon:not(:first-child) {
  border-left: 0;
}

.images {
  border: 0 none;
  border-radius: 0;
  padding: 0;
}
.img-raised {
  box-shadow: 0 5px 15px -8px rgba(0, 0, 0, 0.24),
    0 8px 10px -5px rgba(0, 0, 0, 0.2);
}
</style>
