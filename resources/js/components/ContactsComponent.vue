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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>Контакты</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <transition name="showDiv1">
                        <div class="col-md-12" v-if="showDiv1">
                            <div class="company_address" style="font-size: 15px">
                                <h1>Информация о компании :</h1>
                                <h2 class="mt-1">628414, г. Сургут, ул.
                                    Крылова, 38, кв.97 </h2>

                                <h2>График работы: с 9.00 до 18.00 без выходных <br><br>Тел: 8 (3462) 62-64-64, 65-64-44
                                </h2>

                                <h2>E-mail: <a style="color: #2F2C65"
                                               href="mailto:info@nwc-em.ru">Saha2005@mail.ru</a></h2>
                            </div>

                        </div>
                    </transition>
                </div>
            </div>
        </section>

        <section class="service-section-1">
            <div class="container">
                <div class="row">
                    <transition name="showDiv2">
                        <div class="col-md-12" v-if="showDiv2">
                            <h2><b>Полное официальное
                                наименование предприятия
                                (для печатн. форм. докум.):</b> Индивидуальный
                                предприниматель Коломиец
                                Александр Васильевич</h2>

                            <h2><b>Сокращенное наименование
                                предприятия:</b> ИП Коломиец А.В.
                                Терминал</h2>
                            <h2><b>Директор:</b> Коломиец Александр Васильевич</h2>
                            <h2><b>Юридический адрес:</b> 198095, г. Санкт-Петербург, Михайловский переулок, Дом 4А,
                                Литер Б, помещение 5</h2>
                            <h2><b>ИНН:</b> 860236954880</h2>
                            <h2><b>ОГРН:</b> 318861700081536</h2>
                            <h2><b>Юридический адрес:</b> 628414, г. Сургут, ул.
                                Крылова, 38, кв.97</h2>
                            <h2><b>Телефон (факс):</b> 8 (922)76-30-737</h2>
                            <h2><b>Номер расчетного счета:</b> 40802810067170012856</h2>
                            <h2><b>Наименование учреждения
                                банка:</b> ПАО «Сбербанк»</h2>
                            <h2><b>Местонахождение
                                учреждения банка:</b> 628400, г. Сургут
                                ул. Дзержинского д.5</h2>
                            <h2><b>Корреспондентский счет
                                банка:</b> 30101810800000000651</h2>
                            <h2><b>БИК:</b> 047102651</h2>
                            <h2><b>e-mail:</b> Saha2005@mail.ru</h2>


                        </div>
                    </transition>
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
                products: {},
                showProductsUpdate: false,
                styleSpanCountProducts: {},
                count_all: true,
                cart: {},
                cartMessage: {},
                showCartMessage: false,
                productsRec: {},
                showDiv1: false,
                showDiv2: false,
            }
        },
        mounted() {
            this.getCategories();
            this.getProducts();
            this.getCartInfo();
            this.getProductsRec();
            setTimeout(() => {
                this.showProductsUpdate = true;
                this.showDiv1 = true;
                this.showDiv2 = true;
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
