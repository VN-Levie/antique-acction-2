<template>
    <div class="container-fluid session-detail-section bg-white">
        <div class="row">
               <div class="col-md-4">
                    <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                         <div class="row py-3 shadow-5">
                              <div class="col-12 mb-1">
                                   <div class="lightbox">
                                        <img onclick="zoom(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp" alt="Gallery image 1"
                                             class="ecommerce-gallery-main-img active w-100 " data-action="zoom" id="main_img" />
                                   </div>
                              </div>
                              <div class="col-12">
                                   <div class="row list-img-sp">
                                        <div class="col-3 mt-1">
                                             <img onclick="changeimg(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp" alt="Gallery image 1"
                                                  class="active w-100 img-eff" />
                                        </div>
                                        <div class="col-3 mt-1">
                                             <img onclick="changeimg(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp" alt="Gallery image 2" class="w-100 img-eff" />
                                        </div>
                                        <div class="col-3 mt-1">
                                             <img onclick="changeimg(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp" class="w-100 img-eff" />
                                        </div>
                                        <div class="col-3 mt-1">
                                             <img onclick="changeimg(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp" alt="Gallery image 4" class="w-100 img-eff" />
                                        </div>
                                        <div class="col-3 mt-1">
                                             <img onclick="changeimg(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp" alt="Gallery image 4" class="w-100 img-eff" />
                                        </div>
                                        <div class="col-3 mt-1">
                                             <img onclick="changeimg(this)" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp" alt="Gallery image 4" class="w-100 img-eff" />
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-md-8 p-5">
                    <h2 class="sec-title text-capitalize text-center">Rèm vải voan trắng màu</h2>
                    <div class="row">
                         <div class="col-12">
                              <div class="description-sp mt-3">
                                   <p>Giá bán:
                                        <span class="sp-price-new">1.000.000đ <span class="sp-price-discount">(-10%)</span></span>
                                   </p>
                                   <p>Niêm yết:
                                        <span class="sp-price-old text-dark">1.000.000đ</span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-12">
                              <div class="description-sp mt-3">
                                   <p>
                                        Điện thoại đặt hàng và tư vấn:
                                        <span class="sp-price-new text-center">0123456789</span>
                                   </p>

                              </div>
                         </div>
                         <div class="col-12">
                              <div class="chinh-sach mt-3">
                                   <div class="alert alert-info">
                                        <p class="text-center text-uppercase mt-0">Chính sách bán hàng</p>
                                        <hr>
                                        <p class="mt-2">
                                             <i class="fas fa-truck"></i>
                                             Miễn phí vận chuyển với đơn hàng trên 500.000đ
                                        </p>
                                        <p class="mt-2">
                                             <i class="fa-solid fa-location-pin-lock"></i>
                                             Tư vấn thiết kế miễn phí
                                        </p>
                                        <p class="mt-2">
                                             <i class="fa-solid fa-sun"></i>
                                             Hỗ trợ xem mẫu tại nhà
                                        </p>
                                        <p class="mt-2">
                                             <i class="fa-solid fa-screwdriver-wrench"></i>
                                             Lắp đặt - thi công tận nơi
                                        </p>
                                   </div>
                              </div>
                         </div>

                    </div>

               </div>

               <div class="col-12">
                    <div class="row">
                         <div class="col-12">
                              <div class="description-sp mt-3">
                                   <p class="sec-title  text-uppercase">Thông tin chi tiết sản phẩm</p>
                                   <hr>
                                   <div class="des-sp-detail">
                                        <p>
                                             Màn vải họa tiết là loại vải mang đậm phong cách châu Á. Màn vải họa tiết không những đẹp mà còn có độ chống nắng cản sáng tốt.

                                             Màn vải họa tiết có nhiều màu sắc và họa tiết phù hợp với phong thủy và phong cách của gia chủ. Màn vải họa tiết vừa đa dạng, vừa sang trọng làm tôn lên đẹp cho
                                             mọi
                                             không gian từ phòng khách, phòng ngủ, phòng bé, phòng sinh hoạt chung, tới phòng đọc sách, phòng làm việc.
                                        </p>
                                   </div>



                              </div>
                         </div>
                    </div>
               </div>

               <div class="col-12 mt-5 mb-3">
                    <div class="row gx-3 gy-3 mt-0">
                         <h2 class="sec-title text-capitalize">Sản phẩm cùng loại</h2>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-6">
                              <div class="p-3 sp-item">
                                   <a href="#">
                                        <div class="img-list-sp">
                                             <img src="https://product.hstatic.net/1000145303/product/1._20voan_20tr_c6_a1n_20m_c3_a0u_medium.jpg" alt="" class="img-center img-fill img-list-sp">
                                        </div>
                                        <div class="sp-intro-des mt-3">
                                             <h3 class="sp-name">
                                                  <a href="#" class="link-sp">
                                                       Rèm vải voan trắng màu
                                                  </a>
                                             </h3>
                                             <div class="sp-price mt-3">
                                                  <span class="sp-price-new">1.000.000đ</span>
                                                  <span class="sp-price-old">1.000.000đ</span>
                                             </div>
                                        </div>
                                   </a>

                              </div>
                         </div>





                    </div>
               </div>

          </div>
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <h2 class="text-center">{{ product.name }}</h2>
            <p class="text-center text-uppercase action-titles-type">
              Online Auction
            </p>
            <!-- {{ product.images }} -->



            <img
              src="/img/mt-1804-home-divider2.png"
              class="img-center mt-1 lazyload"
            />
          </div>
        </div>
        <div class="col-md-4">

          <div>
            <p class="mt-3">
              <i class="fa fa-share-alt" aria-hidden="true"></i> Share
            </p>
          </div>
        </div>
      </div>


    </div>
    <!-- {{ start_at }} -->
  </template>

  <script setup>
  import { defineProps, inject } from "vue";
  import { Link, router } from "@inertiajs/vue3";


  import { useAttrs } from "vue";
  // Lấy đối tượng attrs

  const Swal = inject("$swal");
  const props = defineProps({
    product: Object,
    category_name: String,
    auth: Object,
  });

  var currentLocation = window.location;
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
  const category_name = props.category_name;
  const product = props.product;

  </script>
  <style>
  .session-detail-section {
    /* border: 0.5px solid #ccc; */
    /* padding: 10px; */
    margin-bottom: 10px;
    transition: all 0.3s ease-in-out;
  }
  .session-detail-section h2 {
    font-family: "Smythe", cursive;
    font-size: 30px;
  }
  .tabs-title {
    font-family: "Smythe", cursive;
    font-size: 1.2rem;
  }
  .action-titles-type {
    font-family: "Montserrat", sans-serif;
    font-size: 0.8rem;
  }
  .img-center {
    margin: 0 auto;
  }
  .session-description p {
    font-size: 1.5rem;
    /* font-size: 30px; */
  }
  .session-detail-section .card {
    border: none;
  }
  .session-detail-section .card-footer {
    border: none;
    background-color: white;
    font-size: 21px;
  }
  .auction-card-footer-text {
    font-size: 0.8rem;
  }
  .nav-tabs .nav-item .nav-link {
    /* background-color: #634236b7; */
    color: #fff;
  }

  .tab-content {
    /* border: 1px solid #dee2e6; */
    border-top: transparent;
    padding: 15px;
  }

  .tab-content .tab-pane {
    background-color: #fff;
    /* color: #0080ff; */
    min-height: 200px;
    height: auto;
  }
  .text-product-estimate {
    color: #634236;
    font-size: large;
  }
  .text-roduct-name {
    font-family: "Smythe", cursive;
    font-size: 1.5rem;
    color: #634236;
    overflow: hidden;
  }
  .card-product {
    border: 1px solid #634236 !important;
    background-color: transparent;
    color: #634236;
    /* box-shadow: #634236 0px 0px 0px 1px inset !important; */
  }
  .overview-tab a {
    color: #634236 !important;
  }
  .overview-tab:hover {
    text-shadow: #634236 0px 0px 0px 1px !important;
  }
  .product-bid-info {
    font-family: "Smythe", cursive;
    font-size: 1.2rem !important;
    /* font-family: "Montserrat", sans-serif; */
  }

  </style>
