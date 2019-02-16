<template>
    <div>

        <div id="preloader">
            <div class="preloader-area">
                <div class="preloader-box">
                    <div class="preloader"></div>
                </div>
            </div>
        </div>


        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>К</b>омпания</a>
                        <a class="navbar-brand" href="#"><b>Т</b>ерминал</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Главная</a></li>
                            <li><a href="/rent">Аренда</a></li>
                            <li><a href="/about">О нас</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                            <li><a href="/fz-54">ФЗ-54</a></li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                            <li><a href="/cart"><span> Корзина - {{cart.total}}₽&nbsp;</span> <span class="shoping-cart">{{cart.count_all}}</span></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
            <transition name="cartMessage">
                <div v-if="showCartMessage === true" id='error_box' style='z-index: 999999999999;display: block; border: 1px solid #2F2C65 !important; background: #2F2C65 !important; position: fixed; width: 370px; right: 20px; top: 20px; -webkit-box-shadow: 0px 6px 5px 1px rgba(0, 0, 0, 0.2); box-shadow: 0px 6px 5px 1px rgba(0, 0, 0, 0.2); -webkit-border-radius: 5px; border-radius: 5px; text-align: center;'>
                    <p id='error_message' style='color: white; margin-top: 10px; font-weight: bold;filter: dropshadow(color=#FFFFFF, offx=1, offy=1);'>
                        {{cartMessage}}
                    </p>
                </div>
            </transition>
        </header>

        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated">
                            <div class="form-group">
                                <input type="email" class="form-control subscribe" id="email" placeholder="Search...">
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->

        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>АРЕНДА</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-menu">
                            <ul class="button-group sort-button-group">
                                <li @click="showAllCategories()" data-category="all">ВСЕ
                                    <transition name="countall">
                                        <span class="span-count-products-all" v-if="count_all" >{{categories.product_count_all}}</span>
                                    </transition>
                                </li>

                                <li v-for="category in categories.categories" @click="showCategory(category.id)" >{{category.name}}
                                    <transition name="count">
                                        <span  class="span-count-products" v-if="category.show === true" :key="category.id">{{category.products_count}}</span>
                                    </transition>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row featured isotope">
                    <transition-group name="fade1" tag="div">
                        <div v-for="product in products" v-if="showProductsUpdate === true" :key="product.id" class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                            <div class="product-item">
                                <div class="img-product">
                                    <img :src="product.img" class="img-responsive" width="255" height="322" alt="">
                                </div>
                                <div class="product-hover">
                                    <div class="product-meta">
                                        <a class="add_cart" @click="addCart(product.id)"><i class="pe-7s-cart"></i>Добавить в корзину</a>
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
        </section>

        <section class="service-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated" data-wow-delay="0.1s">
                        <div class="service-item">
                            <i class="pe-7s-settings"></i>
                            <h3>КАЧЕСТВА КОМПАНИИ</h3>
                            <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated" data-wow-delay="0.2s">
                        <div class="service-item">
                            <i class="pe-7s-safe"></i>
                            <h3>КАЧЕСТВА КОМПАНИИ</h3>
                            <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated" data-wow-delay="0.3s">
                        <div class="service-item">
                            <i class="pe-7s-global"></i>
                            <h3>КАЧЕСТВА КОМПАНИИ</h3>
                            <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow fadeInRight animated" data-wow-delay="0.4s">
                        <div class="service-item">
                            <i class="pe-7s-headphones"></i>
                            <h3>КАЧЕСТВА КОМПАНИИ</h3>
                            <p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.</p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
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
                                            <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Сообщение..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Отправить" />
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
            return{
                categories: {},
                products: {},
                showProductsUpdate: false,
                styleSpanCountProducts: {},
                count_all: true,
                cart: {},
                cartMessage: {},
                showCartMessage: false,
                productsRec: {}
            }
        },
        mounted() {
            this.getCategories();
            this.getProducts();
            this.getCartInfo();
            this.getProductsRec();
            this.getProductsRec();setTimeout(() => {
                this.showProductsUpdate = true;
            }, 1000);
        },
        methods:{
            getCategories: function () {
                axios({
                    method: 'get',
                    url: '/get_categories',
                }).then((response) => {
                    this.categories = response.data;

                });
            },
            showCategory: function ($categoryId) {
                this.showProductsUpdate = false;
                this.count_all = false;
                this.styleSpanCountProducts = {
                    top: '-23px',
                    right: '-6px'
                };
                axios({
                    method: 'get',
                    url: '/products/'+$categoryId,
                }).then((response) => {
                    this.products = response.data.products;
                    this.categories = response.data.categories;

                });
                setTimeout(() => {
                    this.showProductsUpdate = true;
                }, 500)

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
                    for(var i = 0;i<response.data.length;i++){
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
                    url: '/cart_add/'+id,
                }).then((response) => {
                    this.cart = response.data;
                    this.addCartAnimation(response.data.message);
                });

            },
            addCartAnimation: function (message) {
                this.showCartMessage = false;
                this.cartMessage = message;
                setTimeout(() => {
                    this.showCartMessage = true;
                }, 300);
                setTimeout(() => {
                    this.showCartMessage = false;
                }, 3000)
            },
            getCartInfo: function(){
                axios({
                    method: 'get',
                    url: '/cart_info',
                }).then((response) => {
                    this.cart = response.data;
                });
            },
            getProductsRec: function () {
                axios({
                    method: 'get',
                    url: '/get_recomended',
                }).then((response) => {
                    this.productsRec = response.data;
                    console.log
                });
            }

        }

    }
</script>
