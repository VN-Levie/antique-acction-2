<template>
  <!---->
  <form
    @submit.prevent="submit"
    class="rounded-lg col-md-4 "
  >
    <div class="p-3 py-5 mr-1">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <!--Profrofle Edit-->
        <h4 class="text-right font-extrabold text-[30px]">Profile Settings</h4>
      </div>
      <div class="row mt-2">
        <div class="col-md-6">
          <label class="labels">Name</label
          ><input v-model="form.name" type="text" class="form-control w-full rounded" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <label class="labels">Email ID</label
          ><input v-model="form.email" type="text" class="form-control w-full rounded" />
        </div>
        <div class="col-md-12">
          <label class="labels">Mobile Number</label
          ><input v-model="form.phoneNumber" type="text" class="form-control rounded" />
        </div>
      </div>
      <div class="row mt-10">
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary profile-button">
            Save Profile
          </button>
        </div>
        <div class="col-md-6">
          <a
            :href="route('profile.index')"
            class="btn btn-primary profile-button-cancel"
            type="button"
            >Cancel</a
          >
        </div>
      </div>
    </div>
  </form>
</template>
<script setup>
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import { toRefs } from "vue";
import PlusIcon from "vue-material-design-icons/Plus.vue";

const form = useForm({
  name: usePage().props.auth.user.name,
  email: usePage().props.auth.user.email,
  phoneNumber: usePage().props.auth.user.phoneNumber,
});

const submit = () => {
  form.post(route("profile.update"), {
    onFinish: () => route("profile.index"),
  });
};
</script>
