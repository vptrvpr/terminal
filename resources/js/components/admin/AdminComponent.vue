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
                        <tr v-for="category in categories.categories">
                            <th scope="row">{{category.id}}</th>
                            <td>
                                {{category.isNew === undefined ? category.name : ''}}
                                <input class="form-control" v-if="category.isNew !== undefined" type="text"
                                       v-model="category.name">
                            </td>
                            <td>
                                {{category.isNew === undefined ? category.description : ''}}
                                <input class="form-control" v-if="category.isNew !== undefined" type="text"
                                       v-model="category.description">
                            </td>
                            <td>
                                {{category.isNew === undefined ? category.img : ''}}
                                <input class="form-control" v-if="category.isNew !== undefined" type="text"
                                       v-model="category.img">
                            </td>
                            <td class="text-center">
                                {{category.isNew === undefined ? category.under_categories : ''}}
                                <input class="form-check-input big-checkbox" v-if="category.isNew !== undefined" type="checkbox"
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
                            <td>
                                <a v-if="category.isNew === undefined" class="btn btn-danger"
                                   @click="deleteCategory(category.id)">Удалить</a>
                                <a v-if="category.isNew !== undefined" class="btn btn-success"
                                   @click="saveNewCategories()">Сохранить</a>
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
                urlSite: ''


            }
        },
        mounted() {
            this.getProducts();
            this.getCategories();
            console.log(2222);
        },
        methods: {
            getCategories: function () {
                axios({
                    method: 'get',
                    url: '/admin/get_categories/',
                }).then((response) => {
                    this.categories = response.data;
                });
            },

            deleteCategory: function (categoryId) {
                axios({
                    method: 'get',
                    url: '/delete_categories/' + categoryId,
                }).then((response) => {
                    this.categories = response.data;
                });
            },


            addNewSlotCategory: function () {
                this.categories.categories.push({id: '', name: '', img: '', under_categories: false,parent_category_id: null,isNew: 1});
            },


            saveNewCategories: function () {
                axios({
                    method: 'post',
                    url: '/save_categories',
                    data: {categories: this.categories.categories}
                }).then((response) => {
                    this.categories = response.data;
                });
            },


            getProducts: function () {
                axios({
                    method: 'get',
                    url: '/get_products',
                }).then((response) => {
                    this.products = response.data;

                });
            },
            deleteProduct: function (id) {
                axios({
                    method: 'get',
                    url: '/delete_product/' + id,
                }).then((response) => {
                    this.getProducts();
                });
            },
            addCart: function (id) {
                axios({
                    method: 'get',
                    url: '/cart_add/' + id,
                }).then((response) => {
                    this.cart = response.data;
                });

            },

            getUrlSite: function () {
                axios({
                    method: 'get',
                    url: '/helper/get-url-site',
                }).then((response) => {
                    this.urlSite = response.data;
                });
            }
        }

    }
</script>
