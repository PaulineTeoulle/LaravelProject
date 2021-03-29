<template>
    <div class="container">
        <h2>Mode edition</h2>
        <form @submit.prevent="submit">
            <input type="text" name="title" v-model="recipe.title">
            <textarea name="content" v-model="recipe.content"/>
            <textarea name="ingredient" v-model="recipe.ingredients"/>     
            <button type="submit" class="button">Editer</button>
        </form>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                recipe:{},
            }
        },

        created(){
            axios.get('/recipe/' + this.$route.params.id)
                .then(response => {
                    this.recipe = response.data.recipe;
                })
                .catch(error => console.log(error));
        },

        methods: {
            submit() {
                console.log("ok")
                axios.put('/admin/recipe/' + this.$route.params.id, this.recipe)
                    .then(response => this.$router.push('/recipe/' + this.$route.params.id))
                    .catch(error => console.log(error));
                },
        }
    }
</script>
