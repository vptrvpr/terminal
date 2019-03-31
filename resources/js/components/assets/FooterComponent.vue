<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>СВЯЗАТЬСЯ</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeInLeft animated">
                <div class="left-content">
                    <h1><b>К</b>омпаниия <b>Т</b>ерминал</h1>
                    <p>Компания «ТЕРМИНАЛ»Предоставляет услуги в сфере полной автоматизации торговли, продажи и
                        обслуживания торгового оборудования «под ключ» в г. Сургут и в Сургутском районе</p>
                    <div class="contact-info">
                        <p>Адрес: 628414, г. Сургут, ул. Крылова, 38, кв.97</p>
                        <p>Телефон: 8 (3462) 62-64-64, 65-64-44</p>
                        <p>Почта: Saha2005@mail.ru</p>
                    </div>
                    <div class="social-media">
                        <ul>
                            <li><a href="https://vk.com/evotorsurgut" target="_blank"><i class="fab fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight animated">
                <form class="contact-form">
                    <transition name="out-left-notif" mode="out-in">
                        <div v-if="!successSend" key="adasd">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" v-model="contacts.name" id="name"
                                               placeholder="Имя">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" v-model="contacts.email" id="name"
                                               placeholder="Почта">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" v-model="contacts.number" id="name"
                                               placeholder="Номер телефона">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="textarea-form-footer">
                                            <textarea name="" id="" class="form-control" cols="30" rows="5"
                                                      v-model="contacts.message"
                                                      placeholder="Сообщение..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-white" role="alert" v-else key="adasdaa"
                             style="margin-top: 20px;">
                            <h3 class="notify-success-text-alert">Спасибо,
                                ваша заявка принята!</h3>
                            <h4 class="notify-success-text-alert">Мы свяжемся с вами в ближайшее время.</h4>
                        </div>
                    </transition>
                    <div class="row">
                        <div class="col-md-12">
                            <transition name="out-left-notif">
                                <div class="alert alert-white" role="alert" v-if="errorSend"
                                     style="margin-top: 20px;">
                                    <p>Заполните все поля!</p>
                                </div>
                            </transition>
                            <div class="input-group">
                                <input type="button" class="contact-submit" @click="sendSlackNotification"
                                       v-if="!successSend" value="Отправить"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                recommended: [],
                contacts: {
                    name: '',
                    email: '',
                    number: '',
                    message: ''
                },
                successSend: false,
                errorSend: false

            }

        },

        mounted() {
        },

        methods: {
            sendSlackNotification: function () {
                if ( this.contacts.name === '' || this.contacts.email === '' || this.contacts.number === '' || this.contacts.message === '' ) {
                    this.errorSend = true;
                } else {
                    axios( {
                        method: 'post',
                        url: '/slack/contact_send',
                        data: { contact: this.contacts }
                    } ).then( ( response ) => {
                        this.successSend = true;
                        this.errorSend = false;
                    } );
                }

            },
        }
    }
</script>

<style scoped>

</style>
