<template>
    <div class="container">
        RECETTES
        <div>
            <ul>
                <li v-for="recipe in recipes" :key="recipe.id">
                    <router-link :to="`/recipe/${recipe.id}`">{{recipe.title}}</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                recipes:{}
            }
        },

        created(){
            axios.get('/recipes')
                .then(response => this.recipes = response.data)
                .catch(error => console.log(error));
        },

        mounted() {
        }
    }
</script>
