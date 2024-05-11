<template>
    <div class="flex flex-col text-right">
        <button @click="visible = true"
            class="flex justify-center text-fotsy max-h-max whitespace-nowrap  hover:bg-blue-1  rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
            <i class="fa-solid fa-upload mx-2"></i>Enregistrer votre materiele
        </button>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '40rem' }"
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
                        <div class="flex mb-2 ">
                            <section class="p-2 w-full h-[300px] flex flex-col ">
                                <input type="file" id="fileInput" @change="handleFileUpload" multiple hidden />
                                <header v-if="imageUrl == null" @dragover="dragOverHandler" @drop="dropHandler"
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
                                <div class="relative" @mouseover="show = true"
                                    @mouseout="show = false">
                                    <img v-if="imageUrl != null" :src="imageUrl" alt="image menu"
                                        class="w-full h-[300px] object-cover object-center">
                                    <label for="fileInput" v-if="show"
                                        class="absolute mt-2 rounded-md px-2 py-1 left-1 top-0 text-base bg-blue-0 text-blue-1">
                                        <i class="fa-solid fa-file-image mr-2"></i>Changer le photo</label>
                                </div>
                            </section>
                        </div>

                        <div class="flex items-center justify-between my-4">
                            <!--  votre nom -->
                            <div class="relative pb-1 z-0 w-1/2 mr-1">
                                <input type="text" name="name" v-model="materiel.nom_materiel" required
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label 
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Nom de vos materiel<span class="text-red-500">*</span></label>
                            </div>
                            <!--  votre prenom -->
                            <div class="relative pb-1 z-0 w-1/2  ml-1">
                                <input type="number" name="name" v-model="materiel.quantite" required
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label 
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Quantité<span class="text-red-500">*</span></label>
                            </div>
                        </div>
                        <!-- adresse email -->
                        <div class=" flex flex-col">
                            <div class="relative z-0">
                                <textarea id="contenu" rows="1" v-autoresize v-model="materiel.description" required 
                                    class="peer block w-full appearance-none border-b-2 bg-transparent px-0 py-2.5 text-base  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label 
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Decrivez vos materiel dans ce champ<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
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
    props: {
        logement:Object
    },
    data() {
        return {
            visible: false,
            materiel: {
                nom_materiel: '',
                description: '',
                quantite: '',
                image: null,
            },
            imageUrl: null,
            show: false

        }
    },
    mounted() {
    },
    methods: {
        async enregistrer() {
            // console.log(typeof(parseInt(this.materiel.quantite)));
            // if (parseInt(this.materiel.quantite) == NaN) {
                
            // console.log(parseInt(this.materiel.quantite));
            // }
            const formData = new FormData();
            formData.append('image', this.materiel.image);
            formData.append('nom', this.materiel.nom_materiel);
            formData.append('qte', this.materiel.quantite);
            formData.append('description', this.materiel.description);
            formData.append('logement_id', this.logement.id);
            console.log(formData);

            try {
                const response = await Axios.post('/add-materiel', formData)
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
                this.materiel.image = file
                console.log(this.materiel.image)
                this.imageUrl = objectURL
            }
        },
        dragOverHandler(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'copy';
        },
        dropHandler(event) {
            event.preventDefault();
            const files = event.dataTransfer.files[0];
            console.log(files)
            if (files.type.match("image/*")) {
                let objectURL = URL.createObjectURL(files);
                this.materiel.image = files
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