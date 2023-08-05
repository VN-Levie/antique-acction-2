<template>
  <div class="product-item bg-white">
    <div class="card">
      <div class="row">
        <div class="col-md-4">
          <Link
            :href="
              route('product.view', {
                session_slug: product.session.slug,
                id: product.id,
              })
            "
          >
            <img
              :src="JSON.parse(product.images)[0]"
              class="product-item-thumbnail"
              loading="lazy"
            />
          </Link>
        </div>
        <div class="col-md-8">
          <div class="products-list-item">
            <p class="category-name-in-product">
              <Link :href="route('product.index', product.category.slug)">
                # {{ product.category.name }}
              </Link>
            </p>
            <h3 class="product-name">
              <Link>
                {{ product.name }}
              </Link>
            </h3>
            <p>{{ product.description.slice(0, 100) + "..." }}</p>
            <p>
              <span class="text-product-estimate">
                Est: ${{
                  new Intl.NumberFormat("en-IN", {
                    maximumSignificantDigits: 3,
                  }).format(JSON.parse(product.estimate).form)
                }}
                - ${{
                  new Intl.NumberFormat("en-IN", {
                    maximumSignificantDigits: 3,
                  }).format(JSON.parse(product.estimate).to)
                }}
              </span>
            </p>
            <p >
              <span class="text-product-estimate">
                Last Bid: ${{
                  new Intl.NumberFormat("en-IN", {
                    maximumSignificantDigits: 3,
                  }).format(product.last_bid)
                }}
              </span>
            </p>
          </div>
        </div>
      </div>
      <div class="card-footer product-item-footer">
        <div class="row">
          <div class="col-6 col-md-6">
            <p class="text-bold date-auction">
              {{ getDisplayDate(product.session.start_at) }}
            </p>
          </div>
          <div class="col-6 col-md-6">
            <Link class="btn btn-auction btn-sm float-end">
              Bid Now
            </Link>
          </div>
        </div>
        <hr class="mt-2 mb-2" />
        <div class="row">
          <p class="auction-id text-uppercase text-center">
            <Link
              :href="
                route('session.show', [
                  product.category.slug,
                  product.session.slug,
                ])
              "
              class="session-name-in-product-item"
            >
              Online Auction {{ product.session.id }} |
              {{ product.session.name }}
            </Link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";
const props = defineProps({ product: Object });

const product = props.product;
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

function getDisplayDate(date_string) {
  const date = new Date(date_string);
  const d = new Date(date);
  const month = d.getMonth();
  const day = d.getDate();
  return `${monthNames[month]} ${day}`;
}
</script>
<style>
.product-item {
  font-family: "Smythe", cursive;
  /* border: 0.5px solid #ccc; */
  /* padding: 10px; */
  margin-bottom: 10px;
  transition: all 0.3s ease-in-out;
}
.products-list-item {
  padding: 10px;
  position: relative;
}
.product-item:hover {
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
.product-item-thumbnail {
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
.product-item-footer {
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
  font-family: "Smythe", cursive;
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
.session-name-in-product-item {
  font-size: 0.9rem;
}
.product-name a {
  font-size: 1.2rem;
  color: #634236;
  overflow: hidden;
  font-weight: bold;
}
.category-name-in-product {
  font-size: 0.8rem;
  font-weight: 600;
  color: #634236d8;
  margin-bottom: 0;
}
</style>
