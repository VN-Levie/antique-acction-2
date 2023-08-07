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
              <h1 class="text-center session-manager-title">Sessions</h1>
              <hr class="mt-3 mb-3" />
              <div class="col-md-3 col-12">
                <p>
                  <Link :href="route('dashboard.session.create')">
                    <i class="fa-solid fa-plus"></i> Create New Seesion
                  </Link>
                </p>
              </div>
              <div class="col-md-3 col-12">
                <p><i class="fa-solid fa-list"></i> View All Sessions</p>
              </div>
              <div class="col-md-3 col-12">
                <p><i class="fa-solid fa-pen"></i> Edit Session</p>
              </div>
              <div class="col-md-3 col-12">
                <p><i class="fa-solid fa-trash"></i> Delete Session</p>
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
</script>
<style>
.session-manager-title {
  font-size: 2rem;
  font-weight: 600;
  color: #4b5563;
}
</style>
