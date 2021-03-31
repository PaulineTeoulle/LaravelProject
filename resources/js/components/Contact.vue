<template>
    <div class="container">
        <h2>Contact</h2>

        <div v-if="this.authUser">
            <h3>contact enregistrés</h3>
            <ul>
                <li v-for="contact in contacts" :key="contact.id">
                    <p>Nom : {{contact.name}} <br> email : {{contact.email}}</p>
                </li>
            </ul>
        </div>

        <form @submit.prevent="submit">
            <input type="text" name="name" v-model="contact.name" placeholder="nom">
            <input type="text" name="mail" v-model="contact.email" placeholder="email">
            <textarea name="message" v-model="contact.message" placeholder="message"/>     
            <button type="submit" class="button">Envoyer</button>
        </form>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                contacts: {},
                contact:{
                    name: null,
                    email: null,
                    message: null,
                },
                authUser: window.authUser
            }
        },

        created(){
            axios.get('/contact/')
                .then(response => this.contacts = response.data)
                .catch(error => console.log(error));
        },

        methods: {
            submit() {
                console.log(this.contact);
                axios.post('/contact/create', this.contact)
                    .then(response => this.$router.go())
                    .catch(error => console.log(error));
                },
        }
    }
</script>
