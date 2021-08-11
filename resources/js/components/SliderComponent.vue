<template>
    <section v-if="items.status" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slider-parent-container">
                        <div class="swiper-container swiper-container-hero">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" v-for="item in items.slider_item">
                                    <div v-if="item.buy_status" data-path="modal-call-modal" class="modal-opener swiper-slide-item">
                                        <img :src="path + item.photo" alt="">
                                    </div>
                                    <div v-else class="swiper-slide-item">
                                        <img :src="path + item.photo" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-hero-slider-buttons-next">
                            <img src="home/img/icons/arrow.svg" alt="">
                        </div>
                        <div class="swiper-hero-slider-buttons-prev">
                            <img src="home/img/icons/arrow.svg" alt="">
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
                path: 'images/',
                scripts: [
                    // 'trendStyle/libs/jquery/jquery.min.js',
                    // 'trendStyle/libs/bootstrap/bootstrap.min.js',
                    // 'trendStyle/libs/bootstrap/popper.min.js',

                    'home/libs/swiper/swiper-bundle.min.js',
                    'home/libs/dynamic-adaptive/dinamyc-adapt.js',
                    'home/libs/rating/jquery.rateyo.min.js',


                    'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js',
                    'trendStyle/libs/jquery/jquery-migrate-1.4.1.min.js',
                    'trendStyle/libs/slick/slick.min.js',
                    'trendStyle/libs/countdown/jquery.countdown.min.js',

                    'home/js/main.js',
                    'trendStyle/js/main.js',
                ]
            }
        },
        mounted() {
            this.addScripts();
            this.getSlider()
        },

        methods: {
            getSlider() {
                axios.get('api/v1/slider?offset=0&limit=10')
                    .then((response) => {
                        this.items = response.data.data[0];
                    })
            },
            addScripts() {
                for (let i = 0; i < this.scripts.length; i++) {
                    let recaptchaScript = document.createElement('script');
                    recaptchaScript.type = "text/javascript";
                    recaptchaScript.async = false;
                    recaptchaScript.setAttribute('src', this.scripts[i]);
                    document.body.appendChild(recaptchaScript)
                }
            }
        }
    }
</script>
