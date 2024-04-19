<template>
    <div class="relative bg-blue-0 text-blue-4">
        <main class="pt-2">
            <div class="container bg-fotsy pt-3 rounded-xl flex">
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
                                <h2 class="mb-0 text-xl font-bold text-blue-4">ANDRIMAHEFA Bienvenu</h2>
                                <p class="mb-0 w-48 text-xs text-gray-600">Etudiant</p>
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
                                        <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                            <img style="height:9rem; width:9rem;"
                                                class="md rounded-full relative border-4 border-gray-200"
                                                src="https://pbs.twimg.com/profile_images/1254779846615420930/7I4kP65u_400x400.jpg"
                                                alt="">
                                            <div class="absolute"></div>
                                        </div>
                                    </div>
                                    <!-- User basic-->
                                    <div class="mx-2">
                                        <h2 class="text-xl leading-6 font-bold text-blue-4">ANDRIMAHEFA Bienvenu</h2>
                                        <p class="text-sm leading-5 font-medium text-gray-500">@bienvenu</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <!-- Statistique d'user -->
                                    <div
                                        class="pt-3 flex justify-start items-start w-full divide-x divide-gray-100 divide-solid">
                                        <div class="text-center px-3"><span class="font-bold text-blue-4">10</span><span
                                                class="text-gray-600"> Publication</span></div>
                                        <div class="text-center px-3"><span class="font-bold text-blue-4">20 </span><span
                                                class="text-gray-600">Commande</span></div>
                                        <div class="text-center px-3"><span class="font-bold text-blue-4">2
                                            </span><span class="text-gray-600">Demande</span></div>
                                    </div>
                                    <!-- Follow Button -->
                                    <div class="flex flex-col text-right">
                                        <button
                                            class="flex justify-center text-fotsy max-h-max whitespace-nowrap   rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-4 r mr-0 ml-auto">
                                            Modifier Profile
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <hr class="border-gray-400">
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
        </main>
        <div class="container flex mt-2">
            <div class="w-1/3">
                <h1>helloe</h1>
            </div>
            <div class="w-2/3">
                <div class="bg-fotsy px-3 py-3 rounded-xl shadow-sm">
                    <div class="flex w-full">
                        <img :src="require('@/assets/image/pdpNone.jpeg')"
                            class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full" alt="photo de profile">
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
            </div>
        </div>


    </div>

</template>

<script>

import Axios from '@/_Service/caller.service';
import Publication from '@/components/ResidentComponents/Publication.vue'
import ListePublicationVue from '@/components/ResidentComponents/ListePublication.vue'
export default {
    name: 'Profile',
    components: {
        Publication, ListePublicationVue
    },
    data() {
        return {
            dataArray: []
        }
    },
    mounted() {
        this.getAllReparations()
    },
    methods: {
        async getAllReparations() {
            try {
                var response = await Axios.get('/index_pub')
                console.log(response.data)
                this.dataArray = response.data;
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>