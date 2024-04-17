<template>
    <div class="">
        <div @click="open()"
            class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-yellow-600  rounded-full">
            <i class="fa-solid fa-pen-to-square text-[14px]"></i>
        </div>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                    Formulaire d'ajouter un nouveaux Logement
                </h2>
            </template>
            <div class="border p-2">
                <form @submit.prevent="updateLogement()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md ">
                        <div class="flex mb-2 h-40">
                            <section class="p-2 w-full h-full flex flex-col ">
                                <input type="file" id="fileInput" @change="handleFileUpload" multiple hidden />
                                <header v-if="logement.image == null" @dragover="dragOverHandler" @drop="dropHandler"
                                    class="border-dashed border-2 border-gray-400 h-full flex  flex-col items-center justify-center ">
                                    <label for="fileInput"
                                        class="mt-2 rounded-full px-3 py-2 text-2xl text-center bg-gray-200 hover:bg-gray-300">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </label>
                                    <p
                                        class="mb-2 font-semibold flex flex-col text-center  text-gray-900 justify-center">
                                        <span>Importer la photo</span>
                                        <span class="text-xs text-gray-500 font-light">ou faite glisser-déposer</span>
                                    </p>
                                </header>
                                <div class="relative flex items-center justify-center" @mouseover="show = true"
                                    @mouseout="show = false">
                                    <img v-if="logement.image != null" :src="imageUrl" :alt="logement.type_logement"
                                        class="w-44 h-40 object-scale-down">
                                    <label for="fileInput" v-if="show"
                                        class="absolute mt-2 rounded-md px-2 py-1 left-1 top-0 text-base bg-blue-0 text-blue-1">
                                        <i class="fa-solid fa-file-image mr-2"></i>Changer le photo</label>
                                </div>
                            </section>
                        </div>
                        <div class="grow flex flex-col">
                            <label for="sexe" class="my-1 text-md">Batiment<span class="text-red-500">*</span>
                            </label>
                            <select class="custom-select w-100  mb-1 text-[14px] form-select h-[52px]"
                                v-model="logement.id_batiment" aria-label="Default select example" id="sexe" name="sexe"
                                required>
                                <option disabled value="">Selectionner ici</option>
                                <option value="1">Batiment A</option>
                                <option value="2">Batiment B</option>
                                <option value="3">Batiment C</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1">
                                <label for="integration[name]" class="my-1 text-md">Numéro du logement<span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Numéro du logement "
                                    v-model="logement.num_logement" />
                            </div>
                        </div>
                        <div class="grow flex flex-col ">
                            <label for="sexe" class="my-1 text-md">Type du logement<span class="text-red-500">*</span>
                            </label>
                            <select class="custom-select w-100  mb-1 text-[14px] form-select h-[52px]"
                                v-model="logement.type_logement" aria-label="Default select example" id="sexe"
                                name="sexe" required>
                                <option disabled value="">Selectionner ici</option>
                                <option value="Appartement">Appartement</option>
                                <option value="Chambre Individuel">Chambre Individuel</option>
                                <option value="Chambre Parteger">Chambre à Parteger</option>
                            </select>
                        </div>
                        <div class="flex mb-3">
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1">
                                <label for="integration[name]" class="my-1 text-md">Montant du loyer<span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Entrer votre Nom"
                                    v-model="logement.prix" />
                            </div>
                        </div>
                        <!-- adresse email -->
                    </div>
                    <div class="flex items-center justify-end mt-3 ">
                        <div @click="visible = false"
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
    name: 'ModifierLogement',
    components: { Dialog, VueMultiselect },
    props: {
        id: Number,
        getterLogement: Function
    },
    data() {
        return {
            visible: false,
            show: false,
            logement: {
                id_batiment: '',
                num_logement: '',
                type_logement: '',
                prix: '',
                image: null
            },
            imageUrl: null
        }
    },
    mounted() {
        this.getTypeLogement();
    },
    methods: {
        async open() {
            this.visible = true;
            this.imageUrl = null
            try {
                const response = await Axios.get(`/logement/${this.id}`)
                var data = response.data;
                console.log(data)
                this.logement = {
                    id_batiment: data.id_batiment,
                    num_logement: data.num_logement,
                    type_logement: data.type_logement,
                    prix: data.prix,
                    status: data.status,
                    image: data.image,

                }
                this.imageUrl = data.imageUrl

            } catch (error) {
                console.error(error.message)
            }
        },
        async getTypeLogement() {
            try {
                const response = await Axios.get('/type_logement')
                this.optionsType = response.data.dataType;
            } catch (error) {
                console.error(error.message)
            }
        },
        async updateLogement() {
            // this.logement.image = this.fileImage
            console.log(this.logement)
            try {
                const response = await Axios.put(`/logement/${this.id}`, this.logement);
                this.visible = false
                this.getterLogement()
                console.log(response)

            } catch (error) {
                console.error(error.message)
            }
        },
      async  handleFileUpload(event) {
            let file = event.target.files[0];
            if (file.type.match("image/*")) {
                let objectURL = URL.createObjectURL(file);
                this.imageUrl = objectURL

                // envoyer le telechargement de file dans backend
                const formData = new FormData();
                formData.append('image', file);
                try {
                    const response = await Axios.post('/uploadImage', formData);
                    console.log(response.data)
                    this.logement.image = response.data
                } catch (error) {
                    console.error(error.message)
                }
            }
        },
        dragOverHandler(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'copy';
        },
       async dropHandler(event) {
            event.preventDefault();
            const files = event.dataTransfer.files[0];
            console.log(files)
            if (files.type.match("image/*")) {
                let objectURL = URL.createObjectURL(files);
                this.imageUrl = objectURL
                const formData = new FormData();
                formData.append('image', files);
                try {
                    const response = await Axios.post('/uploadImage', formData);
                    this.logement.image = response.data
                } catch (error) {
                    console.error(error.message)
                }
            }
        },
    }
}
</script>