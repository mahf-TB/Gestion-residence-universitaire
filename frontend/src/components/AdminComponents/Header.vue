<template>
    <div class="">
        <div class="flex items-center justify-between  bg-blue-4 py-2 px-20">
            <div class="flex items-center jus">
                <img class="w-[100px] h-[100px]" :src="require('@/assets/LC.png')" alt="logo pour le residence" />
                <h1 class="text-blue-0 text-[28px]">Lodge Cité <br /> Universitaire</h1>
            </div>
            <div class="flex items-center justify-around lowercase">
                <div class="flex justify-center flex-col text-sm mr-4 text-blue-0">
                    <span><i class="fa-solid fa-phone pr-2"></i>+261 33 17 189 39</span>
                    <span>
                        <i class="fa-solid fa-envelope pr-2"></i>lodgecite.univ@gmail.com</span>
                </div>
                <side-bar-menu></side-bar-menu>
            </div>
        </div>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow text-blue-800  py-1 z-10 w-full">
            <div class="container flex items-center justify-between py-2 ">
                <div class="text-blue-0 ">
                    <nav>
                        <router-link to="/accueil" class="text-blue-0 px-4">Dashboard</router-link>|
                        <router-link to="" class="text-blue-0 px-4">Etudiants</router-link>|
                        <router-link to="" class="text-blue-0 px-4">Logement</router-link>|
                        <router-link to="" class="text-blue-0 px-4">Service</router-link>
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
import SideBarMenu from '../ResidentComponents/SideMenu.vue'
export default {
    name: 'Header',
    components: {
        SideBarMenu
    },
    computed: {
        isConnect() {
            let user = localStorage.getItem('user-info')
            if (user) {
                return false
            }
            return true
        }
    },
    mounted(){
        
    },
    methods: {
        deconnect() {
            localStorage.removeItem('user-info');
            this.$router.push("/login");
        }
    }
}
</script>