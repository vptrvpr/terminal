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
            <h1 class="text-center">Партнеры</h1>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название</th>
                            <th scope="col">Ссылка</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Функции</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(partner,index) in partners">
                            <th scope="row">{{partner.id}}</th>
                            <td>
                                {{partner.id !== 0 ? partner.name : ''}}
                                <input class="form-control" v-if="partner.id === 0" type="text"
                                       v-model="partner.name">

                            </td>
                            <td>
                                {{partner.id !== 0 ? partner.link : ''}}
                                <input class="form-control" v-if="partner.id === 0" type="text"
                                       v-model="partner.link">
                            </td>
                            <td>
                                {{partner.id !== 0 ? partner.image : ''}}
                                <div class="file-upload" v-if="partner.id === 0">
                                    <label>
                                        <input type="file" id="fileNewPartner" ref="myFilePartner"
                                               @change="loadImage(index)">
                                        <span>ВЫБЕРИТЕ ФОТО</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a v-if="partner.id !== 0" class="btn btn-danger"
                                   @click="deletePartner(partner.id)">Удалить</a>
                                <a v-if="partner.id === 0" class="btn btn-success"
                                   @click="saveNewPartner()">Сохранить</a>
                            </td>
                        </tr>
                        </tbody>
                        <button class="btn btn-success" @click="addNewSlotPartner">Новый партнер</button>
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
                partners: [],
            }
        },


        mounted() {
            this.getPartners();
        },


        methods: {
            addNewSlotPartner: function () {
                this.partners.push({id: 0, name: '', link: '', image: ''});
            },


            saveNewPartner: function () {
                axios({
                    method: 'post',
                    url: '/partners/save',
                    data: {partners: this.partners},
                }).then((response) => {
                    this.getPartners();
                });
            },


            getPartners: function () {
                axios({
                    method: 'get',
                    url: '/partners/get',
                }).then((response) => {
                    this.partners = response.data;

                });
            },


            deletePartner: function (id) {
                axios({
                    method: 'post',
                    url: '/partners/delete',
                    data: {partner_id: id}
                }).then((response) => {
                    this.getPartners();
                });
            },


            /**
             * Сохранение картинки
             */
            loadImage: function (index) {
                let app = this;
                let data = new FormData();
                data.append('file', document.getElementById('fileNewPartner').files[0]);
                data.append('path', 'images/partners/');
                axios.post('/helper/load-image-universal', data).then(function (response) {
                    app.partners[index].image = response.data;
                });
            },
        }

    }
</script>
