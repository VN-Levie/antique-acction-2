<template>
  <div class="row mb-4 ml-4">
    <div class="col-md-4 float-right">
      <form
        class="input-group rounded"
        :action="route('post.index', { search: searchQuery })"
        method="GET"
      >
        <input
          type="search"
          class="form-control rounded"
          placeholder="Search"
          v-model="searchQuery"
        />
        <span class="input-group-text border-0">
          <a :href="route('post.index', { search: searchQuery })"
            ><i class="fas fa-search"></i
          ></a>
        </span>
      </form>
    </div>
    <div class="col-md-8 text-end">
      <a :href="route('post.create')" class="btn btn-success mr-3"
        >add new</a
      >
    </div>
  </div>
  <div class="table-container">
    <table class="table table-striped table-bordered table-sm">
      <thead>
        <tr>
          <th @click="sort('title')" class="th-sm">Title</th>
          <th @click="sort('thumbnail')" class="th-sm">thumbnail</th>
          <th @click="sort('content')" class="th-sm">content</th>
          <th @click="sortchild('author')" class="th-sm">author</th>
          <th @click="sortchild('category')" class="th-sm">category</th>
          <th class="th-sm">Created At</th>
          <th class="th-sm">EDIT</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(article, index) in sortedArticles" :key="index">
          <td class="justify-content-center">{{ article.title }}</td>
          <td><img :src="article.thumbnail" alt="Thumbnail" width="100" /></td>
          <td>{{ article.content }}</td>
          <td>{{ article.author.name }}</td>
          <td>{{ article.category.name }}</td>
          <td>{{ formatDate(article.created_at) }}</td>
          <td>
            <i class="fa-sharp fa-light fa-pen-to-square"></i>
            <i class="fa-sharp fa-light fa-trash-xmark"></i>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row">
    <ul class="pagination justify-center bottom-0 session-pagination mb-3 mt-3">
      <li
        v-for="page in articleList.links"
        v-bind:key="page"
        class="page-item session-page-item"
        :class="{ active: page.active }"
      >
        <Link class="page-link session-page-link" :href="page.url">
          <span v-html="page.label"></span>
        </Link>
      </li>
    </ul>
  </div>
</template>

<script>
import { ref } from "vue";
import _ from "lodash";
import { Link } from "@inertiajs/vue3";

export default {
  props: {
    articleList: {
      type: Object, // Đúng kiểu dữ liệu là Object
      default: () => [], // k Đúng cú pháp cho giá trị mặc định là một mảng rỗng
    },
  },
  setup(props) {
    const sortedArticles = ref([...props.articleList.data]); // Sử dụng props.articleList
    const searchQuery = ref("");

    const sort = (column) => {
      sortedArticles.value = _.sortBy(sortedArticles.value, [column]); // Truyền column vào mảng []
    };
    const sortchild = (column) => {
      sortedArticles.value = _.sortBy(sortedArticles.value, [
        (article) =>
          _.get(article, column) && _.get(article, column).name.toLowerCase(),
      ]);
    };

    return {
      sortedArticles,
      sort,
      sortchild,
      searchQuery,
    };
  },
  methods: {
    formatDate(date) {
      const formattedDate = new Date(date);
      const day = String(formattedDate.getDate()).padStart(2, "0");
      const month = String(formattedDate.getMonth() + 1).padStart(2, "0");
      const year = formattedDate.getFullYear();
      const hours = String(formattedDate.getHours()).padStart(2, "0");
      const minutes = String(formattedDate.getMinutes()).padStart(2, "0");

      return `${day}/${month}/${year} ${hours}:${minutes}`;
    },
  },
  components: { Link },
};
</script>

<style>
.session-section {
  /* import font Smythe google */

  /* width: 300px; */
  /* border: 1px dashed brown; thay đổi kiểu viền thành nét đứt màu nâu */
  padding: 10px;
}

.session-section h2 {
  font-family: "Smythe", cursive;
  text-align: center;
  text-transform: uppercase;
  color: #634236;
  font-size: 30px;
}
.list-session {
  margin-top: 20px;
  min-height: 450px;
}
.session-pagination {
  font-family: "Smythe", cursive;
  margin-top: 20px;
  border: none;
}
.session-page-item {
  border: none;
}
.session-page-link {
  color: #634236;
  /* font-size: 20px; */
  border: none;
}
/* session-page-item active */
.session-page-item.active .session-page-link {
  background-color: #634236;
  color: white;
  border-radius: 5px;
}
.session-page-link:hover {
  color: white;
  /* font-size: 20px; */
  border: none;
  font-weight: bold;
  background-color: #634236c9;
  border-radius: 5px;
}
</style>
