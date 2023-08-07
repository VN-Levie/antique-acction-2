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
                <form action="#">
                  <div class="form-group">
                    <label for="session_name">Session Name</label>
                    <input
                      type="text"
                      name="session_name"
                      id="session_name"
                      class="form-control rounded"
                      placeholder="Session Name"
                      aria-describedby="helpId"
                      v-model="session_name"
                    />
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
</script>
<style>
.session-manager-title {
  font-size: 2rem;
  font-weight: 600;
  color: #4b5563;
}
</style>
