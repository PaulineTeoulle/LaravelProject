<template>
    <div class="container">
        <h3 class="my-4">Gestion des utilsiateurs</h3>

        <div class="d-flex">
            <input class="mb-0" v-model="search" type="text" name="search" placeholder="nom" required/>
            <button v-on:click="searchUser(search)" class="button mb-0">Chercher</button>
        </div>
        <p class="mb-3" style="font-size: 12px">chaine vide = all</p>

        <div>
            <ul class="list-group mx-0">
                <li class="list-group-item" v-bind:class="user.id" v-for="user in users" :key="user.id">
                    <div class="row">
                        <p class="col-4">nom : {{user.name}}</p>
                        <p class="col-5">e-mail : {{user.email}}</p>
                        <div class="col-2">
                            <select v-model="user.role">
                                <option v-for="option in options" v-bind:value="option">
                                    {{option}}
                                </option>
                            </select>
                        </div>
                        <button v-on:click="updateRole(user.id, user.role)" class="col-1 btn btn-outline-primary">Edit role</button>
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
                searchResults: {},
                options:["user", "admin"]
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
            },

            updateRole(id, role){
                axios.put('/manage/update/' + id, { params: { role }})
                    .then(response => console.log(response.data))
                    .catch(error => console.log(error));
            },
            
        }
    }
</script>
