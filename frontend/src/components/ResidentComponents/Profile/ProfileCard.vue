<template>
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
                        'user' ? 'Etudiant' : 'Administration' }}</p>
                </div>
            </div>
        </div>
        <!-- User card-->
        <div>
            <!-- PDC d'un utilisateur -->
            <div class="w-full bg-cover bg-no-repeat bg-center relative h-64 overflow-hidden group">
                <img class=" w-full h-full object-cover object-center" :src="require('@/assets/image/EtudiantCode.jpg')"
                    alt="photo de couverture">
                <div
                    class="absolute  group-hover:top-0 left-0 w-full h-full group-hover:bg-slate-900/60 transition-all ease-in-out duration-500">
                    <div
                        class="absolute -bottom-5 flex items-end justify-end w-full text-white text-left transition-all ease-in-out duration-500">
                        <div class="mx-3 flex">
                            <label for="filecc"
                                class="text-sm font-light cursor-pointer bg-slate-200 text-slate-900 p-2 mb-4 mx-1 rounded">
                                <i class="fa-solid fa-camera mx-2"></i> <span>Ajouter un
                                    photo</span>
                            </label>
                            <h2 v-if="pdc != null"
                                class="text-sm font-light cursor-pointer bg-slate-200 text-slate-900 p-2 mb-4  mx-1 rounded">
                                <i class="fa-solid fa-upload mx-2"></i><span>Enregistrer</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 pt-4">
                <div class="relative flex-col xl:flex-row flex justify-between w-full">
                    <!-- Avatar PDP -->
                    <input type="file" id="fileImagePdp" @change="handleFileUpload" hidden />
                    <div class="flex  flex-1">
                        <div style="margin-top: -4rem;">
                            <div style="height:9rem; width:9rem;"
                                class="md rounded-full relative avatar overflow-hidden group">
                                <img style="height:9rem; width:9rem;"
                                    class="md rounded-full object-cover object-center relative border-4  z-0 border-gray-200"
                                    :src="fileImagePdp == null ? photo : pdp"
                                    alt="photo de profile">
                                <label for="fileImagePdp"
                                    class="absolute cursor-pointer group-hover:top-0 left-0 w-full h-full  group-hover:bg-slate-900/60 transition-all ease-in-out duration-500">
                                    <div
                                        class="absolute  flex items-start justify-center w-full group-hover:-top-16 text-white text-left transition-all ease-in-out duration-500">
                                        <h2 class="text-3xl font-bold text-white pt-32 mb-4">
                                            <i class="fa-solid fa-camera"></i>
                                        </h2>
                                    </div>
                                </label>
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
                        <div class="pt-3 flex justify-start items-start w-full divide-x divide-gray-100 divide-solid">
                            <div class="text-center px-3">
                                <span class="font-bold text-blue-4">10</span>
                                <span class="text-gray-600"> Publication</span>
                            </div>
                            <div class="text-center px-3">
                                <span class="font-bold text-blue-4">20 </span>
                                <span class="text-gray-600">Commande</span>
                            </div>
                            <div class="text-center px-3">
                                <span class="font-bold text-blue-4">2 </span>
                                <span class="text-gray-600">Demande</span>
                            </div>
                        </div>
                        <!-- Follow Button -->
                        <div class="flex flex-col text-right">
                            <button v-if="fileImagePdp == null"
                                class="flex justify-center text-fotsy max-h-max whitespace-nowrap   rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
                                <i class="fa-solid  fa-pen mr-2"></i>Modifier Profile
                            </button>
                            <button v-else 
                                class="flex justify-center text-fotsy max-h-max whitespace-nowrap   rounded max-w-max  items-center  font-light py-2 px-3  mr-0 ml-auto">
                                <!-- <i class="fa-solid fa-upload mx-2"></i>Enregistrer -->
                                <div @click="fileImagePdp=null" class="hover:shadow-lg hover:bg-red-100 rounded p-2 text-red-600">
                                    <span><i class="fa-solid fa-upload mx-2"></i>Annuler</span>
                                </div>
                                <div  @click="saveImage()" class="hover:shadow-lg hover:bg-green-100 rounded p-2 text-green-600">
                                    <span><i class="fa-solid fa-upload mx-2"></i>Enregistrer</span>
                                </div>
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
</template>
<script>

import Axios from '@/_Service/caller.service';
export default {
    name: 'ProfileCard',
    components: {

    },
    data() {
        return {
            user: [],
            etudiant: [],
            fileImagePdp: null,
            pdc:null,
            photo: null,
            pdp: null,
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
                    this.user = res.data.user
                    if (this.user.photo) {
                        this.photo = this.user.photo
                    }else{
                        this.photo = require('@/assets/image/pdpNone.jpeg')
                    }
                    this.etudiant = res.data.etudiant
                    
                }
            }
        },
        async saveImage() {
            const formData = new FormData();
            formData.append('photo', this.fileImagePdp);
            try {
                const res = await Axios.post('uploadPhoto', formData)
                console.log(res.data)
                this.getUser()
                this.fileImagePdp = null;
            } catch (error) {
                console.log(error)
            }

        },
        handleFileUpload(event) {
            let file = event.target.files[0];
            if (file.type.match("image/*")) {
                console.log(file)
                let objectURL = URL.createObjectURL(file);
                this.fileImagePdp = file
                this.pdp = objectURL
            }
        },
    }
}
</script>