<template>
    <div class="container">
        <h2>Mode edition</h2>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-7">
                    <input type="text" name="title" v-model="recipe.title">
                    <textarea name="content" v-model="recipe.content"/>
                </div>
                <div v-if="Object.keys(ingredients).length > 0" class="col-5">
                    <h4>Ingredients</h4>
                    <ul class="list-group mx-0">
                        <li class="list-group-item" v-for="ingredient in ingredients">
                            <div class="row">
                                <input class="col-8" v-model="ingredient.name">
                                <input class="col-4" v-model="ingredient.quantity">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="button">Editer</button>
        </form>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                recipe:{},
                ingredients:{}, 
            }
        },

        created(){
            axios.get('/recipe/' + this.$route.params.id)
                .then(response => {
                    this.recipe = response.data.recipe;
                    this.ingredients = response.data.ingredients;
                })
                .catch(error => console.log(error));
        },

        methods: {
            submit() {
                axios.put('/admin/recipe/' + this.$route.params.id, this.recipe)
                    // .then(response => this.$router.push('/recipe/' + this.$route.params.id))
                    .then(response => console.log(response.data))
                    .catch(error => console.log(error));

                this.ingredients.forEach(ingredient =>{
                    axios.put('/ingredient/update/' + ingredient.id, ingredient)
                        // .then(response => this.$router.push('/recipe/' + this.$route.params.id))
                        .then(response => console.log(response.data))
                        .catch(error => console.log(error));
                });

                this.$router.push('/recipe/' + this.$route.params.id);
            },
        }
    }
</script>
