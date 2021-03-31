<template>
    <div class="container">
        <h3 class="my-4">Nos 3 dernières recettes</h3>
        <ul class="list-group mx-0">
            <li class="list-group-item" v-for="recipe in recipes" :key="recipe.id">
                <router-link :to="`/recipe/${recipe.id}`">{{recipe.title}}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                recipes:{},
            }
        },

        created(){
            axios.get('/home/recipes')
                .then(response => this.recipes = response.data)
                .catch(error => console.log(error));

        }
    }
</script>
