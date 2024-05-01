<template>
    <div class="">
        <haut-header-vue></haut-header-vue>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow py-[1px] text-blue-800  z-10 w-full">
            <div class="container flex items-center justify-between h-[65px]">
                <div class="text-blue-0 h-full ">
                    <nav class="h-full text-[14px] flex items-center">
                        <router-link to="/admin/dashboard"
                            :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/dashboard' }"
                            class="text-blue-0 px-4 h-full  flex items-center transition-all  hover:bg-blue-1 ">
                            Dashboard
                        </router-link>|
                        <Button @click="$refs.menu1.toggle($event)"
                            :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/etudiant' || $route.path === '/admin/listeReservation' || $route.path === '/admin/logement' }"
                            class="text-blue-0 uppercase px-4 h-full  flex items-center transition-all hover:bg-blue-1">
                            Réservation
                        </Button>|
                        <Menu ref="menu1" :popup="true" class="flex" :model="items"></Menu>
                        <router-link to="/admin/listeMaintenace"
                            :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/listeMaintenace' }"
                            class="text-blue-0 px-4  h-full  flex items-center transition-all  hover:bg-blue-1">
                            Maintenance
                        </router-link>|
                        <Button @click="$refs.menu2.toggle($event)"
                            :class="{ 'border-b-4 border-blue-0': $route.path === '/admin/liste-commande' || $route.path === '/admin/restaurent' || $route.path === '/admin/service' }"
                            class="text-blue-0 px-4 uppercase h-full  flex items-center transition-all  hover:bg-blue-1">
                            Service <span class="lowercase mx-1">et</span> Activités
                        </Button>
                        <Menu ref="menu2" :popup="true" class="flex" :model="items1"></Menu>
                    </nav>
                </div>
                <div class="flex items-center text-gray-500">
                    <span class="material-icons-outlined h-full text-blue-0 p-2 relative cursor-pointer flex">
                        <div @click="this.$router.push('/admin/messenger')" :class="{ 'text-blue-4': $route.path === '/admin/messenger' }"
                        class="h-full px-2 relative">
                            <i class="fa-brands fa-facebook-messenger" style="font-size: 1.4rem"></i>
                            <span class="absolute -top-2 right-1 text-[8px] px-[6px] py-[2px] rounded-full bg-red-500 text-fotsy">3</span>
                        </div>
                        <div class="h-full  px-2 relative">
                            <i class="fa-solid fa-bell" style="font-size: 1.4rem"></i>
                            <span class="absolute -top-2 right-1 text-[8px] px-[6px] py-[2px] rounded-full bg-red-500 text-fotsy">22</span>
                        </div>
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
        HautHeaderVue, Menu
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
                { label: 'Autre Service', command: () => this.$router.push("/admin/service") },
            ],
            routeClass: 'border-b-4 border-blue-0'
        }
    },
    computed: {

    },
    mounted() {

    },
    methods: {

    },

}
</script>