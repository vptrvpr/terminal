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


        <section class="featured-section" style="    background: whitesmoke;">

            <div class="container">
                <transition name="showDiv2">
                    <div class="infomation_about" v-if="showDiv2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="titie-section wow fadeInDown animated ">
                                    <h1>ФЗ-54</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="h1-fz text-center">Как снять с учета онлайн-кассу</h1>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="bx_689919819_3774">
                                    <p>
                                        Есть несколько вариантов снятия ККТ с учета: при обращении в налоговую или через
                                        личный кабинет на сайте ФНС. Но налоговики могут сделать это и принудительно.
                                        Разберем подробнее, <strong>как снять с учета онлайн-кассу</strong>.
                                    </p>
                                    <p>
                                    </p>
                                    <p>
                                    </p>
                                    <p>
                                        Владелец может сделать это по своей инициативе, если:
                                    </p>
                                    <ul>
                                        <li>передает ККТ другому пользователю,</li>
                                        <li>технику украли или потеряли,</li>
                                        <li>устройство сломалось.</li>
                                    </ul>
                                    <p>
                                        Нужно подать в налоговую инспекцию заявление о снятии ККТ с учета (форма по КНД
                                        1110062) не позднее одного рабочего дня после передачи или обнаружения кражи.
                                        Отнесите документ лично или отправьте по интернету. Ниже на странице — шаблон
                                        заявления и инструкция, как снять онлайн-кассу с учета через личный кабинет на
                                        сайте ФНС.
                                    </p>
                                    <h2>Заявление на снятие с учета онлайн-кассы</h2>
                                    <p>
                                        В заявлении укажите:
                                    </p>
                                    <ul>
                                        <li>название компании или ФИО предпринимателя,</li>
                                        <li>ИНН,</li>
                                        <li>модель и заводской номер ККТ,</li>
                                        <li>подробные сведения о краже или потере (если они есть).</li>
                                    </ul>
                                    <p>
                                        ФНС внесла изменения в форму бланка (приказ от 07.09.2018 № ММВ-7-20/527@). У
                                        нас вы можете скачать новый образец бланка заявления о снятии ККТ с учета.
                                    </p>
                                    <div class="alert alert-warning">
                                        Если заявление на снятие с учета онлайн-кассы подает представитель, укажите
                                        реквизиты доверенности.
                                    </div>
                                    <p>
                                        При передаче ККТ другому пользователю к заявлению надо приложить отчет о
                                        закрытии фискального накопителя. Его можно сделать через меню онлайн-кассы.
                                    </p>
                                    <p>
                                        Если ККТ сломалась или ее украли — отчет не нужен. В этом случае лучше снять с
                                        учета онлайн-кассу как можно скорее. Сделайте это через интернет: это самый
                                        простой и быстрый способ. Дополнительных документов при поломке или краже не
                                        понадобится. Как снять кассу с учета через личный кабинет — ниже на странице.
                                    </p>
                                    <p>
                                        Если техника работала без передачи данных в ОФД (например, в отдаленных
                                        регионах), надо приложить все фискальные данные, записанные в накопитель.
                                    </p>
                                    <p>
                                        Рекомендуем снимать онлайн-кассы с учета через личный кабинет — это просто и
                                        удобно. Для этого вам потребуется электронная цифровая подпись. Несколько
                                        действий — и все готово. Далее пошагово разберем снятие онлайн-кассы с учета
                                        через личный кабинет.
                                    </p>
                                    <p>
                                    </p>
                                    <p>
                                    </p>
                                    <h2>Как снять кассу с учета через личный кабинет</h2>
                                    <p>
                                        Для начала войдите в личный кабинет на сайте налоговой и откройте раздел «Учет
                                        ККТ».
                                    </p>
                                    <p>
                                        <img width="450" src="/upload/docs/snyatie KKT-1.jpg"
                                             style=" border: 1px solid #121212;">
                                    </p>
                                    <p>
                                        Далее выберите кассу, которую нужно закрыть, и нажмите кнопку «Снять с
                                        регистрации».
                                    </p>
                                    <p>
                                        <img width="500" src="/upload/docs/snyatie KKT-2.jpg"
                                             style=" border: 1px solid #121212;">
                                    </p>
                                    <p>
                                        Откроется заявление о снятии ККТ с учета в налоговой инспекции. Заполните дату и
                                        время закрытия ФН, номер фискального документа и фискальный признак. После этого
                                        нажмите кнопку «Подписать и отправить» — заявление будет заверено цифровой
                                        подписью.
                                    </p>
                                    <p>
                                        <img width="500" src="/upload/docs/snyatie KKT-3.jpg"
                                             style=" border: 1px solid #121212;">
                                    </p>
                                    <p>
                                        После этих действий вы увидите, что запрос на снятие с учета онлайн-кассы
                                        добавлен.
                                    </p>
                                    <p>
                                        <img width="500" src="/upload/docs/snyatie%20KKT-4.jpg"
                                             style=" border: 1px solid #121212;">
                                    </p>
                                    <h2>Как узнать, снята ККМ с учета или нет</h2>
                                    <p>
                                        После выполнения всех действий на сайте появится оповещение.
                                    </p>
                                    <p>
                                        <img width="300" src="/upload/docs/snyatie%20KKT-55.jpg"
                                             style=" border: 1px solid #121212;">
                                    </p>
                                    <p>
                                        Кроме того, налоговая в течение 5 дней после получения заявления на снятие с
                                        учета онлайн-кассы пришлет через личный кабинет подтверждающую карточку. Можно
                                        также прийти в ИФНС и забрать бумажный вариант документа.
                                    </p>
                                    <p>
                                        Налоговая может снять ККТ с учета и принудительно. Разберемся, что делать в этом
                                        случае.
                                    </p>
                                    <span class="likeh2">Кассу с учета сняла ФНС: что делать</span>
                                    <p>
                                        Если снятие ККТ с регистрационного учета произошло по инициативе налоговой —
                                        подавать заявление не нужно. ФНС может сделать это, если:
                                    </p>
                                    <ul>
                                        <li>есть нарушения в использовании — повторно зарегистрировать кассу можно будет
                                            после их устранения;
                                        </li>
                                        <li>истек срок эксплуатации фискального накопителя — надо в течение 30 дней
                                            передать налоговикам записанные на ФН платежные данные.
                                        </li>
                                    </ul>
                                    <div class="alert alert-warning">
                                        Компаниям на ОСНО надо менять ФН раз в 13 месяцев, а на спецрежимах (ЕНВД, УСН,
                                        ПСН) — раз в 36.
                                    </div>
                                    <br></div>
                            </div>
                            <div class="col-md-0"></div>
                        </div>
                    </div>
                </transition>
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
                products: {},
                showProductsUpdate: false,
                styleSpanCountProducts: {},
                count_all: true,
                cart: {},
                cartMessage: {},
                showCartMessage: false,
                productsRec: {},
                showDiv2: false
            }
        },
        mounted() {
            this.getCategories();
            this.getProducts();
            this.getCartInfo();
            this.getProductsRec();
            setTimeout(() => {
                this.showProductsUpdate = true;
                this.showDiv2 = true
            }, 900);


        },
        methods: {
            getCategories: function () {
                axios({
                    method: 'get',
                    url: '/get_categories',
                }).then((response) => {
                    this.categories = response.data;

                });
            },
            showCategory: function ($categoryId) {
                this.showProductsUpdate = false;
                this.count_all = false;
                this.styleSpanCountProducts = {
                    top: '-23px',
                    right: '-6px'
                };
                axios({
                    method: 'get',
                    url: '/products/' + $categoryId,
                }).then((response) => {
                    this.products = response.data.products;
                    this.categories = response.data.categories;

                });
                setTimeout(() => {
                    this.showProductsUpdate = true;
                }, 500)

            },
            getProducts: function () {
                this.count_all = true;
                axios({
                    method: 'get',
                    url: '/get_products',
                }).then((response) => {
                    this.products = response.data;

                });
            },

            showAllCategories: function () {
                this.showProductsUpdate = false;
                this.count_all = true;
                axios({
                    method: 'get',
                    url: '/get_products',
                }).then((response) => {
                    this.products = response.data;
                    var app = this;
                    for (var i = 0; i < response.data.length; i++) {
                        app.categories.categories[i].show = false;

                    }
                });
                setTimeout(() => {
                    this.showProductsUpdate = true;
                }, 500)
            },
            addCart: function (id) {
                this.addCartAnimation();
                axios({
                    method: 'get',
                    url: '/cart_add/' + id,
                }).then((response) => {
                    this.cart = response.data;
                    this.addCartAnimation(response.data.message);
                });

            },
            addCartAnimation: function (message) {
                this.showCartMessage = false;
                this.cartMessage = message;
                setTimeout(() => {
                    this.showCartMessage = true;
                }, 300);
                setTimeout(() => {
                    this.showCartMessage = false;
                }, 3000)
            },
            getCartInfo: function () {
                axios({
                    method: 'get',
                    url: '/cart_info',
                }).then((response) => {
                    this.cart = response.data;
                });
            },
            getProductsRec: function () {
                axios({
                    method: 'get',
                    url: '/get_recomended',
                }).then((response) => {
                    this.productsRec = response.data;
                    console.log
                });
            }

        }

    }
</script>
