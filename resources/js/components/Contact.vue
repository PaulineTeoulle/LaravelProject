<template>
    <div class="container">
        <h3 class="my-4">Contact</h3>
        <div>
            <h5>contact enregistrés</h5>
            <ul class="d-flex justify-content-start flex-wrap mx-0">
                <li class="p-2" style="list-style-type: none" v-for="contact in contacts" :key="contact.id">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{contact.name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{contact.email}}</h6>
                            <p class="card-text">{{contact.message}}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="container mx-auto">
        <h5>Contacter quelqu'un</h5>
            <form class="container" @submit.prevent="submit">
                <div class="row">
                    <input class="col" type="text" name="name" v-model="contact.name" placeholder="nom">
                    <input class="col" type="email" name="mail" v-model="contact.email" placeholder="email">
                </div>

                <div class="row">
                    <textarea class="col" name="message" v-model="contact.message" placeholder="message"/>   
                </div>

                <div class="row">  
                    <button type="submit" class="btn btn-primary my-4">Envoyer</button>
                </div>
            </form>
        </div>
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
            }
        },

        created(){
            axios.get('/contact')
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
