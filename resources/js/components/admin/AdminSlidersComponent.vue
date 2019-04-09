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
            <h1 class="text-center">Сладер</h1>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Текст</th>
                            <th scope="col">Коммент(только для админа)</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Функции</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(slider,index) in sliders">
                            <th scope="row">{{slider.id}}</th>
                            <td>
                                {{slider.id !== 0 ? slider.title : ''}}
                                <input class="form-control" v-if="slider.id === 0" type="text"
                                       v-model="slider.title">

                            </td>
                            <td>
                                {{slider.id !== 0 ? slider.comment : ''}}
                                <input class="form-control" v-if="slider.id === 0" type="text"
                                       v-model="slider.comment">
                            </td>
                            <td>
                                {{slider.id !== 0 ? slider.image : ''}}
                                <div class="file-upload" v-if="slider.id === 0">
                                    <label>
                                        <input type="file" id="fileNewSlider" ref="myFileSlider"
                                               @change="loadImage(index)">
                                        <span>ВЫБЕРИТЕ ФОТО</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a v-if="slider.id !== 0" class="btn btn-danger"
                                   @click="deleteSlider(slider.id)">Удалить</a>
                                <a v-if="slider.id === 0" class="btn btn-success"
                                   @click="saveNewSlider()">Сохранить</a>
                            </td>
                        </tr>
                        </tbody>
                        <button class="btn btn-success" @click="addNewSlotSlider">Новый слайдер</button>
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
                sliders: [],
            }
        },


        mounted() {
            this.getSliders();
        },


        methods: {
            addNewSlotSlider: function () {
                this.sliders.push({id: 0, title: '', comment: '', image: ''});
            },


            saveNewSlider: function () {
                axios({
                    method: 'post',
                    url: '/sliders/save',
                    data: {sliders: this.sliders},
                }).then((response) => {
                    this.getSliders();
                });
            },


            getSliders: function () {
                axios({
                    method: 'get',
                    url: '/sliders/get',
                }).then((response) => {
                    this.sliders = response.data;

                });
            },


            deleteSlider: function (id) {
                axios({
                    method: 'post',
                    url: '/sliders/delete',
                    data: {slider_id: id}
                }).then((response) => {
                    this.getSliders();
                });
            },


            /**
             * Сохранение картинки
             */
            loadImage: function (index) {
                let app = this;
                let data = new FormData();
                data.append('file', document.getElementById('fileNewSlider').files[0]);
                data.append('path', 'images/sliders/');
                axios.post('/helper/load-image-universal', data).then(function (response) {
                    app.sliders[index].image = response.data;
                });
            },
        }

    }
</script>
