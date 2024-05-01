<template>
    <div class="">
        <haut-header-vue></haut-header-vue>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow py-[1px] text-blue-800  z-10 w-full">
            <div class="container flex items-center justify-between h-[65px]">
                <div class="text-blue-0 h-full ">
                    <nav class="h-full text-[14px] flex items-center">
                        <div class="h-full" v-for="(data, index) in items" :key="index">
                            <Button @click="data.command" v-if="user.type == data.type"
                                :class="{ 'border-b-4 border-blue-0': $route.path === data.route }"
                                class=" text-blue-0 uppercase px-4 h-full  flex items-center transition-all  hover:bg-blue-1">
                                {{ data.label }}
                            </Button>
                        </div>    
                    </nav>
                </div>
                <div class="flex items-center text-gray-500">
                    <span class="material-icons-outlined text-blue-0 p-2 relative cursor-pointer flex ">
                        <div @click="this.$router.push('/admin/messenger')" :class="{ 'text-blue-4': $route.path === '/admin/messenger' }"
                        class="px-2 h-full relative" >
                            <i class="fa-brands fa-facebook-messenger" style="font-size: 1.4rem"></i>
                            <span class="absolute -top-2 right-1 text-[8px] px-[6px] py-[2px] rounded-full bg-red-500 text-fotsy">1</span>
                        </div>
                        <div class="px-2 relative" >
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
import Axios from '@/_Service/caller.service'
import Menu from 'primevue/menu'
import HautHeaderVue from '../HautHeader.vue'
export default {
    name: 'HeaderPersonnel',
    components: {
        HautHeaderVue, Menu
    },
    data() {
        return {
            items: [
                { label: 'Tableau de bord', command: () => this.$router.push("/admin/dashboard-accueil"), route: '/admin/dashboard-accueil', type: 'P-accueil' },
                { label: 'Réservation de Logement', command: () => this.$router.push("/admin/listeReservation"), route: '/admin/listeReservation', type: 'P-accueil' },
                { label: 'Liste des étudiants', command: () => this.$router.push("/admin/etudiant"), route: '/admin/etudiant', type: 'P-accueil' },
                { label: 'Liste des logements', command: () => this.$router.push("/admin/logement"), route: '/admin/logement', type: 'P-accueil' },


                { label: 'Tableau de bord', command: () => this.$router.push("/admin/dashboard-service"), route: '/admin/dashboard-service', type: 'P-service' },
                { label: 'Commande des etudiant', command: () => this.$router.push("/admin/liste-commande"), route: '/admin/liste-commande', type: 'P-service' },
                { label: 'Restaurent Interne', command: () => this.$router.push("/admin/restaurent"), route: '/admin/restaurent', type: 'P-service' },
                { label: 'Autre Service', command: () => this.$router.push("/admin/service"), route: '/admin/service', type: 'P-service' },

                { label: 'Tableau de bord', command: () => this.$router.push("/admin/dashboard-maintenance"), route: '/admin/dashboard-maintenance', type: 'P-maintenance' },
                { label: 'Demande Maintenance', command: () => this.$router.push("/admin/listeMaintenace"), route: '/admin/listeMaintenace', type: 'P-maintenance' },
            ],
            items1: [
            ],
            routeClass: 'border-b-4 border-blue-0',
            user: ''
        }
    },
    computed: {

    },
    mounted() {
        this.getUser()
    },
    methods: {
        async getUser() {
            let token = JSON.parse(localStorage.getItem('token'))
            if (token) {
                const res = await Axios.get('userConnect')
                this.user = res.data.user

            }
        },
    }

}
</script>