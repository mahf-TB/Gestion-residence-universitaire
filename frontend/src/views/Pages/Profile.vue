<template>
    <div>
        <Header v-if="user.type == 'user'"></Header>
        <div class="relative bg-blue-0 text-blue-4">
            <main class="container flex justify-between pt-2">
                <div class="w-2/3 flex flex-col mt-2">
                    <div class="bg-fotsy pt-3 rounded-xl flex">
                        <section class=" w-full">
                            <!-- header profile -->
                            <div>
                                <div class="flex justify-start">
                                    <div class="px-1 py-2 mx-2">
                                        <a href="/admin/dashboard"
                                            class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                                            <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                                <g>
                                                    <path
                                                        d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="mx-2">
                                        <h2 class="mb-0 text-xl font-bold text-blue-4">{{ etudiant ? etudiant.nom + ' '
                                            +
                                            etudiant.prenom : user.username }}</h2>
                                        <p class="mb-0 w-48 text-xs text-gray-600">{{ user.type ==
                                            'user' ? 'Etudiant' : 'Administratif' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- User card-->
                            <div>
                                <!-- PDC d'un utilisateur -->
                                <div class="w-full bg-cover bg-no-repeat bg-center h-64">
                                    <img class=" w-full h-full object-cover object-center"
                                        :src="require('@/assets/image/EtudiantCode.jpg')" alt="">
                                </div>
                                <div class="px-4 pt-4">
                                    <div class="relative flex justify-between w-full">
                                        <!-- Avatar PDP -->
                                        <div class="flex flex-1">
                                            <div style="margin-top: -4rem;">
                                                <div style="height:9rem; width:9rem;"
                                                    class="md rounded-full relative avatar">
                                                    <img style="height:9rem; width:9rem;"
                                                        class="md rounded-full relative border-4 border-gray-200"
                                                        src="https://pbs.twimg.com/profile_images/1254779846615420930/7I4kP65u_400x400.jpg"
                                                        alt="">
                                                    <div class="absolute"></div>
                                                </div>
                                            </div>
                                            <!-- User basic-->
                                            <div class="mx-2">
                                                <h2 class="text-lg leading-6 font-bold text-blue-4">{{ user.username }}
                                                </h2>
                                                <p class="text-sm leading-5 font-medium text-gray-500">{{ user.email }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col-reverse">
                                            <!-- Statistique d'user -->
                                            <div
                                                class="pt-3 flex justify-start items-start w-full divide-x divide-gray-100 divide-solid">
                                                <div class="text-center px-3"><span
                                                        class="font-bold text-blue-4">10</span><span
                                                        class="text-gray-600">
                                                        Publication</span></div>
                                                <div class="text-center px-3"><span class="font-bold text-blue-4">20
                                                    </span><span class="text-gray-600">Commande</span></div>
                                                <div class="text-center px-3"><span class="font-bold text-blue-4">2
                                                    </span><span class="text-gray-600">Demande</span></div>
                                            </div>
                                            <!-- Follow Button -->
                                            <div class="flex flex-col text-right">
                                                <button
                                                    class="flex justify-center text-fotsy max-h-max whitespace-nowrap   rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
                                                    <i class="fa-solid  fa-pen mr-2"></i>Modifier Profile
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="border-gray-00">
                                    <!-- Profile info -->
                                    <div class="flex justify-start w-full mt-3 ml-3">
                                        <!-- Description and others -->
                                        <div class="text-center px-3 py-2 border-b-4 border-blue-2 text-blue-2">
                                            <span class="font-bold"> Publication</span>
                                        </div>
                                        <div class="text-center px-3 py-2 text-blue-4">
                                            <span class="font-bold">Commande</span>
                                        </div>
                                        <div class="text-center px-3 py-2 text-blue-4">
                                            <span class="font-bold">Demande</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
                            <div class="flex my-2 items-center" v-for="(data,index) in 4" :key="index">
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

export default {
    name: 'Profile',
    components: {
        Publication, ListePublicationVue, Header
    },
    data() {
        return {
            dataArray: [],
            user: [],
            etudiant: [],
        }
    },
    mounted() {
        this.getUser()
        this.getAllReparations()
    },
    methods: {
        async getAllReparations() {
            try {
                var response = await Axios.get('/index_pub?params=user')
                console.log(response)
                this.dataArray = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        async getUser() {
            let token = JSON.parse(localStorage.getItem('token'))
            if (token) {
                const res = await Axios.get('userConnect')
                if (res.data.status == 'success') {
                    this.user = res.data.user
                    this.etudiant = res.data.etudiant
                    console.log(this.etudiant)
                }
            }
        },
    }
}
</script>