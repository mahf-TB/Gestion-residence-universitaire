<template>
    <div class="text-xl  pb-4">
        <button @click="visible = true"
            class="uppercase max-md:w-full max-md:mt-2 bg-blue-2 hover:bg-blue-1 transition-all text-white text-sm py-2 px-3 rounded">
            <i class="fa-solid fa-plus pr-2"></i>Nouvelle Plat
        </button>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <div class="flex items-center justify-center w-full">
                    <h2 class="text-lg text-center font-light m-0 uppercase text-blue-2">
                        Ajouter une nouvelle plat d'aujourd'hui
                    </h2>
                </div>

            </template>
            <div class="border p-2">
                <form @submit.prevent="enregistrer()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md ">
                        <!-- adresse email -->
                        <div class="flex items-start mb-3">
                            <label for="filePut" class="my-1 text-md flex flex-col"><span>Photo du plat<span
                                        class="text-red-500">*</span></span>
                                <div class="btn btn-secondary ">
                                    Parcourir...
                                </div>
                                <input type="file" @change="handleFileUpload" hidden
                                    class="rounded-[4px] p-3 text-[14px] overflow-hidden resize-none  mb-3  border-1 border-gray-400 hover:border-blue-2"
                                    name="filePut" id="filePut" maxlength="13" minlength="10" />
                            </label>
                            <div class="w-64 h-32" v-if="imageUrl != null">
                                <img :src="imageUrl" :alt="fileImage" width="300" height="500"
                                    class="w-full h-full object-scale-down ">
                            </div>
                        </div>
                        <!-- adresse email -->
                        <label for="integration[email]" class="my-1 text-md">Nom du plat<span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="rounded-[4px] p-3 text-[14px]  mb-3  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[email]" required placeholder="Entrer votre Nom"
                            v-model="plat.nom_service" />
                        <!-- adresse email -->
                        <label for="integration[email]" class="my-1 text-md">Description<span
                                class="text-red-500">*</span></label>
                        <textarea id="contenu" rows="1" v-autoresize v
                            class="rounded-[4px] p-3 text-[14px] mb-3 border-1 border-gray-400 hover:border-blue-2"
                            name="integration[email]" required placeholder="Decrivez à propos du plat"
                            v-model="plat.description" />

                        <div class="flex mb-3">
                            <!-- Prenom d'estudiant -->
                            <div class="grow flex flex-col ml-1">
                                <label for="integration[prenom]" class="my-1 text-md ">Prix du plat</label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[prenom]" required placeholder="Entrer votre Nom"
                                    v-model="plat.tarifs" />
                            </div>
                        </div>

                    </div>
                    <div class="flex items-center justify-end mt-3 ">
                        <div @click="(visible = false)"
                            class="mx-2 border px-3 p-2 cursor-pointer uppercase bg-gradient-to-r from-red-800 bg-red-500 text-white rounded-[4px] hover:bg-slate-400 scale-105 duration-300">
                            Annuler
                        </div>
                        <button
                            class="mx-2 border px-3 p-2 uppercase bg-gradient-to-r from-blue-800 bg-blue-500 text-white rounded-[4px] hover:bg-slate-400 scale-105 duration-300"
                            type="submit">
                            Enregistrer
                        </button>
                    </div>

                </form>
            </div>
        </Dialog>
    </div>

</template>

<script>
import Axios from '@/_Service/caller.service';
import Dialog from 'primevue/dialog';
import VueMultiselect from 'vue-multiselect'
export default {
    name: 'AjouterPlat',
    components: { Dialog, VueMultiselect },
    data() {
        return {
            visible: false,
            plat: {
                type_service: 'RestoPlat',
                nom_service: '',
                description: '',
                tarifs: '',
                image: null,
                disponible:1,
            },
            imageUrl: null

        }
    },
    mounted() {
    },
    methods: {
        
        async enregistrer() {
            console.log(this.plat)
            const formData = new FormData();
            formData.append('image', this.plat.image);
            formData.append('type_service', this.plat.type_service);
            formData.append('nom_service', this.plat.nom_service);
            formData.append('description', this.plat.description);
            formData.append('tarifs', this.plat.tarifs);
            formData.append('disponible', this.plat.disponible);

            try {
                const response =await Axios.post('/ajouter_service', formData)
                this.visible = false
                console.log(response)

            } catch (error) {
                console.error(error.message)
            }
        },
        handleFileUpload(event) {
            let file = event.target.files[0];
            if (file.type.match("image/*")) {
                let objectURL = URL.createObjectURL(file);
                this.plat.image = file
                this.imageUrl = objectURL
            }
        },

    },
    directives: {
        autoresize(el) {
            const resize = () => {
                el.style.height = 'auto';
                el.style.height = el.scrollHeight + 'px';
            };
            el.addEventListener('input', resize);
            resize();
        },
    },
}
</script>