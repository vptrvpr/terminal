<template>
    <div class="">
        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand left-animate" href="/"><img class="logo-terminal" src="/images/logo_terminal.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Главная</a></li>
                            <li><a href="/about">О нас</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                            <li><a href="/fz-54">ФЗ-54</a></li>
                            <li><a href="/tax-deduction">Налоговый вычет</a></li>
                            <li><a @click="scrollToBottom" class="scroll-bottom-a">Тех. поддержка</a></li>
                            <li><a @click="showSearch" class="scroll-bottom-a" style="font-size: 20px"><i
                                class="fas fa-search"></i></a></li>


                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

        <section class="search-vue-section" v-if="isShowSearch">
            <div class="container" style="background: transparent;">
                <div class="row subscribe-from" style="background: transparent;">
                    <div class="col-md-12" style="background: transparent;">
                        <transition name="out-left-notif">
                            <form class="form-inline col-md-12" method="get" action="/search" v-if="isShowSearchInput"
                                  style="background: transparent;">
                                <div class="form-group" style="background: transparent;">
                                    <input type="text" name="title" class="form-control search-input"
                                           placeholder="Поиск...">
                                    <button class="suscribe-btn"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </transition>
                    </div>
                </div>
            </div>
        </section>


    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                isShowSearch: false,
                isShowSearchInput: false
            }
        },
        methods: {
            scrollToBottom: function () {
                $( "html, body" ).animate( { scrollTop: $( document ).height() }, "slow" );
                return false;
            },
            showSearch: function () {
                if ( this.isShowSearch === true && this.isShowSearchInput === true ) {
                    this.isShowSearch = false;
                    this.isShowSearchInput = false;
                } else if ( this.isShowSearch === false && this.isShowSearchInput === false ) {
                    this.isShowSearch = true;
                    const self = this;
                    this.intervalid1 = setTimeout( function () {
                        self.isShowSearchInput = true;
                    }, 100 );
                }
            }
        }
    }
</script>
