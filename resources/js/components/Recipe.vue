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

        <div>
            <h4>Commentaires</h4>
            <form v-if="authUser" @submit.prevent="submit">
                <textarea name="comment" v-model="message"/>
                <button type="submit" class="button">Poster</button>
            </form>
            
            <div>
                <div v-for="comment in comments" :key="comment.id">
                    <h5>{{comment.author}} <small>({{comment.date}})</small></h5>
                    <p>{{comment.content}}</p>
                    <button v-if="authUser.id == comment.author_id" v-on:click="deleteComment(comment.id)" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        

        data(){
            return{
                recipe:{},
                comments:{},
                message:null,
                authUser: window.authUser
            }
        },

        created(){
            this.getRecipe();
        },
        

        methods: {
            getRecipe:function(){
                axios.get('/recipe/' + this.$route.params.id)
                    .then(response => {
                        this.recipe = response.data.recipe;
                        this.comments = response.data.comments;
                    })
                    .catch(error => console.log(error));
            },

            deleteComment:function(comment_id){
                axios.post('/comment/delete/' + comment_id)
                .then(response => this.$router.go())
                .catch(error => console.log(error));
            },

            deleteRecipe:function(){
                axios.delete('/admin/recipe/' + this.$route.params.id)
                .then(response => this.router.push('/recipes'))
                .catch(error => console.log(error));

            },

            editRecipe:function(){
                axios.get('/admin/recipe/' + this.$route.params.id + '/edit')
                .then(response => console.log(response))
                .catch(error => console.log(error));
            },

            submit() {
                if(this.message != null){
                    let formData = new FormData();
                    formData.append("recipe_id", this.recipe.id);
                    formData.append("content", this.message);

                    axios.post('/comment/create', formData)
                        .then(response => this.$router.go(0))
                        .catch(error => console.log(error));
                }                
            }
        }
    }
</script>
