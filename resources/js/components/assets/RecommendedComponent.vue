<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>РЕКОМЕНДУЕМ</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <transition-group name="fade1" tag="div">
                <div v-for="product in recommended" :key="product.id"
                     class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                    <div class="product-item">
                        <div class="img-product">
                            <img :src="urlSite+'/images/products/'+product.img" class="img-responsive" width="255" height="322" alt="">
                        </div>
                        <div class="product-hover">
                            <div class="product-meta">
                                <a class="add_cart" :href="'product/'+product.id">Карточка товара</a>
                            </div>
                        </div>
                        <div class="product-title">
                            <a href="#">
                                <h3>{{product.name}}</h3>
                                <span>{{product.price}} ₽</span>
                            </a>
                        </div>
                    </div>
                </div>
            </transition-group>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                recommended: [],
                urlSite: ''
            }

        },


        mounted(){
            this.getRecommended();
            this.getUrlSite();
        },


        methods: {
            getRecommended: function () {
                axios({
                    method: 'get',
                    url: '/recommended/page/get',
                }).then((response) => {
                    this.recommended = response.data;

                });
            },


            getUrlSite: function () {
                axios({
                    method: 'get',
                    url: '/helper/get-url-site',
                }).then((response) => {
                    this.urlSite = response.data;
                });
            },
        }
    }
</script>

<style scoped>

</style>
