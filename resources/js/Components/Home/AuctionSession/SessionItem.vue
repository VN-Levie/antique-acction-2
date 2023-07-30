<template>
  <div class="card session-item">
    <h3 class="card-title">{{ item.name }}</h3>
  </div>
</template>
<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
const props = defineProps({ auctionSession: Object });

const item = props.auctionSession;
</script>
<style>
.session-item{
    font-family: "Smythe", cursive;
    border: 0.5px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    /* box-shawdow */
    -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
}
</style>
