<template>
  <Head title="Home" />
  <DashboardLayout title="Create New Post">
    <div class="py-12">
      <div class="max-w-12xl mx-auto px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row mt-3 mb-3">
              <h1 class="text-center session-manager-title">Create New Post</h1>
              <hr class="mt-3 mb-3" />
              <div>
                <form action="#" method="post" @submit.prevent="handleSubmit">
                  <div class="form-group">
                    <label for="Title_Post" class="text-capitalize mb-2"
                      >Title Post</label
                    >
                    <input
                      type="text"
                      name="Title_Post"
                      id="Title_Post"
                      class="form-control rounded"
                      placeholder="Title Post"
                      aria-describedby="helpId"
                      v-model="Title_Post"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <label for="category_Post" class="text-capitalize mb-2"
                          >category Post</label
                        >
                        <select
                          name="product_categories"
                          id="product_categories"
                          class="form-control rounded"
                        >
                          <option
                            v-for="category in Categories"
                            :key="category.id"
                            :value="category.id"
                            v-text="category.name"
                          ></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <label for="thumbnail" class="text-capitalize mb-2"
                          >Image</label
                        >
                        <input
                          type="file"
                          name="thumbnail"
                          id="thumbnail"
                          class="form-control rounded"
                          accept="image/*"
                          aria-describedby="helpId"
                          v-on:change="handleThumbnailChange"
                        />
                      </div>
                      <div class="col-md-6 col-12">
                        <div v-if="thumbnailPreview">
                          <img
                            :src="thumbnailPreview"
                            alt="Thumbnail Preview"
                            class="mt-3"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-3">
                    <label for="content" class="text-capitalize mb-2"
                      >content</label
                    >
                    <textarea
                      name="content"
                      id="content"
                      class="form-control rounded"
                      rows="3"
                      placeholder="content"
                      v-model="content"
                    ></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import CreatePost from "@/Components/Dashboard/Post/Createpost.vue";
import { defineComponent, useAttrs, ref } from "vue";
import { Link, router } from "@inertiajs/vue3";

export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const Categories = attrs.Categories;
    const title = ref("");
    const category = ref("");
    const content = ref("");
    const thumbnail = ref(null);
    const thumbnailPreview = ref(null);

    const handleThumbnailChange = (event) => {
      thumbnail.value = event.target.files[0];
      thumbnailPreview.value = URL.createObjectURL(event.target.files[0]);
    };

    const handleSubmit = async () => {
      const formData = new FormData();
      formData.append("title", title.value);
      formData.append("category", category.value);
      formData.append("content", content.value);
      formData.append("thumbnail", thumbnail.value);

      const response = await fetch(route("post.store"), {
        method: "post",
        headers: {
          "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        },
        body: formData,
      });
    };

    return {
      title,
      category,
      content,
      thumbnail,
      thumbnailPreview,
      handleThumbnailChange,
      handleSubmit,
      Categories,
    };
  },
  components: { DashboardLayout, CreatePost },
  methods: {},
});
</script>

