
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('index-component', require('./components/IndexComponent.vue').default);
Vue.component('category-by-id-component', require('./components/CategoryByIdComponent.vue').default);
Vue.component('show-product-component', require('./components/ShowProductComponent.vue').default);

/**
 * Admin
 */
Vue.component('admin-component', require('./components/admin/AdminComponent.vue').default);
Vue.component('admin-product-component', require('./components/admin/ProductAdminComponent').default);
Vue.component('admin-partners-component', require('./components/admin/AdminPartnersComponent').default);
Vue.component('admin-sliders-component', require('./components/admin/AdminSlidersComponent').default);
Vue.component('admin-recommended-component', require('./components/admin/AdminRecommendedComponent').default);


Vue.component('cart-component', require('./components/CartComponent.vue').default);
Vue.component('rent-component', require('./components/RentComponent.vue').default);
Vue.component('about-component', require('./components/AboutComponent.vue').default);
Vue.component('contacts-component', require('./components/ContactsComponent').default);


/**
 * FZ54
 */
Vue.component('fz54-component', require('./components/Fz54Component').default);
Vue.component('sofd-component', require('./components/fz54/SofdComponent').default);
Vue.component('kas2g-component', require('./components/fz54/Kas2gComponent').default);
Vue.component('kzokvn-component', require('./components/fz54/KzokvnComponent').default);
Vue.component('pnf-component', require('./components/fz54/PnfComponent').default);
Vue.component('nor-component', require('./components/fz54/NorComponent').default);
Vue.component('novye-objazatelnye-rekvizity-chekov-kkt-i-bso-component', require('./components/fz54/novyeObjazatelnyeRekvizityChekovKktIBsoComponent').default);
Vue.component('onlayn-kassy-dlya-ip-na-envd-i-psn-otsrochka-do-2021-goda-component', require('./components/fz54/onlaynKassyDlyaIpNaEnvdIPsnOtsrochkaDo2021GodaComponent').default);
Vue.component('nalogovyj-vychet-za-onlajn-kassu-component', require('./components/fz54/nalogovyjVychetZaOnlajnKassuComponent').default);
Vue.component('komu-nuzhno-stavit-kassovyj-apparat-component', require('./components/fz54/komuNuzhnoStavitKassovyjApparatComponent').default);
Vue.component('kak-snyat-s-ucheta-online-kassu-component', require('./components/fz54/kakSnyatSUchetaOnlineKassuComponent').default);

/**
 * Assets component
 */
Vue.component('header-component', require('./components/assets/HeaderComponent').default);
Vue.component('recommended-component', require('./components/assets/RecommendedComponent').default);
Vue.component('footer-component', require('./components/assets/FooterComponent').default);
Vue.component('editor', require('@tinymce/tinymce-vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




const app = new Vue({
    el: '#app',
});
