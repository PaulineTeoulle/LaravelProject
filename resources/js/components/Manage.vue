<template>
    <div class="container">
        <h3 class="my-4">Gestion des utilsiateurs</h3>

        <div class="d-flex">
            <input v-model="search" type="text" name="search" required/>
            <button v-on:click="searchUser(search)" class="button">Chercher</button>
        </div>

        <div>
            <ul class="list-group mx-0">
                <li class="list-group-item" v-for="user in users" :key="user.id">
                    <div class="row">
                        <p class="col-5">nom : {{user.name}}</p>
                        <p class="col-5">e-mail : {{user.email}}</p>
                        <p class="col-2">edit</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                users:{},
                search: null,
                searchResults: {}
            }
        },

        created(){
            this.getUsers();
        },

        methods: {
            getUsers(){
                axios.get('/manage/users')
                .then(response => this.users = response.data)
                .catch(error => console.log(error));
            },

            searchUser(search){
                if(search){
                    axios.get('/manage/search/users',{ params: { search }})
                    .then(response => this.users = response.data)
                    .catch(error => console.log(error));
                } else {
                    this.getUsers();
                }
            }
        }
    }
</script>
