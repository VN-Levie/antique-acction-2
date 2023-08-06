<template>
  <HomeLayout title="Appraiser">
    <div class="team">
      <div class="team-container">
        <div
          v-for="(member, index) in DataTeam.data"
          :key="index"
          class="team-card"
        >
          <img
            :src="member.avatar"
            :alt="member.name"
            class="team-member-image rounded"
          />
          <h2 class="mt-2">{{ member.name }}</h2>
          <h3 class="m-2">
            <strong>Biography: </strong>{{ member.biography }}
          </h3>
          <h3 class="m-2"><strong>titles: </strong>{{ member.titles }}</h3>
        </div>
      </div>
    </div>
    <ul class="pagination justify-center bottom-0 session-pagination mb-3 mt-3">
      <li
        v-for="page in links"
        :key="page"
        class="page-item session-page-item"
        :class="{ active: page.active }"
      >
        <Link class="page-link session-page-link" :href="page.url">
          <span v-html="page.label"></span>
        </Link>
      </li>
    </ul>
  </HomeLayout>
</template>

<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { defineComponent, useAttrs } from "vue";
import { Link } from "@inertiajs/vue3";

export default defineComponent({
  setup() {
    const attrs = useAttrs();
    const DataTeam = attrs.DataTeam;
    const links = attrs.DataTeam.links;

    return {
      DataTeam,
      links,
    };
  },
  components: {
    HomeLayout,
    Link,
  },
});
</script>

<style >
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
.team {
  box-sizing: border-box;
  padding: 20px 0 20px 0;
  margin: 0;
}

.team-container {
  display: flex;
  justify-content: center;
  text-align: center;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.team-card {
  width: 370px;
  height: auto;
  margin: 10px 20px 10px 20px;
}
.team-card img {
  height: 440px;
  width: 370px;
  object-fit: cover;
  justify-content: center;
}
.team-card img.team-member-image {
  height: 440px;
  object-fit: cover;
  width: 100%;
  display: inline-block;
}

.team-card h2 {
  font-weight: 600;
  font-style: normal;
  font-family: "Montserrat", sans-serif;
  color: #292929;
  font-size: 28px;
}

@media (max-width: 768px) {
  .team-card {
    width: 350px;
  }
}
</style>