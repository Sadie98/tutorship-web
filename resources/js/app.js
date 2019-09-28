/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
// import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'


//
// require('./bootstrap');

window.Vue = require('vue');
// window.Vuetify = require('vuetify');
// let Vuetify = require('vuetify');

import '@mdi/font/css/materialdesignicons.css'
import Vuetify, {
    VCard,
    VAvatar,
    VApp,
    VBtn,
    VCalendar,
    VTextarea,
    VCarousel,
    VIcon,
    VImg
} from 'vuetify/lib'

import VGrid from 'vuetify/lib/components/VGrid'
import VLayout from 'vuetify/lib/components/VGrid/VLayout'
import VContainer from 'vuetify/lib/components/VGrid/VContainer'
import VFlex from 'vuetify/lib/components/VGrid/VFlex'
import VCol from 'vuetify/lib/components/VGrid/VCol'
import colors from 'vuetify/lib/util/colors'

import VueRouter from 'vue-router'
import router from './router'
import App from './components/App'
// import route from './route'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('profile', require('./components/Profile.vue').default);
Vue.use(Vuetify, {
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    },
    components: {
        VCard,
        VAvatar,
        VApp,
        VBtn,
        VCalendar,
        VGrid,
        VTextarea,
        VCarousel,
        VIcon,
        VImg,
        VLayout,
        VContainer,
        VCol,
        VFlex
    },
    theme: {
        themes: {
            light: {
                primary: colors.red.darken1, // #E53935
                secondary: colors.red.lighten4, // #FFCDD2
                accent: colors.indigo.base, // #3F51B5
            },
        },
    },
});
Vue.use(VueRouter);

const opts = {};
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(opts),
    render: h => h(App),
    router
});
