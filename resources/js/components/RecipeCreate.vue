<template>
    <div class="container">
        <h2>Créer une recette</h2>
        <form @submit.prevent="submit">
            <input type="text" name="title" v-model="recipe.title" placeholder="titre">
            <textarea name="content" v-model="recipe.content" placeholder="description"/>
            <input name="nameIngredient" id="nameIngredient" placeholder="nom ingrédient"/>
            <input name="quantity" id="quantity" placeholder="quantité"/>
            <button type="button" v-on:click="addIngredient()" class="button">add</button>
            <ul class="list-group mx-0">
                <li v-for="ingredient in ingredients">
                    <div class="d-flex">
                        <p>nom : {{ingredient.name}}</p>
                        <p class="pl-3">quantité : {{ingredient.quantity}}</p>
                    </div>
                </li>
            </ul> 
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
                    media: null
                },
                ingredients:[]
            }
        },

        created(){
            
        },

        methods: {
            addIngredient(){
                let elementName = document.getElementById("nameIngredient");
                let elementQuantity = document.getElementById("quantity");
                let nameIngredient = elementName.value;
                let quantity = elementQuantity.value;
                elementName.value = '';
                elementQuantity.value = '';
                this.ingredients.push({"name" : nameIngredient, "quantity" : quantity});
                console.log(this.ingredients);
                
            },

            submit() {
                let formData = new FormData();
                formData.append("title", this.recipe.title);
                formData.append("content", this.recipe.content);
                formData.append("ingredients", JSON.stringify(this.ingredients));
                // evite la string "null"
                if(this.recipe.media){
                    formData.append("media", this.recipe.media);
                }
                axios.post('/admin/recipe', formData)
                    .then(this.$router.push('/'))
                    // .then(response => console.log(response.data))
                    .catch(error => console.log(error));
            },

            onFileChange(event){
                this.recipe.media = event.target.files[0];
            }
        }
    }
</script>
