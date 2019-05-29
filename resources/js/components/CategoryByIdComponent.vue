<template>
    <div>

        <header-component></header-component>

        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated">
                            <div class="form-group">
                                <input type="email" class="form-control subscribe" id="email" placeholder="Search...">
                                <button class="suscribe-btn"><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->


        <section class="featured-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-menu">
                            <div class="row categories-list">
                                <div class="container">
                                    <div class="categories-list-center">
                                        <a v-for="(category,index) in categories.categories"
                                           :key="category.name" :href="'/catalog/category/'+category.id"
                                           class="category-index">
                                            <img :src="category.img">
                                            <h4>{{category.name}}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container">
                    <div class="description-category">
                        <transition-group name="fade1" tag="div">
                            <div v-if="category.show" :key="category.id">
                                <div class="description-category-div">
                                    <h1>{{category.name}}</h1>
                                    <p style="padding: 0;margin-bottom: 20px;">{{category.description}}</p>
                                </div>
                            </div>
                        </transition-group>
                        <transition name="out-left" tag="div">
                            <div v-if="category.show">
                                <div v-for="under_category in category.under_categories">

                                    <div class="under-category">
                                        <a :href="'/catalog/category/'+under_category.id"
                                           class="under-category-link">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="margin-top-10 img-under-category" style="margin-left: 25px" :src="under_category.img">
                                                </div>
                                                <div class="col-md-10">
                                                    <h4 class="under-category-name">{{under_category.name}}</h4>
                                                    <p>{{under_category.description}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </transition>
                    </div>

                    <div class="row featured isotope">
                        <transition-group name="out-right" tag="div">
                            <div v-for="product in category.products_page" v-if="category.show" :key="product.id"
                                 class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                                <div class="product-item">
                                    <div class="img-product">
                                        <img :src="urlSite+'/images/products/'+product.img"
                                             class="img-responsive" width="255" height="322" alt="">
                                    </div>
                                    <div class="product-hover">
                                        <div class="product-meta">
                                            <a class="add_cart" :href="'product/'+product.id">Карточка
                                                товара</a>
                                        </div>
                                    </div>
                                    <div class="product-title">
                                        <a href="#">
                                            <h3>{{product.name}}</h3>
                                            <span v-if="product.price">{{product.price}} ₽</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </transition-group>
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
                category: {},
                showProductsUpdate: false,
                count_all: true,
                productsRec: {},
                showCategories: false,
                showUnderCategories: false,
                urlSite: ''

            }
        },
        mounted() {
            this.getCategories();
            this.getProducts();
            this.showCategoriesStartPage();
            this.getCategoriesById();
            this.getUrlSite();
        },
        methods: {
            getCategories: function () {
                axios({
                    method: 'get',
                    url: '/get_categories',
                }).then((response) => {
                    this.categories = response.data;

                });
            },


            getCategoriesById: function () {
                var href = location.href;
                var categoryId = href.split('category/')[1];
                axios({
                    method: 'get',
                    url: '/get_categories_by_id/' + categoryId,
                }).then((response) => {
                    this.category = response.data;

                });
            },
            getProductsRec: function () {
                axios({
                    method: 'get',
                    url: '/get_recomended',
                }).then((response) => {
                    this.productsRec = response.data;
                });
            },
            getProducts: function () {
                this.count_all = true;
                axios({
                    method: 'get',
                    url: '/get_products',
                }).then((response) => {
                    this.products = response.data;
                });
            },
            showAllCategories: function () {
                this.showProductsUpdate = false;
                this.count_all = true;
                axios({
                    method: 'get',
                    url: '/get_products',
                }).then((response) => {
                    this.products = response.data;
                    var app = this;
                    for (var i = 0; i < response.data.length; i++) {
                        app.categories.categories[i].show = false;
                    }
                });
                setTimeout(() => {
                    this.showProductsUpdate = true;
                }, 500)
            },
            addCart: function (id) {
                this.addCartAnimation();
                axios({
                    method: 'get',
                    url: '/cart_add/' + id,
                }).then((response) => {
                    this.cart = response.data;
                    this.addCartAnimation(response.data.message);
                });
            },


            showCategory: function (index) {
                var i;
                for (i = 0; i < this.categories.categories.length; i++) {
                    this.categories.categories[i].show = false;
                }
                this.categories.categories[index].show = true;
            },


            showCategoriesStartPage: function () {
                var win = $(window);
                var marker = $('.categories-list');
                if (win.scrollTop() + win.height() >= marker.offset().top) {
                    this.showCategories = true;
                    this.showUnderCategories = true;
                }
            },


            getUrlSite: function () {
                axios({
                    method: 'get',
                    url: '/helper/get-url-site',
                }).then((response) => {
                    this.urlSite = response.data;
                });
            }


        }

    }
</script>
