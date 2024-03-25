<template>
    <div class="text-xl  pb-4">
        <button @click="visible = true"
            class="uppercase max-md:w-full max-md:mt-2 bg-blue-2 hover:bg-blue-1 transition-all text-white text-sm py-2 px-4 rounded">
            Nouveaux Etudiant
        </button>
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
                                    name="integration[prenom]" required placeholder="Entrer votre Nom" maxlength="12" minlength="12"
                                    v-model="etudiant.cin" />
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
                                <label for="sexe" class="my-1 text-md">Sexe<span
                                        class="text-red-500">*</span>
                                </label>
                                <select class="custom-select w-100  mb-1 text-[14px] form-select h-[52px]" v-model="etudiant.sexe" aria-label="Default select example" id="sexe" name="sexe" required>
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
                            name="integration[email]" required placeholder="Entrer votre Nom"
                            v-model="etudiant.telephone" />
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
import Axios from '@/_Service/caller.service';
import Dialog from 'primevue/dialog';
import VueMultiselect from 'vue-multiselect'
export default {
    name: 'AjouterEtudiant',
    components: { Dialog, VueMultiselect },
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
            type: null,
            chambre: null,
        }
    },
    mounted() {
        this.getTypeLogement();
    },
    methods: {
        async getTypeLogement() {
            try {
                const response = await Axios.get('/type_logement')
                this.optionsType = response.data.dataType
                // console.log(response.data.dataType)
            } catch (error) {
                console.error(error.message)
            }
        },
        enregistrer() {
            console.log(this.etudiant)
            try {
                const response =  Axios.post('/etudiants', this.etudiant)
                console.log(response)
            } catch (error) {
                console.error(error.message)
            }
        },
       async updateSelectedOne(newValue) {
            console.log(newValue.type_logement);
            try {
                this.type = newValue
                const res = await Axios.get(`/logement_type?type_logement=${this.type.type_logement}`)
                console.log(res)
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
                console.log(this.etudiant)
                this.$emit("update:modelValue", newValue);
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>