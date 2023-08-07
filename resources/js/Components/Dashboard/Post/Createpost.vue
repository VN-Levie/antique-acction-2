<template>
  <form enctype="multipart/form-data">
      <div class="row">
        <div class="col-12">
          <div class="col-md-5">
            <label for="title">Title</label>
            <input
              v-model="formData.title"
              type="text"
              class="form-control"
              id="title"
              placeholder="Title"
              required
            />
          </div>
          <div class="col-md-4">
            <label for="category">Category</label>
            <select
              v-model="formData.category"
              id="category"
              class="form-control"
              required
            >
              <option
                v-for="category in Categories"
                :key="category.id"
                :value="category.id"
              >
                {{ category.name }}
              </option>
            </select>
          </div>
        </div>
      </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input
        type="file"
        id="image"
        ref="imageInput"
        @change="handleImageChange"
      />
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea
        v-model="formData.content"
        class="form-control"
        id="content"
        placeholder="Content"
        required
      ></textarea>
    </div>
    <button type="submit" class="btn btn-success mr-3">Create Post</button>
  </form>
</template>
  
  <script>
export default {
  data() {
    return {
      formData: {
        title: "",
        category: null,
        content: "",
        image: null,
      },
    };
  },
  methods: {
    handleImageChange(event) {
      this.formData.image = event.target.files[0];
    },
  },
  props: {
    Categories: {
      type: Object,
      default: () => [],
    },
  },
};
</script>
  
  <style>
</style>
  