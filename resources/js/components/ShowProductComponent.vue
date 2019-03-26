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
                        <br><br>
                    </div>

                    <div class="row featured isotope">
                        <div class="row" style="margin-bottom: 20px">
                            <transition name="out-left">
                                <div class="col-md-3" v-if="showProduct">
                                    <h1 class="show-product-name" style="margin-top: 35px;">{{product.name}}</h1>
                                </div>
                            </transition>
                            <div class="col-md-7"></div>
                            <transition name="out-right">
                                <div class="col-md-2" v-if="showProduct">
                                    <h1 class="show-product-price">{{product.price}} ₽</h1>
                                    <button class="btn btn-primary-purple">Купить</button>
                                </div>
                            </transition>
                        </div>
                        <div class="row" style="margin-bottom: 20px">
                            <transition name="out-left">
                                <div class="col-md-6" v-if="showProduct">
                                    <p class="show-product-description">{{product.description}}</p>
                                </div>
                            </transition>
                            <div class="col-md-2"></div>
                            <transition name="out-right">
                                <div class="col-md-4" v-if="showProduct">
                                    <img class="show-product-image" :src="'/images/products/'+product.img">
                                </div>
                            </transition>
                        </div>
                        <div class="row">
                            <transition name="out-top">
                                <div class="col-md-12" v-if="showProduct">
                                    <h3 class="text-center show-product-name">Характеристики</h3>
                                    <table class="table show-product-specification">
                                        <thead></thead>
                                        <tbody>
                                        <tr v-for="specification in product.all_specifications">
                                            <th scope="row">{{specification.name}}</th>
                                            <td>{{specification.parameter}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="best-seller-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>РЕКОМЕНДУЕМ</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <div class="img-product">
                                <img src="img" class="img-responsive" width="255" height="322" alt="">
                            </div>
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a class="add_cart"><i class="pe-7s-cart"></i>Добавить в корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>name</h3>
                                    <span>price ₽</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>СВЯЗАТЬСЯ</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1><b>К</b>омпаниия <b>Т</b>ерминал</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class
                                aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut
                                vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
                            <div class="contact-info">
                                <p>Адрес: </p>
                                <p>Телефон: 8 (800) 000-00-00</p>
                                <p>Почта: info@terminal.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Имя">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Почта">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Тема">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="textarea-form-footer">
                                            <textarea name="" id="" class="form-control" cols="30" rows="5"
                                                      placeholder="Сообщение..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Отправить"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                showProduct: false,
                productsRec: {},
                showCategories: false,
                product: {}

            }
        },
        mounted() {
            this.getCategories();
            this.loadProduct();
            this.showCategoriesStartPage();
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
                    this.showProduct = true;
                }
            },

            loadProduct: function () {
                var href = location.href;
                var productId = href.split('category/product/')[1];

                axios({
                    method: 'get',
                    url: '/get-product-by-id/' + productId
                }).then((response) => {
                    this.product = response.data;

                });
            }

        }

    }
</script>
