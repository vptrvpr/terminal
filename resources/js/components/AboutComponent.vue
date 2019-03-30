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


        <section class="featured-section" style="    background: whitesmoke;">

            <div class="container">
                <transition name="showDiv2">
                    <div class="infomation_about" v-if="showDiv2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="titie-section wow fadeInDown animated ">
                                    <h1>О НАС</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Компания «Терминал»<br>

                                    Предоставляет услуги в сфере обслуживание эквайрингового и
                                    кассового оборудования и продажи периферийных частей к нему.</h1>

                                <h2 class="text-center">Мы успешно развивающаяся компания на рынке предоставляемых
                                    услуг, у нас
                                    обслуживаются более 50 предприятий, ведущие свой бизнес на всей территории
                                    ХМАО-Югры,
                                    поэтому в качестве своих клиентов мы хотели бы видеть и вашу развивающуюся
                                    компанию.</h2>
                                <h2 class="text-center">На сегодняшний день 80% Ваших клиентов, покупателей пользуются
                                    безналичным
                                    расчетам, проводя свои платежи через различное кассовое оборудование, которое, к
                                    сожалению,
                                    иногда выходит из строя в самый не подходящий момент, из-за чего вы несёте
                                    финансовые
                                    потери. Обратившись в техническую поддержку банков, компаний, предоставивших Вам
                                    оборудование в пользование, большинство клиентов сталкиваются с проблемой устранения
                                    неполадок в кратчайшие сроки, что опять за собой влечет потери прибыли. </h2><br>
                                <h1 class="text-center">Наши услуги:</h1>
                                <ul>
                                    <li>Доставка чековой ленты в любую точку г. Сургута и Сургутского
                                        района;
                                    </li>
                                    &nbsp;&nbsp;<li class="">Доставка бесплатная;</li>
                                    &nbsp;&nbsp;<li class="">У нас самые низкие цены и гибкая ценовая политика по
                                    отношению к
                                    оптовым покупателям.
                                </li>
                                    <br>
                                    <li class="">Предоставление услуг в обслуживание программ 1С (продажи,
                                        бухгалтерия, склад), Далион, Фронтол;
                                    </li>
                                </ul>
                                <br>
                                <h1>Продажа, аренда, а также аренда с последующим выкупом онлайн-касс;
                                    Обслуживание касс ЭВОТОРЫ</h1>
                                <ul>
                                    <li>Регистрация кассы в ФНС РФ;</li>
                                </ul>


                            </div>
                        </div>
                    </div>
                </transition>
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
                products: {},
                showProductsUpdate: false,
                styleSpanCountProducts: {},
                count_all: true,
                cart: {},
                cartMessage: {},
                showCartMessage: false,
                productsRec: {},
                showDiv2: false
            }
        },
        mounted() {
            this.getCategories();
            this.getProducts();
            this.getCartInfo();
            this.getProductsRec();
            setTimeout(() => {
                this.showProductsUpdate = true;
                this.showDiv2 = true
            }, 900);


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
            showCategory: function ($categoryId) {
                this.showProductsUpdate = false;
                this.count_all = false;
                this.styleSpanCountProducts = {
                    top: '-23px',
                    right: '-6px'
                };
                axios({
                    method: 'get',
                    url: '/products/' + $categoryId,
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
            getCartInfo: function () {
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
