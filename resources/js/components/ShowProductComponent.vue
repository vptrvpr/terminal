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
                                    <h1 class="show-product-price" v-if="product.price">Цена: {{product.price}} ₽</h1>
                                    <button class="contact-product-button" data-toggle="modal" data-target="#buy">
                                        Купить
                                    </button>


                                    <div class="modal fade" id="buy" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="margin-top: 200px">
                                            <div class="modal-content contact-product-modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-11"></div>
                                                        <div class="col-md-1">
                                                            <a class="close-modal" data-dismiss="modal">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <transition name="out-left-notif" mode="out-in">
                                                        <div class="" v-if="!norificationSended">
                                                            <div class="form-group" key="name">
                                                                <input type="text" v-model="contacts.name"
                                                                       class="form-control contact-product-input"
                                                                       id="recipient-name" placeholder="Имя"
                                                                       autocomplete="off">
                                                            </div>
                                                            <div class="form-group mt-3" key="number"
                                                            >
                                                                <input type="text" v-model="contacts.number"
                                                                       class="form-control contact-product-input"
                                                                       id="recipient-number" placeholder="Телефон"
                                                                       autocomplete="off">
                                                            </div>
                                                        </div>


                                                        <div v-if="norificationSended" key="success">
                                                            <h3 class="notify-success-text">Спасибо,
                                                                ваша заявка принята!</h3>
                                                            <h4 class="notify-success-text">Мы свяжемся с вами в
                                                                ближайшее время.</h4>
                                                        </div>
                                                    </transition>
                                                    <transition name="out-left-notif">
                                                        <div class="alert alert-white" role="alert"
                                                             v-if="validateErrors">
                                                            <p>Заполните все поля!</p>
                                                        </div>
                                                    </transition>
                                                </div>
                                                <div class="modal-footer contact-product-modal-footer">
                                                    <button type="button" class="contact-product-button"
                                                            v-if="!norificationSended"
                                                            @click="contactsSend(product.id)">Перезвонить
                                                        мне!
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                        <div class="row" style="margin-bottom: 20px">
                            <transition name="out-left">
                                <div class="col-md-8 show-product-description" v-if="showProduct"
                                     v-html="product.description">

                                </div>
                            </transition>
                            <div class="col-md-1"></div>
                            <transition name="out-right">
                                <div class="col-md-2" v-if="showProduct" style="display: flex;justify-content: center">
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
                        <div class="row">
                            <transition name="out-top">
                                <div class="col-md-12" v-if="showProduct">
                                    <h1 class="show-product-name text-center" style="font-size: 25px;">Видео</h1>
                                    <div class="center" v-html="product.video">


                                    </div>
                                </div>
                            </transition>
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
                category: {},
                showProduct: false,
                productsRec: {},
                showCategories: false,
                product: {},
                contacts:
                    { number: '', product_id: '', name: '' },
                norificationSended: false,
                urlSite: '',
                validateErrors: false


            }
        },
        mounted() {
            this.getCategories();
            this.loadProduct();
            this.showCategoriesStartPage();
            this.getUrlSite();
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
                    this.showProduct = true;
                }
            },

            loadProduct: function () {
                var href = location.href;
                var productId = href.split( 'category/product/' )[ 1 ];

                axios( {
                    method: 'get',
                    url: '/get-product-by-id/' + productId
                } ).then( ( response ) => {
                    this.product = response.data;

                } );
            },


            contactsSend: function ( productId ) {
                this.contacts.product_id = productId;
                if ( this.contacts.number === '' || this.contacts.name === '' ) {
                    this.validateErrors = true;
                } else {
                    this.validateErrors = false;
                    axios( {
                        method: 'post',
                        url: '/slack/order_send',
                        data: { contacts: this.contacts }
                    } ).then( ( response ) => {
                        this.norificationSended = true;
                    } );
                }

            },


            getUrlSite: function () {
                axios( {
                    method: 'get',
                    url: '/helper/get-url-site',
                } ).then( ( response ) => {
                    this.urlSite = response.data;
                } );
            }

        }

    }
</script>
