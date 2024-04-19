<template>
    <div class="text-xl">
        <button @click="visible = true"
            class="uppercase max-md:w-full max-md:mt-2 bg-blue-2 hover:bg-blue-1 transition-all text-white text-sm py-2 px-4 rounded">
            <i class="fa-solid fa-plus pr-2"></i>Nouveaux
        </button>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                    Formulaire d'ajouter un nouveaux Logement
                </h2>
            </template>
            <div class="border p-2">
                <form @submit.prevent="enregistrer()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md ">
                        <div class="flex flex-col">
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1">
                                <label for="integration[name]" class="my-1 text-md">Nom d'utilisateur<span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Username ou pseudo de l'utilisateur "
                                    v-model="user.username" />
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <!-- Nom d'estudiant-->
                            <div class="grow flex flex-col mr-1">
                                <label for="integration[name]" class="my-1 text-md">Adresse email<span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="email"
                                    class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                    name="integration[name]" required placeholder="Adresse email de l'utilisateur "
                                    v-model="user.email" />
                            </div>
                        </div>

                        <div class="grow flex flex-col">
                            <label for="sexe" class="my-1 text-md">Rôle de l'utilisateur<span
                                    class="text-red-500">*</span>
                            </label>
                            <select class="custom-select w-100  mb-1 text-[14px] form-select h-[52px]"
                                v-model="user.type" aria-label="Default select example" id="sexe" name="sexe" required>
                                <option disabled value="">Selectionner ici</option>
                                <option value="P-accueil">Personnel de l'accueil</option>
                                <option value="P-service">Personnel du Service</option>
                                <option value="P-maintenance">Personnel du maintenance </option>
                            </select>
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
    name: 'AjouterUser',
    components: { Dialog, VueMultiselect },
    props: {
        getterUtilisateurs: Function
    },
    data() {
        return {
            visible: false,
            user: {
                username: '',
                email: '',
                password: '123456',
                password_confirmation: '123456',
                type: ''
            },

        }
    },
    mounted() {

    },
    methods: {
        enregistrer() {
            console.log(this.user)
            try {
                const response = Axios.post('/utilisateurs', this.user)
                console.log(response)
                this.getterUtilisateurs()
                this.visible = false

            } catch (error) {
                console.error(error.message)
            }
        },
    }
}
</script>