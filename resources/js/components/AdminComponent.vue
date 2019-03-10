<template>
    <div class="">
        <div class="sidebar">
            <a class="active" href="#home">Компания Терминал </a>
            <a href="#news"><i class="fas fa-puzzle-piece"></i> Категории</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
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
                            <th scope="col">Картинка</th>
                            <th scope="col">Функции</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="category in categories.categories">
                            <th scope="row">{{category.id}}</th>
                            <td>
                                {{category.isNew === undefined ? category.name : ''}}
                                <input class="form-control" v-if="category.isNew !== undefined" type="text" v-model="category.name">

                            </td>
                            <td>
                                {{category.isNew === undefined ? category.img : ''}}
                                <input class="form-control" v-if="category.isNew !== undefined" type="text" v-model="category.img">
                            </td>
                            <td>
                                <a v-if="category.isNew === undefined" class="btn btn-danger" @click="deleteCategory(category.id)">Удалить</a>
                                <a v-if="category.isNew !== undefined" class="btn btn-success" @click="saveNewCategories()">Сохранить</a>
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


            }
        },
        mounted() {
            this.getProducts();
            this.getCategories();
        },
        methods: {
            getCategories: function(){
                axios({
                    method: 'get',
                    url: '/get_categories',
                }).then((response) => {
                    this.categories = response.data;
                });
            },

            deleteCategory: function(categoryId){
                axios({
                    method: 'get',
                    url: '/delete_categories/'+categoryId,
                }).then((response) => {
                    this.categories = response.data;
                });
            },


            addNewSlotCategory: function(){
                this.categories.categories.push({id: '',name: '',img: '',isNew: 1});
            },


            saveNewCategories: function(){
                axios({
                    method: 'post',
                    url: '/save_categories',
                    data: { categories: this.categories.categories }
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

            }
        }

    }
</script>
