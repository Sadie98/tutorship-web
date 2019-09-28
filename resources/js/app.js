require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import router from './src/plugins/router'
import App from './src/App'
import Vuetify from './src/plugins/vuetify'

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueRouter);
Vue.use(Vuetify);


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
