<template>
    <Head title="Products" />
    <HomeLayout>
        <div class="">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <span class="title_services">Products</span>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
                </div>
            </div>
            <div class="services-container">
                <div class="services-card">
                </div>
            </div>
        </div>
        <div>
            <ul class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <li v-for="product in products" :key="product.id" class="p-4 border rounded-lg shadow-md">
                    <div class="mb-2">
                        <strong class="text-lg">{{ product.name }}</strong>
                    </div>
                    <div>
                        <span class="text-gray-600">Description: {{ product.description }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </HomeLayout>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
export default defineComponent({
  setup() {
    const posts = ref([]);

    const Categories_tags = [
      "Business",
      "Entertainment",
      "Environment",
      "Health",
      "Life style",
      "Politics",
      "Technology",
      "World",
    ];

    const tags_cloud = [
      "Business",
      "Technology",
      "Sport",
      "Art",
      "Lifestyle",
      "Three",
      "Photography",
      "Lifestyle",
      "Art",
      "Education",
      "Social",
    ];
  })


const products = ref([]);
onMounted(async () => {
    try {
        const response = await axios.get("http://127.0.0.1:8000/api/products");
        products.value = response.data;
    } catch (error) {
        console.error(error);
    }    
});
getposts();
    return {
      posts,
      tags_cloud,
      Categories_tags,
    };
  },
  components: {
    HomeLayout,
    RecentPosts,
    SidebarRightnews,
    SiderBotom,
  },
  methods: {
    shorttext(value, limit) {
      if (value && limit) {
        return value.substring(0, limit) + "...";
      }
    },
  }



</script>

<style>
.title_services {
    font-weight: 700;
    font-style: normal;
    font-family: "Libre Baskerville", serif;
    color: #292929;
    font-size: 55px;
    line-height: 1.4;
}


.services-card {
    width: 300px;
    height: 60px;
    margin: 30px 0 30px 0;
}

.services-card h2 {
    font-weight: 600;
    font-style: normal;
    font-family: "Montserrat", sans-serif;
    color: #292929;
    font-size: 16px;
    line-height: 1.4;
}

.services-card-img {
    width: 270px;
    height: 320px;
    margin: 20px 5px;
    background-size: cover;
}

@media (max-width: 768px) {
    .title_services {
        font-weight: 400px;
        font-size: 40px;
    }

    .services img {
        width: 200px;
    }

    .services-card {
        margin: 10px 0 10px 0;
    }

    .services {
        padding: 30px 0 0 0;
    }


}
</style>