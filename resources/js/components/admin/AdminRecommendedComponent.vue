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
            <h1 class="text-center">Рекуомендуемые</h1>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">id продукта</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(recommended,index) in recommendeds">
                            <th scope="row">{{recommended.id}}</th>
                            <td>
                                {{recommended.id !== 0 ? recommended.product_id : ''}}
                                <input class="form-control" v-if="recommended.id === 0" type="text"
                                       v-model="recommended.product_id">

                            </td>
                            <td>
                                <a v-if="recommended.id !== 0" class="btn btn-danger"
                                   @click="deleteRecommended(recommended.id)">Удалить</a>
                                <a v-if="recommended.id === 0" class="btn btn-success"
                                   @click="saveNewRecommended()">Сохранить</a>
                            </td>
                        </tr>
                        </tbody>
                        <button class="btn btn-success" @click="addNewSlotRecommended">Новый рекомендуемый товар</button>
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
                recommendeds: [],
            }
        },


        mounted() {
            this.getRecommended();
        },


        methods: {
            addNewSlotRecommended: function () {
                this.recommendeds.push({id: 0, product_id: ''});
            },


            saveNewRecommended: function () {
                axios({
                    method: 'post',
                    url: '/recommended/save',
                    data: {recommended: this.recommendeds},
                }).then((response) => {
                    this.getRecommended();
                });
            },


            getRecommended: function () {
                axios({
                    method: 'get',
                    url: '/recommended/get',
                }).then((response) => {
                    this.recommendeds = response.data;

                });
            },


            deleteRecommended: function (id) {
                axios({
                    method: 'post',
                    url: '/recommended/delete',
                    data: {recommended_id: id}
                }).then((response) => {
                    this.getRecommended();
                });
            },
        }

    }
</script>
