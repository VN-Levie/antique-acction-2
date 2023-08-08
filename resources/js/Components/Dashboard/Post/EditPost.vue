<template>
  <form enctype="multipart/form-data">
    <div class="row">
      <div class="col-12">
        <div class="col-md-5">
          <label for="title">Title</label>
          <input
            type="text"
            class="form-control"
            id="title"
            placeholder="Title"
            v-model="title"
            required
          />
        </div>
        <div class="col-md-4">
          <label for="category">Category</label>
          <select
            id="category"
            class="form-control"
            v-model="category"
            required
          >
            <option
              v-for="item in Categories"
              :key="item.id"
              :value="item.id"
              v-text="item.name"
            ></option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group mt-3">
      <div class="row">
        <div class="col-md-6 col-12">
          <label for="thumbnail" class="text-capitalize mb-2">Image</label>
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
              width="200"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea
        class="form-control"
        id="content"
        placeholder="Content"
        v-model="content"
        required
      ></textarea>
    </div>
    <button type="submit" class="btn btn-success mr-3">Create Post</button>
  </form>
</template>
    
<script>
import { defineComponent, useAttrs, ref } from "vue";

export default {
  props: {
    post: {
      type: Object,
      default: null,
    },
    Categories: {
      type: Object,
      default: null,
    },
  },
  setup(props) {
    const post = ref(props.post);
    const thumbnailPreview = ref(post.value.thumbnail);
    const id = ref(props.post.id);
    const title = ref(props.post.title);
    const category = ref(props.post.category.id);
    const content = ref(props.post.content);
    const thumbnail = ref(props.post.thumbnail);

    const handleThumbnailChange = (event) => {
      thumbnail.value = event.target.files[0];
      thumbnailPreview.value = URL.createObjectURL(event.target.files[0]);
    };

    const handleSubmit = async () => {
      const formData = new FormData();
      formData.append("id", id.value);
      formData.append("title", title.value);
      formData.append("category", category.value);
      formData.append("content", content.value);
      formData.append("thumbnail", thumbnail.value);

      await Inertia.post(
        route("post.edit"),
        formData,
        {}
      );
    };
    return {
      thumbnailPreview,
      handleThumbnailChange,
      handleSubmit,
      title,
      category,
      content,
      thumbnail,
    };
  },
  methods: {
    handleImageChange(event) {
      const file = event.target.files[0];
      this.formData.image = file;
      this.thumbnailPreview = URL.createObjectURL(file);
    },
  },
};
</script>
    
    <style>
</style>
    