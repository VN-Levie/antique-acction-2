<template>
  <div class="session-item">
    <img :src="session.thumbnail" class="session-item-thumbnail rounded">
    <h3 class="card-title">{{ session.name }}</h3>
    <p>Num product: {{ session.products.length }} </p>
  </div>
</template>
<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
const props = defineProps({ session: Object });

const session = props.session;
console.log(session.products);
</script>
<style>
.session-item {
  font-family: "Smythe", cursive;
  border: 0.5px solid #ccc;
  padding: 10px;
  margin-bottom: 10px;
  }
.session-item:hover {

  /* box-shawdow */
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
.session-item-thumbnail{
    width: 100%;
    height: 200px;
    object-fit: cover;
    margin-bottom: 10px;
}
</style>
