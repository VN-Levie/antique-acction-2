
<template>
  <HomeLayout :title="title">
    <div class="container-fluid bg-gray rounded p-5">
      <div class="row">
        <ProductDetail
        :product="product"
        :messages="messages"
        :auth="auth"
        :pusher="pusher"
        />
      </div>

    </div>
  </HomeLayout>
</template>;
  <script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import ProductDetail from "@/Components/Home/Product/ProductDetail.vue";
import { useAttrs, ref } from "vue";
Pusher.logToConsole = true;
var messages = ref([]);
var pusher = new Pusher("12d18941cde2ffd0892e", {
  cluster: "ap1",
});
var channel = pusher.subscribe("bid-sent");
channel.bind("bid-sent", function (data) {
    console.log(typeof data);
  messages.value.push(data);
});
//load the messages when the page loads
//test send message
function sendMEss() {
  axios
    .post("/api/bid-sent", {
      message: "hello",
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}
// Lấy đối tượng attrs
const attrs = useAttrs();
const product = attrs.product;
const auth = attrs.auth;
const title = product.name + " - " + product.session.name;
</script>
