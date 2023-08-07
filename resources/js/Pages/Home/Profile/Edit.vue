<template>
  <Head :title="$page.props.auth.user.name" />
  <navbar />
  <div>
    <!--Avatar-->
    <!-- <AvatarUser /> -->
    <!--Profile-->
    <div class="container rounded bg-white mt-5 mb-5 p-3 p-3 py-5 px-3">
      <div class="row p-3 py-5 px-3 shadow ">
        <UpdateProfileUser />

        <!--PassWord-->
        <UpdatePasswordUser />

        <!--Delete-->
        <DeleteUser />
      </div>
    </div>
  </div>
</template>
<script setup>
import { Head } from "@inertiajs/vue3";
import Navbar from "../Narbar.vue";
import UpdatePasswordUser from "./EditProfile/UpdatePasswordUser.vue";
import UpdateProfileUser from "./EditProfile/UpdateProfileUser.vue";
import DeleteUser from "./EditProfile/DeleteUser.vue";
import AvatarUser from "./EditProfile/AvatarUser.vue";
</script>
<style>
.profile-button-cancel {
  background: rgb(245, 94, 80);
  box-shadow: none;
  border: none;
}

.profile-button-delete {
  background: rgb(244, 34, 2);
  box-shadow: none;
  border: none;
}

.profile-button {
  background: rgb(58, 206, 100);
  box-shadow: none;
  border: none;
}

.profile-button-cancel {
  background: rgb(156, 159, 157);
  color: black;
  box-shadow: none;
  border: none;
}

.profile-button-cancel:hover {
  background: #bb3a3a;
}

.labels {
  font-size: 11px;
}
</style>
