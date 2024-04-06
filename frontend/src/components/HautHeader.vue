<template>
    <div class="md:flex items-center justify-between  bg-blue-4 py-2 px-20">
            <div class="flex items-center justify-center cursor-pointer" @click="this.$router.push('/accueil')">
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
</template>
<script>

import SideBarMenu from './SideMenu.vue';

export default{
    name:'HautHeader',
    components:{
        SideBarMenu
    },
    data(){
        return{

        }
    }, 
    computed: {
        isConnect() {
            let user = JSON.parse(localStorage.getItem('user-info'))
            if (user) {
                return false
            }
            return true
        }
    },
    
}
</script>