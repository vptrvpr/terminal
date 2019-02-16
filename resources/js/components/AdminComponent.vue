<template>
    <div class="container">
        <a class="btn btn-info" @click="showProductsFunc">Продукты</a>
        <a class="btn btn-info" @click="showCategoriesFunc">Категории</a>
        <div v-if="showCategories === true" class="container categories-table">
            <h1 class="text-center">Категории</h1>
        </div>
        <div v-if="showProducts === true" class="container categories-table">
            <h1 class="text-center">Продукты</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Функции</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product in products">
                    <th scope="row">{{product.id}}</th>
                    <td>{{product.name}}</td>
                    <td>{{product.price}} рублей</td>
                    <td>
                        <a class="btn btn-success" data-toggle="modal" :data-target="'.bd-example-modal-lg'+product.id">Изменить</a>
                        <a class="btn btn-danger" @click="deleteProduct(product.id)">Удалить</a>
                    </td>

                    <div :class="'modal fade bd-example-modal-lg'+product.id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">
                                <h1 class="text-center">{{product.name}}</h1><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="d-flex justify-content-center">
                                            <img class="img-responsive" :src="product.img" style="border: 1px solid purple;margin-left: 35%;" width="255" height="322" alt="">
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-form-label">Название</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" v-model="product.name" type="text" placeholder="Название">
                                            </div>
                                                <label class="col-sm-2 col-form-label">Цена в рублях</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" v-model="product.price" type="text" placeholder="Цена">
                                            </div>
                                                <label class="col-sm-2 col-form-label">Описание</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" v-model="product.description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            </div>
                                            <h4>Характеристики</h4>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Характеристика</th>
                                                    <th scope="col">Параметр</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <td scope="col">вфывф</td>
                                                <td scope="col">12</td>
                                                </tbody>
                                            </table>
                                            <a class="btn btn-success d-flex justify-content-end">Сохранить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
          return{
              showCategories: false,
              showProducts: true,
              products: {},
              cart: {}

          }
        },
        mounted() {
            console.log('Component mounted.');
            this.getProducts();
        },
        methods: {
            showProductsFunc: function () {
                this.showCategories = false;
                this.showProducts = true;
            },
            showCategoriesFunc: function () {
                this.showCategories = true;
                this.showProducts = false;
            },
            getProducts: function () {
                axios({
                    method: 'get',
                    url: '/get_products',
                }).then((response) => {
                    this.products = response.data;
                    console.log(this.products);

                });
            },
            deleteProduct: function (id) {
                axios({
                    method: 'get',
                    url: '/delete_product/'+id,
                }).then((response) => {
                    this.getProducts();
                });
            },
            addCart: function (id) {
                axios({
                    method: 'get',
                    url: '/cart_add/'+id,
                }).then((response) => {
                    this.cart = response.data;
                });

            }
        }

    }
</script>
