<!-- 
 -->
<template>
    <div class="text-xl">
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
                                    name="integration[name]" required placeholder="Numéro du logement "
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
                                    name="integration[name]" required placeholder="Numéro du logement "
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
    name: 'ModifierUser',
    components: { Dialog, VueMultiselect },
    props: {
        id:Number,
        getterUtilisateurs: Function
    },
    data() {
        return {
            visible: false,
            user: {
                username: '',
                email: '',
                type: ''
            },

        }
    },
    mounted() {

    },
    methods: {
        async open() {
            this.visible = true;
            try {
                const response = await Axios.get(`/utilisateurs/${this.id}` )
                var data = response.data;
                console.log(data)
                this.user = {
                    username: data.username,
                    email: data.email,
                    type: data.type,
                }

            } catch (error) {
                console.error(error.message)
            }
        },
        enregistrer() {
            console.log(this.user)
            try {
                const response = Axios.put(`/utilisateurs/${this.id}`, this.user)
                console.log(response.data)
                this.getterUtilisateurs()
                this.visible = false

            } catch (error) {
                console.error(error.message)
            }
        },
    }
}
</script>