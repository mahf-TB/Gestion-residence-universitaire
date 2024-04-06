<template>
    <div class="relative">
        <haut-header-vue></haut-header-vue>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow text-blue-800  py-1 z-10 w-full">
            <div class="flex items-center justify-between py-2 px-4">
                <div>
                    <div class="relative max-w-lg w-full mb-1">
                        <div class="absolute top-1 left-2 inline-flex items-center p-2">
                            <i class="fas fa-search text-gray-400 "> </i>
                        </div>
                        <input v-model="query"
                            class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                            type="search" placeholder="Recherche..." />
                    </div>
                </div>
                <div class="text-blue-0 p-2">
                    <nav class="text-[18px] flex items-center justify-between">
                        <router-link to="/user/home" :class="{ 'text-blue-4': $route.path === '/user/home' }"
                            class="text-blue-0 px-5"><i class="fa-solid fa-house-chimney"
                                style="font-size: 1.4rem"></i></router-link>
                        <router-link to="/user/evenement" :class="{ 'text-blue-4': $route.path === '/user/evenement' }"
                            class="text-blue-0 px-5"><i class="fa-solid fa-calendar-days"
                                style="font-size: 1.4rem"></i></router-link>
                        <router-link to="/user/service" :class="{ 'text-blue-4': $route.path === '/user/service' }"
                            class="text-blue-0 px-5"><i class="fa-solid fa-bell-concierge"
                                style="font-size: 1.4rem"></i>
                            <i class="fa-solid fa-utensils" style="font-size: 1.4rem"></i>
                        </router-link>
                        <router-link to="/user/maintenance" :class="{ 'text-blue-4': $route.path === '/user/maintenance' }"
                            class="text-blue-0 px-5"><i class="fa-solid fa-briefcase"
                                style="font-size: 1.4rem"></i></router-link>
                    </nav>
                </div>
                <div class="flex items-center justify-center text-gray-500">
                    <span class="material-icons-outlined text-blue-0 relative cursor-pointer flex">
                        <button  @click="this.$router.push('/user/messenger')"
                        class="bg-blue-0 text-blue-1 p-2 mx-3 rounded-full flex items-center"><i
                                class="fa-brands fa-facebook-messenger" style="font-size: 1.4rem"></i>
                        </button>
                        <button class="bg-blue-0 text-blue-1 py-2 px-[10px] mx-3 rounded-full flex items-center"
                            @click="$refs.menu1.toggle($event)">
                            <i class="fa-solid fa-bell" style="font-size: 1.4rem"></i>
                            <Menu ref="menu1" :popup="true" class="flex" :model="items"></Menu>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service'
import Menu from 'primevue/menu';
import HautHeaderVue from '../HautHeader.vue';

export default {
    name: 'Header',
    components: {
        Menu, HautHeaderVue
    },
    data() {
        return {
            items: [
                { label: 'Type de logement', command: () => this.$router.push("/accueil") },
                { label: 'Logement pour etudiant', command: () => this.$router.push("/user/residences") },
                { label: 'Service', command: () => this.$router.push("/user/service") },
            ]
        }
    },
    mounted() {
    },
    computed: {
        isConnect() {
            let user = JSON.parse(localStorage.getItem('user-info'))
            console.log(user)
            if (user) {
                return false
            }
            return true
        }
    },
    methods: {


    },
}
</script>
<style></style>