<template>
    <div class="relative">
        <div class="md:flex items-center justify-between  bg-blue-4 py-2 px-20">
            <div class="flex items-center justify-center">
                <img class="w-[100px] h-[100px]" :src="require('@/assets/LC.png')" alt="logo pour le residence" />
                <h1 class="text-blue-0 text-[28px]">Lodge Cité <br /> Universitaire</h1>
            </div>
            <div class="flex items-center justify-around lowercase">
                <div class="flex justify-center flex-col text-sm mr-4 text-blue-0">
                    <span><i class="fa-solid fa-phone pr-2"></i>+261 33 17 189 39</span>
                    <span>
                        <i class="fa-solid fa-envelope pr-2"></i>lodgecite.univ@gmail.com</span>
                </div>
                <button class="btn btn-primary" v-if="isConnect">
                    <router-link to="/login" class="text-blue-0 font-light">se connecter</router-link>
                </button>
                <side-bar-menu></side-bar-menu>
            </div>
        </div>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow text-blue-800  py-1 z-10 w-full">
            <div class="container flex items-center justify-between py-2 ">
                <div class="text-blue-0 ">
                    <nav>
                        <router-link to="/accueil" class="text-blue-0 px-4">Accueil</router-link>
                        <router-link to="/activites" class="text-blue-0 px-4"> Activités</router-link>
                        <button @click="$refs.menu1.toggle($event)" v-if="!isConnect"
                            class="text-blue-0 px-4 uppercase">Nos résidences</button>
                        <Menu ref="menu1" :popup="true" class="flex" :model="items"></Menu>
                        <router-link to="/user/service" v-if="!isConnect" class="text-blue-0 px-4">Service</router-link>
                        <router-link to="/contact" class="text-blue-0 px-4">contact</router-link>
                    </nav>
                </div>
                <div class="flex items-center text-gray-500">
                    <span v-if="isConnect" class="material-icons-outlined text-blue-0 p-2 relative cursor-pointer">
                        <i class="fa-brands fa-facebook  mx-2" style="font-size: 1.9rem"></i>
                        <i class="fa-brands fa-instagram  mx-2" style="font-size: 1.9rem"></i>
                        <i class="fa-brands fa-x-twitter  mx-2" style="font-size: 1.9rem"></i>
                    </span>
                    <span v-if="!isConnect" class="material-icons-outlined text-blue-0 p-2 relative cursor-pointer">
                        <i class="fa-solid fa-bell mx-3" style="font-size: 1.9rem"></i>
                        <i class="fa-brands fa-facebook-messenger" style="font-size: 1.9rem"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from '@/_Service/caller.service'
import Menu from 'primevue/menu';
import SideBarMenu from './SideMenu.vue';
export default {
    name: 'Header',
    components: {
        Menu, SideBarMenu
    },
    data() {
        return {
            items: [
                { label: 'Type de logement', command: () => this.$router.push("/accueil") },
                { label: 'Logement pour etudiant', command: () => this.$router.push("/user/residences") },
                { label: 'Espace Social' },
                { label: "Espace d'étude" },
                { label: 'Nos Services' },
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
<style>
.p-menuitem-link {
    text-decoration-line: none;
    padding: 10px;
    margin: 4px 0 4px 0;
}

.p-menu-list {
    margin: 4px;
    padding: 0;
    width: 100%;
}

.p-menuitem-content:hover {
    background: #D7E4F5;
    color: aliceblue;
}

.p-sidebar-header {
    position: absolute;
    right: 0;
}
</style>