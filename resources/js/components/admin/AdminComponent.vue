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
            <h1 class="text-center">Категории</h1>
            <div v-if="isCategoriesSaveChanges" class="alert alert-success text-center"
                 role="alert">
                Изменения успешно сохраненны!
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Подкатегория</th>
                            <th scope="col">Род. категория</th>
                            <th scope="col">Функции</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category,index) in categories.categories">
                            <th scope="row">{{category.id}}</th>
                            <td>
                                <input class="form-control" type="text"
                                       v-model="category.name">
                            </td>
                            <td>
                                <textarea class="form-control" type="text"
                                          v-model="category.description"></textarea>
                            </td>
                            <td>
                                {{category.img}}
                                <br>
                                <div class="file-upload">
                                    <label>
                                        <input type="file" :id="'file_edit_category'+category.id"
                                               ref="myFilesProduct"
                                               @change="productEditImageLoad(category.id,index)">
                                        <span>ВЫБЕРИТЕ ФОТО</span>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-check-input big-checkbox" type="checkbox"
                                       v-model="category.under_categories">
                            </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" v-model="category.parent_category_id">
                                        <option v-for="categoryForSelectFirstOption in categories.categories"
                                                v-if="categoryForSelectFirstOption.id === category.parent_category_id"
                                                :value="categoryForSelectFirstOption.id">
                                            {{categoryForSelectFirstOption.name}}
                                        </option>
                                        <option v-for="categoryForSelect in categories.categories"
                                                v-if="categoryForSelect.id !== category.parent_category_id"
                                                :value="categoryForSelect.id">
                                            {{categoryForSelect.name}}
                                        </option>
                                    </select>
                                </div>
                            </td>
                            <td class="d-inline">
                                <a v-if="category.isNew === undefined" class="btn btn-danger d-inline"
                                   @click="deleteCategory(category.id)"><i class="far fa-trash-alt"></i></a>
                                <a v-if="category.isNew === undefined" class="btn btn-success d-inline"
                                   @click="saveChangesCategories(index)"><i class="far fa-save"></i></a>
                                <a v-if="category.isNew !== undefined" class="btn btn-success d-inline"
                                   @click="saveNewCategories()"><i class="far fa-save"></i></a>
                            </td>
                        </tr>
                        </tbody>
                        <button class="btn btn-success" @click="addNewSlotCategory">Новая категория</button>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                products: {},
                categories: [],
                urlSite: '',
                isCategoriesSaveChanges: false


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
                    url: '/admin/get_categories/',
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

            productEditImageLoad: function ( id, index ) {
                let app = this;
                let data = new FormData();
                data.append( 'file', document.getElementById( 'file_edit_category' + id ).files[ 0 ] );
                data.append( 'category_id', id );
                axios.post( '/helper/load_image', data ).then( function ( response ) {
                    app.categories.categories[ index ].img = response.data.filename;
                } );

            },


            addNewSlotCategory: function () {
                this.categories.categories.push( {
                    id: '',
                    name: '',
                    img: '',
                    under_categories: false,
                    parent_category_id: null,
                    isNew: 1
                } );
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


            saveChangesCategories: function ( index ) {
                console.log( this.categories.categories[ index ].img );
                axios( {
                    method: 'post',
                    url: '/categories/save_changes',
                    data: { category_edit: this.categories.categories[ index ] }
                } ).then( ( response ) => {
                    this.getCategories();
                    this.isCategoriesSaveChanges = true;
                } );
                var self = this;
                setTimeout( function () {
                    self.isCategoriesSaveChanges = false;
                }, 1500 );
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
