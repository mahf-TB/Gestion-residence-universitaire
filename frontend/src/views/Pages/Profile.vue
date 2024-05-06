<template>
    <div>
        <Header></Header>
        <div class="relative bg-blue-0 text-blue-4">
            <main class="container flex justify-between pt-2">
                <div class="w-2/3 flex flex-col mt-2">
                    <div class="bg-fotsy pt-3 rounded-xl flex">
                        <profile-card-vue></profile-card-vue>
                    </div>
                    <div class="mt-3">
                        <div class="bg-fotsy px-3 py-3 rounded-xl shadow-sm">
                            <div class="flex w-full">
                                <img :src="require('@/assets/image/pdpNone.jpeg')"
                                    class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full"
                                    alt="photo de profile">
                                <publication></publication>
                            </div>
                            <div class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                            <div class="flex items-center">
                                <div
                                    class="mx-1 px-4 py-2 flex text-blue-2 hover:bg-blue-1 hover:text-blue-0 rounded transition-all cursor-pointer">
                                    <img :src="require('@/assets/icon-image.png')" class="mx-2 object-cover" height="24"
                                        width="24" alt="photo de profile">
                                    <span class="uppercaose mx-1 font-bold text-base">
                                        Photo/Video
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="container py-1 my-3" v-for="(data, i) in dataArray" :key="i">
                            <ListePublicationVue class="bg-fotsy hover:bg-gray-50" :data="data">
                            </ListePublicationVue>
                        </div>
                        <div v-if="dataArray == ''" class="my-2">
                            <div class=" h-full p-2 text-center">
                                <span class="font-semibold text-lg text-blue-2">Aucune publication disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 mt-1 mx-4">
                    <div class="bg-fotsy my-2 px-4 py-3 rounded-xl shadow-sm">
                        <div class="flex flex-col">
                            <div class="flex my-1 items-center">
                                <div>
                                    Information Personnel
                                </div>
                                <button
                                    class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:text-blue-1  rounded-full hover:bg-slate-200 font-light  p-3 mr-0 ml-auto">
                                    <i class="fa-solid  fa-pen"></i>
                                </button>
                            </div>
                            <hr class="border-gray-00">
                            <div class="flex my-1 items-center">
                                <div>
                                    Securité de votre compte
                                </div>
                                <button
                                    class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:text-blue-1  rounded-full hover:bg-slate-200 font-light  p-3 mr-0 ml-auto">
                                    <i class="fa-solid  fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-fotsy my-2 px-4 py-3 rounded-xl shadow-sm">
                        <div class="flex flex-col">
                            <div class="flex my-2 items-center">
                                <div class="font-bold text-blue-2">
                                    Votre groupe
                                </div>

                            </div>
                            <div class="flex my-2 items-center">
                                <div class="flex items-center justify-start">
                                    <div
                                        class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
                                        <img :src="require('@/assets/image/joie1.jpg')"
                                            class="h-12 w-12 object-cover rounded-full" alt="photo de profile">
                                    </div>
                                    <div class="pt-2 ml-2">
                                        <div class="font-bold">
                                            Club Handball LC
                                        </div>
                                        <h1 class="text-[12px] text-gray-500  font-Avenir">Administrateur</h1>
                                    </div>
                                </div>

                                <button
                                    class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
                                    Voir plus
                                </button>
                            </div>
                            <hr class="border-gray-00">
                            <div class="flex my-2 items-center">
                                <div class="font-bold text-blue-2">
                                    Groupe que vous avez membres
                                </div>
                            </div>
                            <div class="flex my-2 items-center" v-for="(data, index) in 4" :key="index">
                                <div class="flex items-center justify-start">
                                    <div
                                        class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
                                        <img :src="require('@/assets/image/joie1.jpg')"
                                            class="h-12 w-12 object-cover rounded-full" alt="photo de profile">
                                    </div>
                                    <div class="pt-2 ml-2">
                                        <div class="font-bold">
                                            Programmation Java
                                        </div>
                                        <h1 class="text-[12px] text-gray-500  font-Avenir">Nouveaux membre</h1>
                                    </div>
                                </div>

                                <button
                                    class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
                                    Savoir plus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import Publication from '@/components/ResidentComponents/Publication.vue'
import ListePublicationVue from '@/components/ResidentComponents/ListePublication.vue'
import Header from '@/components/ResidentComponents/Header.vue';
import ProfileCardVue from '../../components/ResidentComponents/Profile/ProfileCard.vue';
export default {
    name: 'Profile',
    components: {
        Publication, ListePublicationVue, Header, ProfileCardVue
    },
    data() {
        return {
            dataArray: [],
        }
    },
    mounted() {

        this.getAllReparations()
    },
    methods: {
        async getAllReparations() {
            try {
                var response = await Axios.get('/index_pub?params=user')
                this.dataArray = response.data;
            } catch (error) {
                console.error(error);
            }
        },

    }
}
</script>