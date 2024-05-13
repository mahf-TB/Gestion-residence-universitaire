<template>
    <div class="relative">
        <!-- <haut-header-vue></haut-header-vue> -->
        <div class=" bg-fotsy transition duration-[400ms] shadow text-blue-1  pt-1 z-10 w-full">
            <div class="flex h-[65px] items-center justify-between  px-4">
                <div class="w-2/4 lg:w-1/4 flex items-center">
                    <side-menu :menu="true"></side-menu>
                    <div class="relative max-w-lg w-full mb-1 ">
                        <div class="absolute top-1 left-2 inline-flex items-center p-2">
                            <i class="fas fa-search text-gray-400 "> </i>
                        </div>
                        <input v-model="query"
                            class="w-full h-10 pl-10 pr-4 py-1 text-base bg-blue-0 placeholder-gray-500 rounded-full border-0"
                            type="search" placeholder="Recherche..." />
                    </div>
                </div>
                <div class="w-2/4  h-full text-blue-4 mx-5 hidden lg:flex items-center justify-between ">
                    <nav class="text-[18px] h-full w-full flex   items-center justify-center">
                        <router-link to="/user/home"
                            :class="{ 'text-blue-700 border-b-2 border-blue-2': $route.path === '/user/home' }"
                            class="text-blue-4  h-full px-9 lg:px-10 xl:px-16 2xl:px-20 flex items-center justify-center flex-col  transition-all ">
                            <i class="fa-solid fa-house-chimney" style="font-size: 1.4rem"></i>
                            <span class="text-xs lowercase font-extralight">Accueil</span>
                        </router-link>
                        <router-link to="/user/evenement"
                            :class="{ 'text-blue-700 border-b-2 border-blue-2': $route.path === '/user/evenement' }"
                            class="text-blue-4 h-full  px-9  lg:px-10 xl:px-16  2xl:px-20 flex items-center justify-center flex-col  transition-all ">
                            <i class="fa-solid fa-calendar-days" style="font-size: 1.4rem"></i>
                            <span class="text-xs lowercase font-extralight">Évenement</span>
                        </router-link>
                        <router-link to="/user/service"
                            :class="{ 'text-blue-700 border-b-2 border-blue-2': $route.path === '/user/service' }"
                            class="text-blue-4 h-full  px-9  lg:px-10 xl:px-16  2xl:px-20 flex items-center justify-center flex-col transition-all ">
                            <span class="flex">
                                <i class="fa-solid fa-bell-concierge" style="font-size: 1.4rem"></i>
                                <i class="fa-solid fa-utensils" style="font-size: 1.4rem"></i>
                            </span>
                            <span class="text-xs lowercase font-extralight">Service</span>
                        </router-link>
                        <router-link to="/user/maintenance"
                            :class="{ 'text-blue-700 border-b-2 border-blue-2': $route.path === '/user/maintenance' }"
                            class="text-blue-4 h-full  px-9  lg:px-10 xl:px-16  2xl:px-20 flex items-center justify-center flex-col transition-all">
                            <i class="fa-solid fa-briefcase" style="font-size: 1.4rem"></i>
                            <span class="text-xs lowercase font-extralight">Maintenance</span>
                        </router-link>

                    </nav>
                </div>
                <div
                    class="w-2/4 lg:w-1/4 flex items-center justify-end px-3 lg:px-0 lg:justify-center h-full text-gray-500">
                    <span class="material-icons-outlined text-blue-0 relative h-full flex items-center">
                        <div @click="this.$router.push('/user/messenger')"
                            :class="{ 'text-blue-700': $route.path === '/user/messenger' }"
                            class="text-blue-4 px-2 cursor-pointer h-full flex items-center relative">
                            <i class="fa-brands fa-facebook-messenger" style="font-size: 1.4rem"></i>
                            <!-- <span
                                class="absolute top-2 right-1 text-[8px] px-[6px] py-[2px] rounded-full bg-red-500 text-fotsy">5</span> -->
                        </div>
                        <notif-card></notif-card>

                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service'
import HautHeaderVue from '../HautHeader.vue';
import CardPanierVue from './CardPanier.vue';
import NotifCard from './NotifCard.vue';
import SideMenu from '../SideMenu.vue';

export default {
    name: 'Header',
    components: {
        HautHeaderVue, CardPanierVue,
        NotifCard,
        SideMenu
    },

    computed: {
    },
    methods: {


    },
}
</script>
<style></style>