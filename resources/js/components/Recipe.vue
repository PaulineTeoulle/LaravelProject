<template>
    <div v-if="this.recipe.author" class="container">
        <div class="row">
            <div class="col-7">
                <h3>{{recipe.title}}</h3>
                <p>Auteur : {{recipe.author.name}}</p>
                <p>Content : {{recipe.content}}</p>
            </div>
            <div v-if="Object.keys(ingredients).length > 0" class="col-5">
                <h4>Ingredients</h4>
                <ul class="list-group mx-0">
                    <li class="list-group-item" v-for="ingredient in ingredients">
                        <div class="row">
                            <p class="col-8">{{ingredient.name}}</p>
                            <p class="col-4">{{ingredient.quantity}}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div v-if="this.recipe.media">
            <img :src="`/images/${this.recipe.media}`">
        </div>

        <div v-if="authUser.id == recipe.author_id || authUser.role == 'admin'">
            <button v-on:click="deleteRecipe" class="button">Supprimer</button>
            <router-link :to="`/admin/recipe/${recipe.id}/edit`"><button v-on:click="editRecipe" class="button">                    
                Modifier
            </button></router-link>
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
                    <button v-if="authUser.id == comment.author_id || authUser.role == 'admin'" v-on:click="deleteComment(comment.id)" class="btn btn-danger">Supprimer</button>
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
                ingredients:{},
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
                        this.ingredients = response.data.ingredients;
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
                .then(response => this.$router.push('/recipes'))
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
                        .then()
                        .catch(error => console.log(error));
                }                
            }
        }
    }
</script>
