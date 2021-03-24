require('./bootstrap');

window.Vue = require('vue').default;
// import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter) 

import Home from './components/Home.vue';
import Recipes from './components/Recipes.vue';


const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/recipes',
        component: Recipes
    }
]

const router = new VueRouter({routes});
// Vue.component('navbar', require('./components/Nav.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});
