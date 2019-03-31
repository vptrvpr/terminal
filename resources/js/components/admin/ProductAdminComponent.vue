<template>
    <div class="">
        <div class="sidebar">
            <a class="active" href="#home">Компания Терминал </a>
            <a href="/admin"><i class="fas fa-puzzle-piece"></i> Категории</a>
            <a href="/admin/products">Продукты</a>
            <a href="/admin/partners">Партнеры</a>
            <a href="/admin/slider">Слайдер</a>
            <a href="/admin/recommended">Рекомендуемые</a>
            <a href="/admin/dashboard">Dashboard</a>
        </div>

        <div class="content">
            <h1 class="text-center">Продукты</h1>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Функции</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in products">
                            <th scope="row">{{product.id}}</th>
                            <td>
                                {{product.isNew === undefined ? product.name : ''}}
                                <input class="form-control" v-if="product.isNew !== undefined" type="text"
                                       v-model="product.name">

                            </td>
                            <td>
                                {{product.isNew === undefined ? product.img : ''}}
                                <input class="form-control" v-if="product.isNew !== undefined" type="text"
                                       v-model="product.img">
                            </td>
                            <td>
                                <a v-if="product.isNew === undefined" class="btn btn-danger"
                                   @click="deleteProduct(product.id)">Удалить</a>
                                <a v-if="product.isNew === undefined" class="btn btn-success" data-toggle="modal"
                                   :data-target="'.modal-product-edit'+product.id">Изменить</a>
                                <a v-if="product.isNew !== undefined" class="btn btn-success"
                                   @click="saveNewCategories()">Сохранить</a>
                            </td>

                            <div :class="'modal fade bd-example-modal-lg modal-product-edit'+product.id" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Редактирование товара</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="usr">Name:</label>
                                                        <input type="text" v-model="product.name" class="form-control"
                                                               id="usr">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="usr">Price:</label>
                                                        <input type="text" v-model="product.price" class="form-control"
                                                               id="usr">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>Категория</h6>
                                                        <select class="form-control" v-model="product.category.id">
                                                            <option>{{product.category.name}}</option>
                                                            <template v-for="category in categories.categories">
                                                                <option v-if="category.name !== product.category.name"
                                                                        :value="category.id">
                                                                    {{category.name}}
                                                                </option>
                                                                <option class="under-category-option"
                                                                        v-for="under_category in category.under_categories"
                                                                        v-if="under_category.name !== newProduct.category"
                                                                        :value="under_category.id">
                                                                    &nbsp;&nbsp;&nbsp;--{{under_category.name}}
                                                                </option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <img :src="'/images/products/'+product.img" class="border-img"
                                                         width="322px">
                                                    <div class="file-upload">
                                                        <label>
                                                            <input type="file" id="file" ref="myFiles"
                                                                   @change="productEditImageLoad(product.id)">
                                                            <span>ВЫБЕРИТЕ ФОТО</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="comment">Описание:</label>
                                                        <editor v-model="product.description"
                                                                api-key="f5b040i73ebkt63xkw5q3t2eycahtfyij48m616q4ezjyg4v"
                                                                :init="{selector: 'textarea'}"></editor>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <h1>Характеристики:</h1>
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Характеристика</th>
                                                        <th scope="col">First</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="specification in product.specifications_get">
                                                        <td><input type="text" class="form-control"
                                                                   v-model="specification.name"></td>
                                                        <td><input type="text" class="form-control"
                                                                   v-model="specification.parameter"></td>
                                                    </tr>
                                                    <button class="btn btn-success ml-2"
                                                            @click="addNewSpecification(index)">Add new specification
                                                    </button>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <div v-if="saveChangesSuccess" class="alert alert-success" role="alert">
                                                Изменения успешно сохраненны!
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary"
                                                    @click="saveChangesProduct(index)">Save changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        </tbody>
                        <button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg-1">Новый
                            продукт
                        </button>


                        <div class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="modal-title" id="myModalLabel">Новый товар</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="usr">Name:</label>
                                                    <input type="text" v-model="newProduct.name" class="form-control"
                                                           id="usr">
                                                </div>
                                                <div class="form-group">
                                                    <label for="usr">Price:</label>
                                                    <input type="text" v-model="newProduct.price" class="form-control"
                                                           id="usr">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" v-model="newProduct.category">
                                                        <option>{{newProduct.category}}</option>
                                                        <template v-for="category in categories.categories">
                                                            <option v-if="category.name !== newProduct.category">
                                                                {{category.name}}
                                                            </option>
                                                            <option class="under-category-option"
                                                                    v-for="under_category in category.under_categories"
                                                                    v-if="under_category.name !== newProduct.category"
                                                                    :value="under_category.id">
                                                                &nbsp;&nbsp;&nbsp;--{{under_category.name}}
                                                            </option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img :src="'/images/products/'+newProduct.img" class="border-img"
                                                     width="322px">
                                                <div class="file-upload">
                                                    <label>
                                                        <input type="file" id="file_new_product" ref="myFilesProduct"
                                                               @change="loadImage()">
                                                        <span>ВЫБЕРИТЕ ФОТО</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="comment">Описание:</label>
                                                    <!--<textarea class="form-control" -->
                                                    <!--rows="5" id="comment"></textarea>-->
                                                    <editor v-model="newProduct.description"
                                                            api-key="f5b040i73ebkt63xkw5q3t2eycahtfyij48m616q4ezjyg4v"
                                                            :init="{selector: 'textarea',
                                                    toolbar: 'forecolor backcolor',custom_colors: true,plugins : 'advlist autolink link image lists charmap print preview'}"></editor>
                                                </div>

                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <h1>Характеристики:</h1>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Характеристика</th>
                                                    <th scope="col">First</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="specification in newProduct.specifications_get"
                                                    v-if="specification.name !== undefined">
                                                    <td><input type="text" class="form-control"
                                                               v-model="specification.name"></td>
                                                    <td><input type="text" class="form-control"
                                                               v-model="specification.parameter"></td>
                                                </tr>
                                                <button class="btn btn-success ml-2"
                                                        @click="addNewSpecification(newProduct,1)">Add new specification
                                                </button>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div v-if="saveChangesSuccessNewProduct" class="alert alert-success"
                                             role="alert">
                                            Изменения успешно сохраненны!
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary"
                                                @click="saveNewProduct()">Save changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        // es modules

        // commonjs require
        // NOTE: default needed after require

        data: function () {
            return {
                products: {},
                categories: [],
                newProduct: {
                    name: "",
                    description: "",
                    price: 0,
                    categorie_id: "categorie_id",
                    specifications_get: [],
                    category: null,
                    new_category: "new_category",
                    specifications: [],
                    categorie: null,
                    img: ''
                },
                saveChangesSuccess: false,
                saveChangesSuccessNewProduct: false,


            }
        },

        mounted() {
            this.getProducts();
            this.getCategories();
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

            deleteCategory: function ( categoryId ) {
                axios( {
                    method: 'get',
                    url: '/delete_categories/' + categoryId,
                } ).then( ( response ) => {
                    this.categories = response.data;
                } );
            },


            addNewSlotCategory: function () {
                this.categories.categories.push( { id: '', name: '', img: '', isNew: 1 } );
            },


            saveNewCategories: function () {
                axios( {
                    method: 'post',
                    url: '/save_categories',
                    data: { categories: this.categories.categories }
                } ).then( ( response ) => {
                    this.categories = response.data;
                } );
            },


            getProducts: function () {
                axios( {
                    method: 'get',
                    url: '/get_products',
                } ).then( ( response ) => {
                    this.products = response.data;

                } );
            },


            deleteProduct: function ( id ) {
                axios( {
                    method: 'get',
                    url: '/delete_product/' + id,
                } ).then( ( response ) => {
                    this.getProducts();
                } );
            },


            addCart: function ( id ) {
                axios( {
                    method: 'get',
                    url: '/cart_add/' + id,
                } ).then( ( response ) => {
                    this.cart = response.data;
                } );

            },


            addNewSpecification: function ( index, isNew ) {
                if ( isNew !== undefined ) {
                    this.newProduct.specifications_get.push( { name: '', parameter: '', isNew: 1 } );
                } else {
                    this.products[ index ].specifications_get.push( { name: '', parameter: '', isNew: 1 } );
                }

            },


            saveChangesProduct: function ( index ) {
                axios( {
                    method: 'post',
                    url: '/product/changes_save',
                    data: { product: this.products[ index ] }
                } ).then( ( response ) => {
                    this.products = response.data;
                    this.saveChangesSuccess = true;
                } );
                var self = this;
                setTimeout( function () {
                    self.saveChangesSuccess = false;
                }, 1500 );
            },


            productEditImageLoad: function ( id ) {
                let app = this;
                let data = new FormData();
                data.append( 'file', document.getElementById( 'file' ).files[ 0 ] );
                data.append( 'id', id );
                axios.post( '/product/update_img', data ).then( function ( response ) {

                } );
            },


            loadImage: function () {
                let app = this;
                let data = new FormData();
                data.append( 'file', document.getElementById( 'file_new_product' ).files[ 0 ] );
                axios.post( '/helper/load_image', data ).then( function ( response ) {
                    app.newProduct.img = response.data;
                } );
            },


            saveNewProduct: function () {
                axios( {
                    method: 'post',
                    url: '/product/save_new_product',
                    data: { product: this.newProduct }
                } ).then( ( response ) => {
                    this.saveChangesSuccessNewProduct = true;
                    this.getProducts();
                } );
                var self = this;
                setTimeout( function () {
                    self.saveChangesSuccessNewProduct = false;
                }, 1500 );
            }
        }

    }
</script>
