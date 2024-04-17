<template>
    <div class="">
        <haut-header-vue></haut-header-vue>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow py-[2px] text-blue-800  z-10 w-full">
            <div class="container flex items-center justify-between h-[65px]">
                <div class="text-blue-0 h-full ">
                    <nav class="h-full text-[14px] flex items-center">
                        <router-link to="/admin/dashboard" :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/dashboard' }"
                        class="text-blue-0 px-4 h-full  flex items-center transition-all hover:border-b-4 hover:border-blue-0">
                            Dashboard
                        </router-link>|
                        <Button @click="$refs.menu1.toggle($event)"   :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/etudiant' || $route.path === '/admin/listeReservation' || $route.path === '/admin/logement'}"
                            class="text-blue-0 uppercase px-4 h-full  flex items-center transition-all hover:border-b-4 hover:border-blue-0">
                            Réservation
                        </Button>| 
                        <Menu ref="menu1" :popup="true" class="flex"   :model="items"></Menu>
                        <router-link to="/admin/listeMaintenace" :class="{ 'border-b-4 border-blue-0' : $route.path === '/admin/listeMaintenace' }"
                        class="text-blue-0 px-4  h-full  flex items-center transition-all hover:border-b-4 hover:border-blue-0">
                            Maintenance
                        </router-link>|
                        <Button @click="$refs.menu2.toggle($event)" :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/liste-commande' || $route.path === '/admin/restaurent' || $route.path === '/admin/logement' }"
                            class="text-blue-0 px-4 uppercase h-full  flex items-center transition-all hover:border-b-4 hover:border-blue-0">
                            Service <span class="lowercase mx-1">et</span> Activités
                        </Button>
                        <Menu ref="menu2" :popup="true" class="flex"   :model="items1"></Menu>
                    </nav>
                </div>
                <div class="flex items-center text-gray-500">
                    <span v-if="isConnect" class="material-icons-outlined text-blue-0 p-2 relative cursor-pointer">
                        <i class="fa-brands fa-facebook  mx-2" style="font-size: 1.4rem"></i>
                        <i class="fa-brands fa-instagram  mx-2" style="font-size: 1.4rem"></i>
                        <i class="fa-brands fa-x-twitter  mx-2" style="font-size: 1.4rem"></i>
                    </span>
                    <span v-if="!isConnect" class="material-icons-outlined text-blue-0 p-2 relative cursor-pointer">
                        <i class="fa-solid fa-bell mx-3" style="font-size: 1.4rem"></i>
                        <i class="fa-brands fa-facebook-messenger" style="font-size: 1.4rem"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Menu from 'primevue/menu'
import HautHeaderVue from '../HautHeader.vue'
export default {
    name: 'Header',
    components: {
        HautHeaderVue,Menu
    },
    data() {
        return {
            items: [
                { label: 'Réservation de Logement', command: () => this.$router.push("/admin/listeReservation") },
                { label: 'Liste des étudiants', command: () => this.$router.push("/admin/etudiant") },
                { label: 'Liste des logements', command: () => this.$router.push("/admin/logement") },
            ],
            items1: [
                { label: 'Commande des etudiant', command: () => this.$router.push("/admin/liste-commande") },
                { label: 'Restaurent Interne', command: () => this.$router.push("/admin/restaurent") },
                { label: 'Autre Service', command: () => this.$router.push("/admin/logement") },
            ],
           routeClass: 'border-b-4 border-blue-0'
        }
    },
    computed: {
        isConnect() {
            let user = localStorage.getItem('token')
            if (user) {
                return false
            }
            return true
        }
    },
    mounted() {

    },
    methods: {
        deconnect() {
            localStorage.removeItem('user-info');
            this.$router.push("/login");
        }
    },
  
}
</script>