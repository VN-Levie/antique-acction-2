<template>
  <div class="session-item bg-white">
    <div class="card">
      <div class="row">
        <div class="col-md-4">
          <Link :href="route('session.show', [session.category.slug, session.slug])">
            <img
              :src="session.thumbnail"
              class="session-item-thumbnail"
              loading="lazy"
            />
          </Link>
        </div>
        <div class="col-md-8">
          <div class="sessions-list-item">
            <p class="auction-id text-uppercase">
              Online Auction {{ session.id }}
            </p>
            <h3 class="auction-name">
              <Link :href="route('session.show', [session.category.slug, session.slug])">
                {{ session.name }}
              </Link>
            </h3>
            <p>Lots: {{ session.products_count }}</p>
            <p>{{ session.description }}</p>
            <p>{{ session.category.slug }}</p>
          </div>
        </div>
      </div>
      <div class="card-footer session-item-footer">
        <div class="row">
          <div class="col-6 col-md-6">
            <p class="text-bold date-auction">
              {{ monthNames[start_at_month] }} {{ start_at_day }} -
              {{ monthNames[end_at_month] }} {{ end_at_day }}
            </p>
          </div>
          <div class="col-6 col-md-6">
            <Link
              :href="route('session.show', [session.category.slug, session.slug])"
              class="btn btn-auction btn-sm float-end"
            >
              View Auction
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
const props = defineProps({ session: Object });

const session = props.session;
const monthNames = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

const start_at = new Date(session.start_at);
const end_at = new Date(session.end_at);
const start_at_day = start_at.getDate();
const start_at_month = start_at.getMonth();

const end_at_day = end_at.getDate();
const end_at_month = end_at.getMonth();
</script>
<style>
.session-item {
  font-family: "Smythe", cursive;
  /* border: 0.5px solid #ccc; */
  /* padding: 10px; */
  margin-bottom: 10px;
  transition: all 0.3s ease-in-out;
}
.sessions-list-item {
  padding: 10px;
  position: relative;
}
.session-item:hover {
  /* box-shawdow */
  /* box-shadow: 1px 1px 3px 1px #634236d8; */
  /* trans */

  transition: all 0.3s ease-in-out;
}
.date-auction {
  font-size: 1.1rem;
  font-weight: 600;
  /* bottom: 0; */
  /* position: absolute; */
}
.auction-name {
  font-size: 1.2rem;
  font-weight: 600;
}
.session-item-thumbnail {
  width: 100%;
  height: 200px;
  object-fit: cover;
  margin: 0;
  /* margin-bottom: 10px; */
  padding: 0;
}
.list-categorys-mobile {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  /* width: 300px; */
}

.categorys-mobile {
  display: inline-block;

  background-color: #eee;
  margin: 10px;
  border-radius: 5px;
}
.list-categorys-mobile::-webkit-scrollbar-thumb {
  border-radius: 5px;
  background-color: rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: inset 0 0 1px rgba(255, 255, 255, 0.5);
}
.categorys-mobile-arrow {
  /* font-size: 30px; */
  color: #634236;
  font-weight: bold;
  cursor: pointer;
  margin-top: 10px;
  background-color: #eee;
}
.auction-id {
  /* reset font chự4 về gốc */
  font-size: 0.7rem;
  /* Montserrat, sans-serif; */
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  color: #634236;
  margin-bottom: 0;
}
.session-item-footer {
  padding: 0.5rem 1rem;
  background-color: #ffffff;
  border-top: 0.3px solid #ccc;
}
.btn-auction {
  background-color: #634236;
  color: #fff;
  border-radius: 5px;
  padding: 5px 10px;
  font-size: 0.8rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}
.btn-auction:hover {
  background-color: #fff;
  color: #634236;
  border: 1px solid #634236;
  transition: all 0.3s ease-in-out;
}
.auction-name a {
  text-decoration: none;
  color: #634236;
}
.auction-name a:hover {
  color: #634236;
  text-shadow: 0 0 1px #634236;
}
</style>
