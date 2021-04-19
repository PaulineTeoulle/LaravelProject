require('./bootstrap');

window.Vue = require('vue').default;
// import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter) 

import Home from './components/Home.vue';
import Recipes from './components/Recipes.vue';
import Recipe from './components/Recipe.vue';
import RecipeEdit from './components/RecipeEdit.vue';
import RecipeCreate from './components/RecipeCreate.vue';
import Contact from './components/Contact.vue';
import Manage from './components/Manage.vue';




const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/recipes',
        component: Recipes
    },
    {
        path: '/recipe/:id',
        component: Recipe
    },
    {
        path: '/admin/recipe/:id/edit',
        component: RecipeEdit
    },
    {
        path: '/admin/recipe/create',
        component: RecipeCreate
    },
    {
        path: '/contact',
        component: Contact
    },
    {
        path: '/manage',
        component: Manage
    },
]

const router = new VueRouter({routes});
// Vue.component('navbar', require('./components/Nav.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});
