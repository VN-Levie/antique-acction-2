
<template>
  <HomeLayout :title="title">
    <div class="container-fluid bg-gray rounded p-5">
      <div class="row">
        <ProductDetail
          :product="product"
          :messages="messages"
          :auth="auth"
          :pusher="pusher"
          :last_bid="last_bid"
          :last_uid="last_uid"
        />
      </div>
    </div>
  </HomeLayout>
</template>;
  <script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import ProductDetail from "@/Components/Home/Product/ProductDetail.vue";
import { useAttrs, ref } from "vue";
// Lấy đối tượng attrs
const attrs = useAttrs();
const product = attrs.product;
const auth = attrs.auth;
const title = product.name + " - " + product.session.name;
Pusher.logToConsole = true;
var messages = ref([]);
var pusher = new Pusher("12d18941cde2ffd0892e", {
  cluster: "ap1",
});
var channel_name = "bid-sent-" + product.id; //tên sự kiện
var channel = pusher.subscribe(channel_name); //kênh
var last_bid = ref(0);
if(attrs.product.last_bid){
    last_bid.value = attrs.product.last_bid.price_bided;
}else{
    last_bid.value = attrs.product.start_price;
}
var last_uid = ref(0);
channel.bind(channel_name, function (data) {
  //sự kiện
  messages.value.push(data);
  console.log(data);
  last_bid.value = data.last_bid;
  last_uid.value = data.last_uid;
});
//load the messages when the page loads
</script>
