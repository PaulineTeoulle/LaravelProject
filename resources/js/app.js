require('./bootstrap');

window.Vue = require('vue').default;
// import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter) 

import Home from './components/Home.vue';

const routes = [
    {
        path: '/',
        component: Home
    }
]

const router = new VueRouter({routes});
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});
