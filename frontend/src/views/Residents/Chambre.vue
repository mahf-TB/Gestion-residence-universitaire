<template>
    <div class="">
        <div class="relative bg-blue-0 text-blue-4">
            <main class="container flex justify-between pt-2">
                <div class="w-2/3 flex flex-col mt-2">
                    <div class="bg-fotsy rounded-xl flex">
                        <section class=" w-full">
                            <div>
                                <!-- PDC d'un utilisateur -->
                                <div class="w-full bg-cover bg-no-repeat bg-center relative h-64 overflow-hidden ">
                                    <img class=" w-full h-full object-cover object-center rounded-t-xl"
                                        :src="logement.imageUrl == '' ? require('@/assets/image/EtudiantCode.jpg') : logement.imageUrl"
                                        alt="">
                                    <div class="mx-3 flex absolute right-0 bottom-0">
                                        <label
                                            class="text-sm z-10 font-light cursor-pointer bg-slate-200 text-slate-900 p-2 mb-1 mx-1 rounded">

                                            <span>Numéro {{ logement.num_logement }}, {{ logement.type_logement
                                                }}</span>
                                        </label>
                                    </div>
                                    <input type="file" id="fileInput" @change="handleFileUpload" hidden />

                                </div>
                                <div class="px-4 pt-4">
                                    <div class="relative flex justify-between w-full">
                                        <!-- Avatar PDP -->
                                        <div class="flex items-center">
                                            <div>
                                                <div class="md rounded-full relative avatar overflow-hidden group">
                                                    <img class="h-16 w-16 rounded-full object-cover relative border-4  z-0 border-gray-200"
                                                        :src="user.photo ? user.photo : require('@/assets/image/pdpNone.jpeg')"
                                                        alt="">
                                                </div>
                                            </div>
                                            <!-- User basic-->
                                            <div class="mx-2">
                                                <h2 class="text-lg leading-6 font-bold text-blue-4">{{ user.username }}
                                                </h2>
                                                <p class="text-sm leading-5 m-0 font-medium text-gray-500">{{ user.email
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col-reverse">

                                        </div>
                                    </div>
                                    <hr class="border-gray-00">
                                    <!-- Profile info -->
                                    <div class="flex justify-start w-full mt-3 ml-3">
                                        <!-- Description and others -->
                                        <div class="text-center px-3 py-2 border-b-4 border-blue-2 text-blue-2">
                                            <span class="font-bold"> Toutes</span>
                                        </div>
                                        <div class="text-center px-3 py-2 text-blue-4">
                                            <span class="font-bold">En commun</span>
                                        </div>
                                        <div class="text-center px-3 py-2 text-blue-4">
                                            <span class="font-bold">Votre kit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="mt-3">
                        <div class="bg-fotsy px-3 py-3 rounded-xl shadow-sm">
                            <div class="flex items-center justify-between w-full">
                                <div class="flex flex-col text-right">
                                    <button
                                        class="flex justify-center text-fotsy max-h-max whitespace-nowrap  hover:bg-blue-1  rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
                                        <i class="fa-solid fa-upload mx-2"></i>Enregistrer votre materiele
                                    </button>
                                </div>
                                <div
                                    class="mx-1 px-4 py-2 flex text-blue-2 hover:bg-blue-1 hover:text-blue-0 rounded transition-all cursor-pointer">
                                    <img :src="require('@/assets/icon-image.png')" class="mx-2 object-cover" height="24"
                                        width="24" alt="photo de profile">
                                    <span class="uppercaose mx-1 font-bold text-base">
                                        Photo/Video
                                    </span>
                                </div>
                            </div>
                            <div class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                            <div class="flex items-center">

                            </div>
                        </div>
                        <div v-if="dataArray == ''" class="my-2">
                            <div class=" h-full p-2 text-center">
                                <span class="font-semibold text-lg text-blue-2">Aucune publication disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 mt-1 mx-4">
                    <div class="bg-fotsy my-2 px-4  py-3 rounded-xl shadow-sm">
                        <div class="flex flex-col">
                            <div class="flex my-1 items-center">
                                <div>
                                   Demande de changement de logement
                                </div>
                                <button
                                    class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:text-blue-1  rounded-full hover:bg-slate-200 font-light  p-3 mr-0 ml-auto">
                                    <i class="fa-solid  fa-pen"></i>
                                </button>
                            </div>
                            <hr class="border-gray-00">
                        </div>
                    </div>
                    <div class="bg-fotsy my-2 px-4 py-3 rounded-xl shadow-sm">
                        <div class="flex flex-col">
                            <div class="flex my-2 items-center">
                                <div class="font-bold text-blue-2">
                                    Votre Collocateur
                                </div>

                            </div>
                            <div class="flex my-2 items-center" v-for="(data, index) in colloc" :key="index">
                                <div class="flex items-center justify-start">
                                    <div
                                        class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
                                        <img :src="require('@/assets/image/joie1.jpg')"
                                            class="h-12 w-12 object-cover rounded-full" alt="photo de profile">
                                    </div>
                                    <div class="pt-2 ml-2">
                                        <div class="font-bold">
                                            {{ data.nom + ' ' + data.prenom }}
                                        </div>
                                        <h1 class="text-[12px] text-gray-500  font-Avenir">Etudiant</h1>
                                    </div>
                                </div>

                                <button
                                    class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
                                    Voir plus
                                </button>
                            </div>
                            <div v-if="colloc == ''" class="flex my-2 items-center">
                                <span>Aucun Collocateur</span>
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
                                        class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-md inline-block h-12 w-12  ml-2">
                                        <img :src="require('@/assets/image/joie1.jpg')"
                                            class="h-12 w-12 object-cover rounded-md" alt="photo de profile">
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
export default {
    name: 'Chambre',
    components: {
    },
    data() {
        return {
            user: [],
            etudiant: [],
            logement: [],
            colloc: []
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        async getUser() {
            let token = JSON.parse(localStorage.getItem('token'))
            if (token) {
                const res = await Axios.get('userConnect')
                if (res.data.status == 'success') {
                    console.log(res.data)
                    this.user = res.data.user
                    this.etudiant = res.data.etudiant
                    this.logement = res.data.logement
                    this.colloc = res.data.colloc
                }
            }
        },
    },

}
</script>