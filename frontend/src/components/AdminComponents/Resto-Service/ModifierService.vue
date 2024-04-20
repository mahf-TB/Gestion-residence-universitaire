<template>
    <div class="">
        <div class="text-center py-2 px-3 hover:shadow-lg text-xs cursor-pointer text-yellow-600 rounded-full"
            @click="open()">
            <i class="fa-solid fa-pen-to-square text-[14px]"></i>
        </div>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <div class="flex items-center justify-center w-full">
                    <h2 class="text-lg text-center font-light m-0 uppercase text-blue-2">
                        Modification une nouvelle plat d'aujourd'hui , {{ id }}
                    </h2>
                </div>

            </template>
            <div class="border p-2">
                <form @submit.prevent="enregistrer()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md ">
                        <!-- adresse email -->
                        <div class="flex mb-2 h-40">
                            <section class="p-2 w-full h-full flex flex-col ">
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
                                <div class="relative flex items-center justify-center" @mouseover="show = true"
                                    @mouseout="show = false">
                                    <img v-if="imageUrl != null" :src="imageUrl" alt="image menu"
                                        class="w-44 h-40 object-scale-down">
                                    <label for="fileInput" v-if="show"
                                        class="absolute mt-2 rounded-md px-2 py-1 left-1 top-0 text-base bg-blue-0 text-blue-1">
                                        <i class="fa-solid fa-file-image mr-2"></i>Changer le photo</label>
                                </div>
                            </section>
                        </div>
                        <div class="grow flex flex-col">
                            <label for="sexe" class="my-1 text-md">Type du service<span class="text-red-500">*</span>
                            </label>
                            <select class="custom-select w-100  mb-1 text-[14px] form-select h-[52px]"
                                v-model="plat.type_service " aria-label="Default select example" id="sexe" name="sexe"
                                required>
                                <option disabled value="">Selectionner ici</option>
                                <option value="Laverie">Laverie</option>
                                <option value="Service menager">Service Menager</option>
                                <option value="Kit medical">Kit medical</option>
                                <option value="Kit sportif">Kit sportif</option>
                                <option value="Kit linge">Kit Linge</option>
                                <option value="Interphone">Interphone</option>
                            </select>
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
import Swal from 'sweetalert2'
import Axios from '@/_Service/caller.service';
import Dialog from 'primevue/dialog';
import VueMultiselect from 'vue-multiselect'
export default {
    name: 'ModifierService',
    components: { Dialog, VueMultiselect },
    props: {
        id: Number,
        getterPlatResto:Function
    },
    data() {
        return {
            visible: false,
            plat: {
                type_service: '',
                nom_service: '',
                description: '',
                tarifs: '',
                image: null,
                disponible: 1,
            },
            imageUrl: null,
            show: false

        }
    },
    mounted() {
    },
    methods: {
        async open() {
            this.visible = true;
            this.imageUrl = null
            try {
                const response = await Axios.get(`/showOne/${this.id}`)
                var data = response.data;
                this.plat = {
                    type_service: data.type_service,
                    nom_service: data.nom_service,
                    description: data.description,
                    tarifs: data.tarifs,
                    disponible: data.disponible,
                    image: data.image,
                    id_user: data.id_user,

                }
                this.imageUrl = data.imageUrl

            } catch (error) {
                console.error(error.message)
            }
        },
        async enregistrer() {
            console.log(this.plat)
            const formData = new FormData();
            formData.append('image', this.plat.image);
            formData.append('type_service', this.plat.type_service);
            formData.append('nom_service', this.plat.nom_service);
            formData.append('description', this.plat.description);
            formData.append('tarifs', this.plat.tarifs);
            formData.append('disponible', this.plat.disponible);
            formData.append('id_user', this.plat.id_user);
            console.log(formData)

            try {
                const response = await Axios.post('/update_plat/'+this.id , formData)
                this.visible = false
                Swal.fire({
                    title: "Enregistrement...!",
                    text: "Your file has been saved.",
                    icon: "success"
                });
                this.getterPlatResto()
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
                this.plat.image = files
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