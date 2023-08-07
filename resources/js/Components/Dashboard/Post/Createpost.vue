<template>
  <form :action="route('New.Post.store')"
  method="post"
  enctype="multipart/form-data">
  @csrf
    <div class="form-row">
      <div class="col-md-5 form-group">
        <label for="title">Title</label>
        <input
          type="text"
          class="form-control"
          name="title"
          placeholder="Title"
        />
      </div>
      <div class="col-md-4 form-group">
        <label for="category">Category</label>
        <select
          name="category"
          class="form-control"
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
    <div class="form-group">
      <label for="image">Image</label>
      <input
        type="file"
        name="image"
        ref="imageInput"
        @change="handleImageChange"
      />
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea
        class="form-control"
        name="content"
        placeholder="Content"
      ></textarea>
    </div>
    <button type="submit" class="btn btn-success mr-3">Create Post</button>
  </form>
</template>
  
  <script>
export default {
  data() {
    return {
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
  