<template>
    <div class="relative">
        <haut-header-vue></haut-header-vue>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow text-blue-800  py-1 z-10 w-full">
            <div class="container flex items-center justify-between py-2 ">
                <div class="text-blue-0 ">
                    <nav>
                        <router-link to="/accueil" class="text-blue-0 px-4">Accueil</router-link>
                        <router-link to="/activites" class="text-blue-0 px-4"> Activités</router-link>
                        <button @click="$refs.menu1.toggle($event)" v-if="!isConnect"
                            class="text-blue-0 px-4 uppercase">Nos résidences
                        </button>
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
import HautHeaderVue from '../HautHeader.vue';
export default {
    name: 'Header',
    components: {
        Menu,HautHeaderVue
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

</style>