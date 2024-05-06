<template>
    <section class=" w-full">
        <!-- User card-->
        <div>
        
            <div class="px-4 pt-16">
                <div class="relative flex justify-between w-full">
                    <!-- Avatar PDP -->
                    <div class="flex items-center flex-1">
                        <div style="margin-top: -1rem;">
                            <div style="height:9rem; width:9rem;"
                                class="md rounded-full relative avatar overflow-hidden group">
                                <img style="height:9rem; width:9rem;"
                                    class="md rounded-full object-cover object-center relative border-4  z-0 border-gray-200"
                                    :src="fileImage == null ? photo : pdp"
                                    alt="photo de profile">
                                <label for="fileInput"
                                    class="absolute cursor-pointer group-hover:top-0 left-0 w-full h-full  group-hover:bg-slate-900/60 transition-all ease-in-out duration-500">
                                    <div
                                        class="absolute  flex items-start justify-center w-full group-hover:-top-16 text-white text-left transition-all ease-in-out duration-500">
                                        <h2 class="text-3xl font-bold text-white pt-32 mb-4">
                                            <i class="fa-solid fa-camera"></i>
                                        </h2>
                                    </div>
                                </label>
                                <input type="file" id="fileInput" @change="handleFileUpload" hidden />
                            </div>
                        </div>
                        <!-- User basic-->
                        <div class="mx-5">
                            <h2 class="text- leading-6 font-bold text-blue-4">{{ user.username }}

                            </h2>
                            <p class="text-sm leading-5 font-medium text-gray-500">
                                <span class="mb-0 w-48 font-extralight text-xs text-gray-600">{{ user.type == 'admin' ? 'Administration' : 'Personnel Administratif' }}</span>
                            </p>
                            <p class="text-lg leading-5 font-medium text-gray-500">{{ user.email }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <!-- Follow Button -->
                        <div class="flex flex-col text-right">
                            <button v-if="fileImage == null"
                                class="flex justify-center text-fotsy max-h-max whitespace-nowrap   rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
                                <i class="fa-solid  fa-pen mr-2"></i>Modifier Profile
                            </button>
                            <button v-else
                                class="flex justify-center text-blue-2 max-h-max whitespace-nowrap    max-w-max  items-center  font-light py-2 px-3 ">
                                <div @click="fileImage=null" class=" hover:bg-red-100 rounded p-2 text-red-600">
                                    <span><i class="fa-solid fa-upload mx-2"></i>Annuler</span>
                                </div>
                                <div  @click="saveImage()" class=" hover:bg-green-100 rounded p-2 text-green-600">
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
                        <span class="font-bold">Créer vos publication</span>
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
            fileImage: null,
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
                    console.log(this.user.photo)
                    if (this.user.photo) {
                        this.photo = this.user.photo
                    }else{
                        this.photo = require('@/assets/image/pdpNone.jpeg')
                    }
                }
            }
        },
        async saveImage() {
            const formData = new FormData();
            formData.append('photo', this.fileImage);
            try {
                const res = await Axios.post('uploadPhoto', formData)
                console.log(res.data)
                this.getUser()
                this.fileImage = null;
            } catch (error) {
                console.log(error)
            }

        },
        handleFileUpload(event) {
            let file = event.target.files[0];
            if (file.type.match("image/*")) {
                console.log(file)
                let objectURL = URL.createObjectURL(file);
                this.fileImage = file
                this.pdp = objectURL
            }
        },
    }
}
</script>