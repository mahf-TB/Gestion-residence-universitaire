<template>
    <div class="relative">
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
                <button class="btn btn-primary" v-if="isConnect">
                    <router-link to="/login" class="text-blue-0 font-light">se connecter</router-link>
                </button>
                <div v-if="!isConnect" @click="deconnect()"
                    class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2"
                    style="background-image: url(https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg)">
                </div>
            </div>
        </div>
        <div class="sticky top-0 bg-blue-2 transition duration-[400ms] shadow text-blue-800  py-1 z-10 w-full">
            <div class="container flex items-center justify-between py-2 ">
                <div class="text-blue-0 ">
                    <nav>
                        <router-link to="/accueil" class="text-blue-0 px-4">Accueil</router-link>
                        <router-link to="/user/residences" v-if="!isConnect"  class="text-blue-0 px-4">Nos résidences</router-link>
                        <router-link to="/activites" class="text-blue-0 px-4">Activités</router-link>
                        <router-link to="/user/service" class="text-blue-0 px-4">Service</router-link>
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
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted } from 'vue'
export default {
    name: 'Header',
    components: {

    },
    data() {
        return {
            isUser: false
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
        deconnect() {
            localStorage.removeItem('user-info');
            this.$router.push("/login");
        },
        

    },
}
</script>
