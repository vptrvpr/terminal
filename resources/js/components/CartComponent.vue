<template>
    <div class="div">
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

        <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="titie-section wow fadeInDown animated cart-h1">
                    <h1>КОРЗИНА</h1>
                </div>
            </div>
        </div>
        </div>
        <div class="container" style="margin-top: 20px">
            <div class="row">
                <div class="col-sm-12">
                    <transition name="cart">

                    <table class="table cart-table" v-if="showEffectsCartTable" v-cloak>
                    <thead>
                    <tr>
                        <th scope="col" class="text-center"><h4>Имя</h4></th>
                        <th scope="col" class="text-center"><h4>Кол-во</h4></th>
                        <th scope="col" class="text-center"><h4>Цена</h4></th>
                        <th scope="col" class="text-center"><h4>Удалить</h4></th>

                    </tr>
                    </thead>
                        <tbody v-for="product in cart.content">
                    <td scope="col" class="text-center"><h4>{{product.name}}</h4></td>
                    <td scope="col" class="text-center"><h4>{{product.qty}}</h4></td>
                    <td scope="col" class="text-center"><h4>{{product.price}}</h4></td>
                    <th scope="col" class="text-center"><h4><a class="delete-cart" @click="deleteProductCart(product.rowId)">&#10006;</a></h4></th>
                        </tbody>
                </table>
                    </transition>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-5">

                        </div>
                        <div class="col-sm-3">
                            <h2 style="margin-right: 20px">Цена: {{cart.total}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="padding-bottom: 20px">
                    <div class="row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-6">

                        <a class="button-def">Оформить заказ</a>
                        <a class="button-def" @click="destroyCart()">Очистить корзину</a>
                    </div>
                    </div>
                </div>

            </div>

        </div>

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
                    <div v-for="product in productsRec" class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
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
        data: function(){
          return{
              showCategories: false,
              showProducts: true,
              products: {},
              cart: {},
              productsRec: {},
              cartMessage: {},
              showCartMessage: false,
              showEffectsCartTable: false,
              showProductsInCart: false,
          }
        },
        mounted() {
            this.getCartInfo();
            this.getProductsRec();
            setTimeout(() => {
                this.showEffectsCartTable = true;
                this.showProductsInCart = true;
            }, 200)

        },
        methods: {
            getCartInfo: function(){
                axios({
                    method: 'get',
                    url: '/cart_info',
                }).then((response) => {
                    this.cart = response.data;
                });
            },
            destroyCart: function () {
                this.showEffectsCartTable = false;
                axios({
                    method: 'get',
                    url: '/cart_destroy',
                }).then((response) => {
                    this.cart = response.data;
                });
                setTimeout(() => {
                this.showEffectsCartTable = true;
                }, 300)
            },
            getProductsRec: function () {
                axios({
                    method: 'get',
                    url: '/get_recomended',
                }).then((response) => {
                    this.productsRec = response.data;
                    console.log
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
            addCart: function (id) {
                this.showEffectsCartTable = false;
                this.addCartAnimation();
                axios({
                    method: 'get',
                    url: '/cart_add/'+id,
                }).then((response) => {
                    this.cart = response.data;
                    this.addCartAnimation(response.data.message);
                });
                setTimeout(() => {
                    this.showEffectsCartTable = true;
                }, 300)

            },
            deleteProductCart: function (rowId) {
                this.showEffectsCartTable = false;
                axios({
                    method: 'get',
                    url: '/cart_delete/'+rowId,
                }).then((response) => {
                    this.getCartInfo();
                });
                setTimeout(() => {
                    this.showEffectsCartTable = true;
                }, 300)
            }

        }

    }
</script>
