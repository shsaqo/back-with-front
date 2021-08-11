<template>
    <section id="products" class="product-items-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="products_title title text-center">Տեսականի</h2>
                </div>
            </div>
            <div class="row">
                <div v-for="item in items" class="col-sm-6 col-12 col-lg-4 col-xxl-3">
                    <div class="product_item">
                        <a href="#" :data-path="'product-single-modal'+item.id" class="modal-opener">
                            <div class="product_image">
                                <div class="swiper-container product-mobile-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img :src="path + item.photo" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img :src="path + item.photo" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img :src="path + item.photo" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-products-mobile-buttons-next"><img
                                    src="home/img/icons/arrow.svg" alt=""></div>
                                <div class="swiper-products-mobile-buttons-prev"><img
                                    src="home/img/icons/arrow.svg" alt=""></div>
                            </div>
                            <div class="product_name">
                                <h3 class="prod_title">
                                    {{ item.name }}
                                </h3>
                            </div>
                            <div class="product_price">
                                <div class="price_count">
                                    <p>{{ item.price }} <span>դր</span></p>
                                    <s>{{ item.old_price }} <span>դր</span></s>
                                </div>
                                <div class="price_percent">
                                    <p>{{ item.sale }}<span>%</span></p>
                                </div>
                            </div>
                        </a>
                        <div class="product_order">
                            <button class="product_order_btn modal-opener" data-path="modal-call-modal">
                                Պատվիրել
                            </button>
                        </div>
                    </div>
                    <div  :data-target="'product-single-modal'+item.id" class="modal single-modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title-container">
                                </div>
                                <button class="modal-closer">
                                    <img src="home/img/icons/closer-icon.svg" alt=""/>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="modal-sliders-parent">
                                                <div class="swiper-container gallery-top">
                                                    <div class="swiper-wrapper">
                                                        <div v-for="slider in item.slider" class="swiper-slide">
                                                            <img :src="path + slider.photo" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumbs-arrow-container">
                                                    <div class="swiper-container gallery-thumb">
                                                        <div class="swiper-wrapper">
                                                            <div v-for="slider in item.slider" class="swiper-slide">
                                                                <img :src="path + slider.photo" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-thumbs-slider-buttons-prev"><img src="home/img/icons/arrow.svg"
                                                                                                        alt=""></div>
                                                    <div class="swiper-thumbs-slider-buttons-next"><img src="home/img/icons/arrow.svg"
                                                                                                        alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-1">
                                            <div class="slider-modal-text-content d-flex flex-column">
                                                <div class="slider-product-title">
                                                    <h2 class="title slider-item-title">Ճաշի տարաների գունավոր տերմո հավաքածու</h2>
                                                </div>
                                                <div
                                                    class="slider-modal-product-price-all-info d-flex align-items-center justify-content-between">
                                                    <div class="modal-price-content">
                                                        <p class="slider-modal-siled-price">10750 <span>դր</span></p>
                                                        <s class="slider-modal-siled-price">21500 <span>դր</span></s>
                                                    </div>
                                                    <div class="modal-percent-content">
                                                        <p><span>-</span>53<span>%</span></p>
                                                    </div>
                                                </div>
                                                <div class="slider-modal-product-descr-dots">
                                                    <ul class="descr-dots_list">
                                                        <li class="descr-dots_list__items">Ճաշի տարաների գունավոր տերմո հավաքածու</li>
                                                        <li class="descr-dots_list__items">Կոմպակտ</li>
                                                        <li class="descr-dots_list__items">Չժանգետվող տարրաներ</li>
                                                        <li class="descr-dots_list__items">Տերմո տարաներ 3 գատ</li>
                                                        <li class="descr-dots_list__items">Տերմո տարաներ 3 գատ</li>
                                                    </ul>
                                                </div>
                                                <div class="slider-modal-button-content mt-auto">
                                                    <button class="slider-modal-btn modal-opener" data-path="modal-call-modal">
                                                        Պատվիրել
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>
<script>
    export default {
        data() {
            return {
                items: [],
                path: 'images/'
            }
        },
        mounted() {
            this.getProduct();
        },
        methods: {
            getProduct() {
                axios.get('api/v1/product?offset=0&limit=10')
                    .then((response) => {
                        this.items = response.data.data;
                        console.log(response.data.data)
                    })
            },
        }
    }
</script>
