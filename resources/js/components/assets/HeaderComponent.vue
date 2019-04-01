<template>
    <div class="">
    <div id="preloader">
        <div class="preloader-area">
            <div class="preloader-box">
                <div class="preloader"></div>
            </div>
        </div>
    </div>


    <header class="header-section">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img class="logo-terminal" src="/images/logo_terminal.png"></a>
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
                        

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </header>
    </div>
</template>

<script>
    export default {
        methods: {
            scrollToBottom: function (  ) {
                console.log(1);
                $("html, body").animate({ scrollTop: $(document).height() }, "slow");
                return false;
            }
        }
    }
</script>

<style scoped>

</style>
