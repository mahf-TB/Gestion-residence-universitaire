<template>
    <div class="">
        <div class="text-center py-2 px-3 hover:shadow-lg text-xs cursor-pointer text-yellow-600 rounded-full"
            @click="open()">
            <i class="fa-solid fa-pen-to-square text-[14px]"></i>
        </div>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                    Formulaire d'ajouter un nouveaux Etudiant
                </h2>
            </template>
            <div class="border p-2">
                <form @submit.prevent="enregistrer()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md ">
                        <div class="flex mb-3">
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1">
                                <label for="integration[name]" class="my-1 text-md">Nom<span
                                        class="text-red-500">*</span></label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px] uppercase mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Entrer votre Nom"
                                    v-model="etudiant.nom" />
                            </div>
                            <!-- Prenom d'estudiant -->
                            <div class="grow flex flex-col ml-1">
                                <label for="integration[prenom]" class="my-1 text-md ">Prenom</label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[prenom]" required placeholder="Entrer votre Nom"
                                    v-model="etudiant.prenom" />
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1">
                                <label for="integration[name]" class="my-1 text-md">Matricule <span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Entrer votre Nom"
                                    v-model="etudiant.matricule" />
                            </div>
                            <!-- Prenom d'estudiant -->
                            <div class="grow flex flex-col ml-1">
                                <label for="integration[prenom]" class="my-1 text-md">CIN </label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[prenom]" required placeholder="Entrer votre Nom" maxlength="12"
                                    minlength="12" v-model="etudiant.cin" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-3"> 
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1 w-[50%]">
                                <label for="integration[name]" class="my-1 text-md">Date de naissance<span
                                        class="text-red-500">*</span> </label>
                                <input type="date"
                                    class="rounded-[4px] p-3 text-[14px]  h-[50px] mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Entrer votre Nom"
                                    v-model="etudiant.date_naissance" />
                            </div>
                            <!-- Prenom d'estudiant -->
                            <div class="grow flex flex-col ml-1 w-[50%]">
                                <label for="sexe" class="my-1 text-md">Sexe<span class="text-red-500">*</span>
                                </label>
                                <select class="custom-select w-100  mb-1 text-[14px] form-select h-[52px]"
                                    v-model="etudiant.sexe" aria-label="Default select example" id="sexe" name="sexe"
                                    required>
                                    <option disabled value="">Selectionner ici</option>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                    <option value="HF">Les Deux</option>
                                </select>

                            </div>
                        </div>
                        <!-- adresse email -->
                        <label for="integration[email]" class="my-1 text-md">Contact<span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="rounded-[4px] p-3 text-[14px]  mb-3  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[email]" required placeholder="Entrer votre Nom" maxlength="13"
                            minlength="10" v-model="etudiant.telephone" />
                        <!-- adresse email -->
                        <label for="integration[email]" class="my-1 text-md">Email<span
                                class="text-red-500">*</span></label>
                        <input type="email"
                            class="rounded-[4px] p-3 text-[14px]  mb-3  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[email]" required placeholder="Entrer votre Nom"
                            v-model="etudiant.email" />
                        <!-- adresse email -->
                        <div class="flex mb-3">
                            <div class="grow flex flex-col mr-1 w-[50%]">
                                <label for="integration[name]" class="my-1 text-md">Type de Logement<span
                                        class="text-red-500">*</span></label>
                                <VueMultiselect :model-value="type" @update:model-value="updateSelectedOne"
                                    :options="optionsType" label="type_logement" track-by="type_logement"
                                    placeholder="Rechercher et selectionner le type" />
                            </div>
                            <div class="grow flex flex-col ml-1 w-[50%]">
                                <label for="integration[prenom]" class="my-1 text-md">Chambre Numéro</label>
                                <VueMultiselect :model-value="chambre" @update:model-value="updateSelectedLoge"
                                    :options="optionsChambre" label="num_logement" track-by="id"
                                    placeholder="Rechercher et selectionner le logement" />
                            </div>
                        </div>
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
import Swal from 'sweetalert2'
import Axios from '@/_Service/caller.service';
import Dialog from 'primevue/dialog';
import VueMultiselect from 'vue-multiselect'
export default {
    name: 'ModifierEtudiant',
    components: { Dialog, VueMultiselect },
    props: {
        id: Number,
        getterEtudiant: Function
    },
    data() {
        return {
            visible: false,
            etudiant: {
                nom: '',
                prenom: '',
                matricule: '',
                cin: '',
                date_naissance: '',
                sexe: '',
                telephone: '',
                email: '',
                id_logement: '',
            },
            optionsType: [],
            optionsChambre: [],
            type: '',
            chambre: null,
        }
    },
    mounted() {
        
    },
    methods: {
        async open() {
            this.visible = true;
            try {
                const response = await Axios.get(`/etudiants/${this.id}`)
                var data = response.data;
                this.etudiant = {
                    nom: data.nom,
                    prenom: data.prenom,
                    matricule: data.matricule,
                    cin: data.cin,
                    date_naissance: data.date_naissance,
                    sexe: data.sexe,
                    telephone: data.telephone,
                    email: data.email,
                    id_logement: data.id_logement,
                }
                this.type = data.logement;
                this.chambre = data.logement;


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
        async enregistrer() {
            console.log(this.etudiant)
            try {
                const response =await Axios.put(`/etudiants/${this.id}`, this.etudiant)
                console.log(response)
                this.visible = false
                Swal.fire({
                        title: "Enregistrement...!",
                        text: "Your file has been saved.",
                        icon: "success"
                    });
                this.getterEtudiant()

            } catch (error) {
                console.error(error.message)
            }
        },
        async updateSelectedOne(newValue) {
            try {
                this.type = newValue
                var type = newValue.type_logement
                const res = await Axios.get(`/logement_type?type_logement=${type}`)
                this.optionsChambre = res.data.logement
                this.$emit("update:modelValue", newValue);

            } catch (error) {
                console.log(error);
            }
        },
        async updateSelectedLoge(newValue) {
            try {
                this.chambre = newValue
                this.etudiant.id_logement = newValue.id
                this.$emit("update:modelValue", newValue);
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>