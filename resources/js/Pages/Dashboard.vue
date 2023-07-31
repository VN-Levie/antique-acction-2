<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Welcome from "@/Components/Dashboard/Welcome.vue";
</script>

<template>
  <Head title="Home" />
  <DashboardLayout title="Dashboard" >
    <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

    <div class="py-12">
      <div class="max-w-12xl mx-auto px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            {{ $page.props.auth.user.name.addresses }}
          <Welcome/>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
