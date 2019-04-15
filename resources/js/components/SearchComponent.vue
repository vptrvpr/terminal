<template>
    <div>

        <header-component></header-component>

        <section class="featured-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-menu">
                            <div class="row categories-list">
                                <div class="container">

                                    <div class="categories-list-center">
                                        <transition-group name="showCategories" tag="a" class="tag-a-categories">
                                            <a v-for="(category,index) in categories.categories" v-if="showCategories"
                                               :key="category.id" :href="'/catalog/category/'+category.id"
                                               class="category-index">
                                                <img :src="category.img">
                                                <h4>{{category.name}}</h4>
                                            </a>
                                        </transition-group>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container">
                    <div class="description-category">
                        <transition name="out-right" tag="div">
                            <div v-if="showUnderCategories" class="description-category-div-search">
                                <h1 class="text-center" style="font-size: 32px;">Название продукта содержит: «{{title}}»</h1>
                            </div>
                        </transition>
                        <br><br>

                    </div>

                    <transition-group name="fade1">
                        <div v-for="product in products" v-if="products.length" :key="'product'+product.id"
                             class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                            <div class="product-item">
                                <div class="img-product">
                                    <img :src="urlSite+'/images/products/'+product.img" class="img-responsive"
                                         width="255"
                                         height="322" alt="">
                                </div>
                                <div class="product-hover">
                                    <div class="product-meta">
                                        <a class="add_cart" :href="'/catalog/category/product/'+product.id">Карточка
                                            товара</a>
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

                    <transition name="fade1">
                        <div v-if="!products.length">
                            <h1 class="text-center search-error">По запросу «{{title}}» ничего не найдено</h1>
                        </div>
                    </transition>


                </div>
            </div>
        </section>

        <section class="service-section" v-if="partners.length !== 0">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-6 wow fadeInRight animated" v-for="partner in partners"
                         data-wow-delay="0.1s">
                        <div class="service-item">
                            <a :href="partner.link" target="_blank">
                                <img :src="partner.image" height="70">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="best-seller-section">
            <recommended-component></recommended-component>
        </section>
        <section class="contact-section">
            <footer-component></footer-component>
        </section>


    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                categories: {},
                styleSpanCountProducts: {},
                products: {},
                showProductsUpdate: false,
                count_all: true,
                productsRec: {},
                showCategories: false,
                partners: [],
                showUnderCategories: false,
                sliders: [],
                urlSite: '',
                title: ''

            }
        },
        mounted() {
            this.getCategories();
            this.showCategoriesStartPage();
            this.getPartners();
            this.getProductByTitle();
        },
        methods: {
            getCategories: function () {
                axios( {
                    method: 'get',
                    url: '/get_categories',
                } ).then( ( response ) => {
                    this.categories = response.data;

                } );
            },
            getProductsRec: function () {
                axios( {
                    method: 'get',
                    url: '/get_recomended',
                } ).then( ( response ) => {
                    this.productsRec = response.data;
                } );
            },
            getProducts: function () {
                this.count_all = true;
                axios( {
                    method: 'get',
                    url: '/get_products',
                } ).then( ( response ) => {
                    this.products = response.data;
                } );
            },

            getProductByTitle: function () {
                axios( {
                    method: 'get',
                    url: '/product/search/' + this.takeTitle(),
                } ).then( ( response ) => {
                    this.products = response.data.products;
                    this.title = response.data.title;
                } );
            },


            showAllCategories: function () {
                this.showProductsUpdate = false;
                this.count_all = true;
                axios( {
                    method: 'get',
                    url: '/get_products',
                } ).then( ( response ) => {
                    this.products = response.data;
                    var app = this;
                    for ( var i = 0; i < response.data.length; i++ ) {
                        app.categories.categories[ i ].show = false;
                    }
                } );
                setTimeout( () => {
                    this.showProductsUpdate = true;
                }, 500 )
            },

            showCategory: function ( index ) {
                var i;
                for ( i = 0; i < this.categories.categories.length; i++ ) {
                    this.categories.categories[ i ].show = false;
                }
                this.categories.categories[ index ].show = true;
            },


            showCategoriesStartPage: function () {
                var win = $( window );
                var marker = $( '.categories-list' );
                if ( win.scrollTop() + win.height() >= marker.offset().top ) {
                    this.showCategories = true;
                    this.showUnderCategories = true;
                }
            },


            getPartners: function () {
                axios( {
                    method: 'get',
                    url: '/partners/get',
                } ).then( ( response ) => {
                    this.partners = response.data;
                } );
            },

            takeTitle: function () {
                var href = location.href;
                var title = href.split( '/search?title=' )[ 1 ];

                return title;
            }


        }

    }
</script>
