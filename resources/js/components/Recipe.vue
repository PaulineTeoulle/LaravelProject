<template>
    <div v-if="this.recipe.author" class="container">
        <h3>{{recipe.title}}</h3>
        <p>Auteur : {{recipe.author.name}}</p>
        <p>Ingrédients : {{recipe.ingredients}}</p>
        <p>Content : {{recipe.content}}</p>

        <div v-if="this.recipe.media">
            <img :src="`/images/${this.recipe.media}`">
        </div>

        <div v-if="this.authUser">
            <button v-on:click="deleteRecipe" class="button">Supprimer</button>
            <button v-on:click="editRecipe" class="button">                    
                <router-link :to="`/admin/recipe/${recipe.id}/edit`">Modifier</router-link>
            </button>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                recipe:{},
                comments:{},
                authUser: window.authUser
            }
        },

        created(){
            axios.get('/recipe/' + this.$route.params.id)
                .then(response => {
                    this.recipe = response.data.recipe;
                    this.comments = response.data.comments;
                })
                .catch(error => console.log(error));
        },

        methods: {
            deleteRecipe:function(){
                axios.delete('/admin/recipe/' + this.$route.params.id)
                .then(response => this.$router.push('/') )
                .catch(error => console.log(error));
            },

            editRecipe:function(){
                axios.get('/admin/recipe/' + this.$route.params.id + '/edit')
                .then(response => console.log(response))
                .catch(error => console.log(error));
            }
        },


        mounted() {
        }
    }
</script>
