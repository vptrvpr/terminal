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
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->


        <section class="featured-section" style="    background: whitesmoke;">

            <div class="container">
                <transition name="showDiv2" >
                <div class="infomation_about" v-if="showDiv2">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>ФЗ-54</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <h1 class="h1-fz text-center">Обязательные реквизиты кассового чека и БСО в 2019 году</h1>

                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="bx_689919819_1349">
                                <p>
                                    Недавно принятые поправки в правила применения контрольно-кассовой техники влекут за собой и дополнительные требования к кассовым чекам и бланкам строгой отчетности. Данные ОФД, к которому подключена онлайн-касса, включены в <strong>обязательные реквизиты БСО и кассового чека в 2019 году</strong>. В документах теперь надо указывать разные параметры. В чеках нужно пробивать наименования товаров, для этого необходима кассовая программа, которая это умеет. Наше бесплатнное приложение Касса МойСклад поддерживает это и все остальные требования 54-ФЗ. Скачайте и попробуйте его прямо сейчас.
                                </p>
                                <p>
                                    Для новых реквизитов в чеках онлайн-касс и бланков строгой отчетности нет унифицированных форм, но в них должны содержаться определенные данные. Это данные, которые добавились с вступлением закона 54-ФЗ в силу. Вот новые реквизиты в чеках онлайн-касс:
                                </p>
                                <ul>
                                    <li>Применяемая организацией система налогообложения.</li>
                                    <li>Признак расчета: продажа/возврат.</li>
                                    <li>Заводской номер фискального накопителя.</li>
                                    <li>Порядковый номер фискальных данных.</li>
                                    <li>Фискальный признак данных.</li>
                                    <li>Список приобретенных товаров со стоимостью, ценой и примененными скидками.</li>
                                    <li>НДС для каждой позиции.</li>
                                    <li>Заводской номер фискального накопителя.</li>
                                    <li>Номер фискального документа.</li>
                                    <li>Код фискальной передачи данных.</li>
                                    <li>Сумма НДС и ставка налога.</li>
                                    <li>Название ОФД.</li>
                                    <li>Адрес сайта ОФД.</li>
                                    <li>QR-код, служащий дополнительной проверкой подлинности чека.</li>
                                </ul>
                                <p>
                                    При этом в законе в списке обязательных реквизитов чека онлайн-кассы QR-код не значится, однако в разделе требований к контрольно-кассовой технике указано, что кассовый аппарат должен «обеспечивать возможность печати на кассовом чеке (бланке строгой отчетности) двухмерного штрихового кода (QR-код размером не менее 20Х20 мм), содержащего в кодированном виде реквизиты проверки кассового чека или бланка строгой отчетности в отдельной выделенной области кассового чека или бланка строгой отчетности». Таким образом QR-кода на новых чеках онлайн-касс вполне может и не быть, но онлайн-кассы должны уметь его печатать.
                                </p>
                                <p>
                                    Что должно быть зашифровано в QR-коде на кассовом чеке по новым правилам? Закон говорит, что там должны содержаться сведения о покупке (дата и время платежа, порядковый номер фискального документа, признак расчета, сумма расчета, заводской номер фискального накопителя, фискальный признак документа).
                                </p>
                                <h2>Обязательные реквизиты кассового чека в 2019 году </h2>
                                <p>
                                    Вот список реквизитов чека — 54-ФЗ строго предписывает их печатать на каждом документе, подтверждающем продажу:
                                </p>
                                <ul>
                                    <li>признак расчета (приход или расход),</li>
                                    <li>дата, время и место осуществления расчета,</li>
                                    <li>информация о налоговой системе продавца,</li>
                                    <li>заводской номер фискального накопителя,</li>
                                    <li>номенклатура товаров (услуг),</li>
                                    <li>сумма расчета с отдельным указанием ставки и размера НДС,</li>
                                    <li>форма расчета (наличные или электронный платеж),</li>
                                    <li>заводской номер ФН,</li>
                                    <li>регистрационный номер ККТ,</li>
                                    <li>адрес сайта ОФД,.</li>
                                    <li>фискальный признак документа,</li>
                                    <li>порядковый номер фискального документа,</li>
                                    <li>номер смены,</li>
                                    <li>фискальный признак сообщения,</li>
                                    <li>если покупатель захотел получить чек на e-mail или смс, то должен быть указан его адрес электронной почты или номер телефона, а также в этом случае должен значиться электронный адрес почты отправителя чека.</li>
                                </ul>
                                <img src="https://www.moysklad.ru/upload/medialibrary/aca/Чек_наш.jpg" Бланки="" строгой="" отчетности="" должны="" быть="" изготовлены="" типографским="" способом="" или="" сформированы="" с="" использованием="" автоматизированных="" систем.="" Если="null" вы="" печатаете="" БСО="null" в="" то="" такие="" бланки="" содержать="" сведения="" об="" изготовителе:="" сокращенное="" номер="" заказа="" и="" год="" его="" тираж.="" p="">
                                <p>
                                    В этом чеке отмечены следующие реквизиты:
                                </p>
                                <ol>
                                    <li>«Торговый объект» - название магазина.</li>
                                    <li>«Кассовый чек» - название документа.</li>
                                    <li>Приход – признак расчета.</li>
                                    <li>«Морковь» - номенклатура товара.</li>
                                    <li>Количество товара.</li>
                                    <li>Цена за единицу товара.</li>
                                    <li>Стоимость товара.</li>
                                    <li>% НДС.</li>
                                    <li>Сумма НДС.</li>
                                    <li>Итоговая сумма расчета.</li>
                                    <li>Форма расчета – наличными с суммой.</li>
                                    <li>Форма расчета – картой, тоже с суммой.</li>
                                    <li>Информация о налоговой системе продавца.</li>
                                    <li>Отдельно общая сумма НДС.</li>
                                    <li>ФИО кассира и его должность.</li>
                                    <li>Номер смены.</li>
                                    <li>ИНН торгового предприятия, выдавшего чек.</li>
                                    <li>ЗН – заводской номер кассовой машины.</li>
                                    <li>Наименование организации, выдавшей чек.</li>
                                    <li>Адрес расчета.</li>
                                    <li>Адрес сайта, где можно проверить чек.</li>
                                    <li>Порядковый номер чека.</li>
                                    <li>Дата и время выдачи чека. </li>
                                    <li>Регистрационный номер ККТ.</li>
                                    <li>Заводской номер фискального накопителя.</li>
                                    <li>Номер фискального чека.</li>
                                    <li>Фискальный признак данных.</li>
                                    <li>QR-код для проверки чека.</li>
                                </ol>
                                <p>
                                    Все эти данные – обязательные реквизиты чека онлайн-кассы. Если на чеке отсутствует хотя бы один из них, то по закону чек считается не действительным, а предприниматель должен будет приложить все усилия, чтобы доказать проверяющему органу применение онлайн-кассы, иначе он будет оштрафован за несоблюдение нового закона. Более подробно про реквизиты чека, требуемые 54-ФЗ, можно прочитать в самом тексте закона. При этом контролировать соответствие реквизитов на чеках закону может даже сам покупатель, поэтому не только предпринимателям необходимо быть в курсе, какие реквизиты должны быть в кассовом чеке.
                                </p>
                                <p>
                                </p>
                                <p>
                                </p>
                                <p>
                                    Важно! Индивидуальные предприниматели, использующие ПСН, УСН и ЕНВД, за исключением тех, кто торгует подакцизными товарами, могут не указывать на чеках наименование и количество купленных товаров или услуг. Такое послабление для малого бизнеса дано до 1 февраля 2021 года (ФЗ от 03.07.2016 N 290-ФЗ). После этой даты они должны работать, как все остальные предприятия. Читайте подробнее о сроках, когда надо будет начать указывать товары в чеке, а также об отсрочке онлайн-касс до 2019 года здесь
                                </p>
                                <h2>Обязательные реквизиты БСО</h2>
                                <p>
                                    Что касается обязательных реквизитов БСО, то в случае, если организация находится в труднодоступной области, последние три пункта из списка обязательных реквизитов чека онлайн-кассы могут не указываться. Кроме того, Правительство РФ предупреждает в законе, что оно может дополнить список еще одним обязательным реквизитом – кодом товарной номенклатуры – в случае, если он определен. В остальном, все реквизиты БСО ничем не отличаются от реквизитов чека онлайн-кассы.
                                </p>
                                <p>
                                    А именно:
                                </p>
                                <ol>
                                    <li>Название документа.</li>
                                    <li>Номер документа, состоящий из шести цифр.</li>
                                    <li>Название и форма собственности организации, выдавшей чек.</li>
                                    <li>Адрес фирмы.</li>
                                    <li>ИНН фирмы, выдавшей документ.</li>
                                    <li>Вид услуги, оказанной клиенту.</li>
                                    <li>Стоимость услуги.</li>
                                    <li>Сумма, вносимая клиентом.</li>
                                    <li>Должность и ФИО сотрудника, принявшего оплату.</li>
                                    <li>Другие характеристики услуги (не обязательно).</li>
                                    <p>
                                        Если у бланка документа нет отрывной части, то при его заполнении необходимо делать копию. Дублировать серию и номер бланка документа запрещено. Кроме того, БСО должен быть изготовлен либо с применением автоматизированной системы, либо отпечатан в типографии – в последнем варианте на нем должна быть указана информация об этой типографии (название, ИНН), значиться тираж печати, номер заказа и год его исполнения.
                                    </p>
                                    <p>
                                        Подробнее об оформлении БСО см. Положение об осуществлении наличных денежных расчетов и (или) расчетов с использованием платежных карт без применения ККТ Постановления Правительства РФ от 6 мая 2008 г. № 359.
                                    </p>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-0"></div>
                    </div>
                </div>
                </transition>
            </div>

        </section>


        <section class="best-seller-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>РЕКОМЕНДУЕМ</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div v-for="product in productsRec" class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <div class="img-product">
                                <img :src="product.img" class="img-responsive" width="255" height="322" alt="">
                            </div>
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a class="add_cart" @click="addCart(product.id)"><i class="pe-7s-cart"></i>Добавить в корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>{{product.name}}</h3>
                                    <span>{{product.price}} ₽</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section">
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
                            <div class="contact-info">
                                <p>Адрес: </p>
                                <p>Телефон: 8 (800) 000-00-00</p>
                                <p>Почта: info@terminal.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Имя">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Почта">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Тема">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="textarea-form-footer">
                                            <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Сообщение..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Отправить" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </div>
</template>

<script>
    export default {
        data: function () {
            return{
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
            this.getProductsRec();setTimeout(() => {
                this.showProductsUpdate = true;
                this.showDiv2 = true
            }, 900);


        },
        methods:{
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
                    url: '/products/'+$categoryId,
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
                    for(var i = 0;i<response.data.length;i++){
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
                    url: '/cart_add/'+id,
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
            getCartInfo: function(){
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
