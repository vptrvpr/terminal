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
                            <div class="col-md-12 page-info">
                                <h1 class="text-center">Компания «Терминал»<br><br>

                                    Предоставляет услуги в сфере обслуживание эквайрингового и
                                    кассового оборудования и продажи периферийных частей к нему.</h1>
                                <br>
                                <h2>ТЕРМИНАЛ ЭТО:</h2>

                                <ol class="margin-left-30">
                                    <li class="">Индивидуальный подход к каждому нашему клиенту</li>
                                    <li class="">Гибкая ценовая политика компании вас приятно удивит</li>
                                    <li class="">Круглосуточная телефонная служба поддержки, выезд инженеров</li>
                                    <li class="">Гарантийное обслуживание в сертифицированном центре компании</li>
                                    <li class="">Полное сопровождение, обучение кассиров</li>
                                    <li class="">Предоставление документов по возврату денежных средств от покупки онлайн-кассы в ФНС России</li>
                                </ol>
                                <br>
                                <h2>Наши услуги:</h2>
                                <ul class="margin-left-30">
                                    <li>Регистрация ФН ККМ в ФНС РФ</li>
                                    <li>Открытие электронно-цифровой подписи в ФНС России</li>
                                    <li>Бесплатная доставка чековой ленты по г. Сургуту и Сургутскому району</li>
                                    <li>В наличии большой выбор ККМ «АТОЛ», «МЕРКУРИЙ»</li>
                                    <li>Программное обеспечение «Франтол», «Далион», «1С»</li>
                                    <li>Большой ассортимент периферийное оборудование</li>
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
            setTimeout( () => {
                this.showProductsUpdate = true;
                this.showDiv2 = true
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
