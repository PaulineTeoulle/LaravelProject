<template>
    <div class="container">
        <h2>Créer une recette</h2>
        <form @submit.prevent="submit">
            <input type="text" name="title" v-model="recipe.title" placeholder="titre">
            <textarea name="content" v-model="recipe.content" placeholder="description"/>
            <textarea name="ingredients" v-model="recipe.ingredients" placeholder="ingrédients"/>  
            <input @change="onFileChange" type="file" name="media">   
            <button type="submit" class="button">Créer</button>
        </form>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                recipe:{
                    title: null,
                    content: null,
                    ingredients: null,
                    media: null
                },
            }
        },

        created(){
            
        },

        methods: {
            submit() {
                let formData = new FormData();
                formData.append("title", this.recipe.title);
                formData.append("content", this.recipe.content);
                formData.append("ingredients", this.recipe.ingredients);
                formData.append("media", this.recipe.media);

                axios.post('/admin/recipe', formData)
                    .then(this.$router.push('/'))
                    .catch(error => console.log(error));
            },

            onFileChange(event){
                this.recipe.media = event.target.files[0];
            }
        }
    }
</script>
