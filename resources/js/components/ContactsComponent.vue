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
                    <div>
                        <div class="col-md-7 left-animate">

                            <div class="company_address" style="font-size: 15px">
                                <h1>Информация о компании:</h1>
                                <h2 class="mt-1">628414, Ханты-Мансийский автономный округ-Югра,<br> г.Сургут, ул.
                                    Крылова д.38
                                </h2>

                                <h2>График работы: с 9.00 до 18.00 без выходных <br><br>Тел: 8(3462) 65-64-64, 65-64-44
                                </h2>

                                <h2>E-mail: <a style="color: #2F2C65"
                                               href="mailto:info@nwc-em.ru">Saha2005@mail.ru</a></h2>
                            </div>
                            <a class="contact-product-button" style="margin-top: 20px"
                               href="dowloads-for-users/enterprise_map.doc" download>Скачать карточку
                                предприятия</a><br>
                            <a class="contact-product-button" style="margin-top: 20px"
                               href="images/vizitka1.jpg" download>Визитка</a>

                        </div>
                        <div class="col-md-5 right-animate">
                            <img src="/images/logo_kryg.png" alt="альтернативный текст" width="397px">
                        </div>
                        <div class="col-md-12 map-yandex top-animate" style="margin-top:30px">
                            <iframe
                                src="https://yandex.ru/map-widget/v1/?um=constructor%3A97f9f0ed92ae4af9a47054ca782f1415e9585394bc0f399bb839b08f3062dfa2&amp;source=constructor"
                                width="500" height="240" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 top-animate">
                            <h2><b>Полное официальное
                                наименование предприятия
                                (для печатн. форм. докум.):</b> Индивидуальный
                                предприниматель Коломиец
                                Александр Васильевич</h2>

                            <h2><b>Сокращенное наименование
                                предприятия:</b> ИП Коломиец А.В.
                                Терминал</h2>
                            <h2><b>Директор:</b> Коломиец Александр Васильевич</h2>
                            <h2><b>ИНН:</b> 860236954880</h2>
                            <h2><b>ОГРН:</b> 318861700081536</h2>
                            <h2><b>Юридический адрес:</b> 628414, г. Сургут, ул.
                                Крылова, 38</h2>
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
            setTimeout( () => {
                this.showProductsUpdate = true;
                this.showDiv1 = true;
                this.showDiv2 = true;
            }, 900 );


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
            showCategory: function ( $categoryId ) {
                this.showProductsUpdate = false;
                this.count_all = false;
                this.styleSpanCountProducts = {
                    top: '-23px',
                    right: '-6px'
                };
                axios( {
                    method: 'get',
                    url: '/products/' + $categoryId,
                } ).then( ( response ) => {
                    this.products = response.data.products;
                    this.categories = response.data.categories;

                } );
                setTimeout( () => {
                    this.showProductsUpdate = true;
                }, 500 )

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
            addCart: function ( id ) {
                this.addCartAnimation();
                axios( {
                    method: 'get',
                    url: '/cart_add/' + id,
                } ).then( ( response ) => {
                    this.cart = response.data;
                    this.addCartAnimation( response.data.message );
                } );

            },
            addCartAnimation: function ( message ) {
                this.showCartMessage = false;
                this.cartMessage = message;
                setTimeout( () => {
                    this.showCartMessage = true;
                }, 300 );
                setTimeout( () => {
                    this.showCartMessage = false;
                }, 3000 )
            },
            getCartInfo: function () {
                axios( {
                    method: 'get',
                    url: '/cart_info',
                } ).then( ( response ) => {
                    this.cart = response.data;
                } );
            },
            getProductsRec: function () {
                axios( {
                    method: 'get',
                    url: '/get_recomended',
                } ).then( ( response ) => {
                    this.productsRec = response.data;
                    console.log
                } );
            }

        }

    }
</script>
