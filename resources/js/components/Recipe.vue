<template>
    <div v-if="this.recipe.author" class="container">
        <h3>{{recipe.title}}</h3>
        <p>Auteur : {{recipe.author.name}}</p>
        <p>Ingrédients : {{recipe.ingredients}}</p>
        <p>Content : {{recipe.content}}</p>

        <div v-if="this.recipe.media">
            <img :src="`/images/${this.recipe.media}`">
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                recipe:{},
                comments:{}
            }
        },

        created(){
            axios.get('/recipe/' + this.$route.params.id)
                // .then(response => {
                //     console.log(response.data.recipe)
                //     console.log("ok")
                // })
                .then(response => {
                    this.recipe = response.data.recipe;
                    this.comments = response.data.comments;
                })
                .catch(error => console.log(error));
        },

        methods: {
            // getImage:function(){
            //     return require("/images/casimir.jpg")
            // }
        },


        mounted() {
        }
    }
</script>
