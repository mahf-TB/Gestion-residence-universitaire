<template>
    <button @click="visible = true"
        class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:text-blue-1  rounded-full hover:bg-slate-200 font-light  p-3 mr-0 ml-auto">
        <i class="fa-solid  fa-pen"></i>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '35rem' }"
            :breakpoints="{ '900px': '75vw', '675px': '90vw' }">
            <template #header>
                <div class="flex items-center justify-center w-full">
                    <h2 class="text-sm text-center font-light m-0 uppercase text-blue-2">
                        Changer votre mot de passe pour sécurité de vos compte
                    </h2>
                </div>

            </template>
            <div class="border p-2">
                <div>
                    <div class="text-xl flex flex-col items-center justify-center text-blue-3 ">
                            <div class="text-[2rem] mb-2">
                                <span> <i class="fa-solid fa-key"></i></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-blue-4 font-ligth"><span class="text-base mb-2"> voulez-vous changer vos mot de passe
                            </span></span>
                            </div>
                            
                        </div>
                </div>
                <form @submit.prevent="enregistrer()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md ">
                        <div class="flex flex-col my-4">
                            <!--  votre nom -->
                            <div class="relative z-0 ">
                                <input type="password" name="name" v-model="materiel.current_password" required
                                :class=" error.current != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Ancienne mot de passe<span class="text-red-500">*</span>
                                </label>
                                <p class="text-red-500 text-xs italic mb-1">{{ error.current }}</p>
                            </div>
                        </div>
                        <div class=" flex flex-col my-4">
                            <!--  votre prenom -->
                            <div class="relative z-0 ">
                                <input :type="show ? 'text' : 'password'" name="name" v-model="materiel.password"
                                    required  :class=" error.password != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Nouveaux mot de passe<span class="text-red-500">*</span>
                                </label>
                                <div @click="show = !show"
                                    class="absolute inline-block bottom-2 right-5 cursor-pointer">
                                    <i v-if="show" class="fa-solid fa-eye-slash"></i>
                                    <i v-else class="fa-solid fa-eye"></i>
                                </div>
                                <p class="absolute text-red-500 text-xs italic mb-1">{{ error.password }}</p>
                            </div>
                        </div>
                        <!-- adresse email -->
                        <div class=" flex flex-col  my-4">
                            <!--  votre prenom -->
                            <div class="relative z-0 ">
                                <input :type="show ? 'text' : 'password'" name="name" v-model="materiel.password_confirmation" required
                                :class=" error.password != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Confirmer le mot de passe<span class="text-red-500">*</span>
                                </label>
                                <p class="absolute text-red-500 text-xs italic mb-1">{{ error.password }}</p>
                                <div @click="show = !show"
                                    class="absolute inline-block bottom-2 right-5 cursor-pointer">
                                    <i v-if="show" class="fa-solid fa-eye-slash"></i>
                                    <i v-else class="fa-solid fa-eye"></i>
                                </div>
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
    </button>


</template>

<script>
import Axios from '@/_Service/caller.service';
import Dialog from 'primevue/dialog';
import VueMultiselect from 'vue-multiselect'
export default {
    name: 'ChangePassword',
    components: { Dialog, VueMultiselect },
    props: {
        logement: Object
    },
    data() {
        return {
            visible: false,
            materiel: {
                current_password: '',
                password: '',
                password_confirmation: '',
            },
            show: false,
            error:{
                current:'',
                password: '',
            },
        }
    },
    mounted() {
    },
    methods: {
        async enregistrer() {
            this.error = [];
            const formData = new FormData();
            formData.append('current_password', this.materiel.current_password);
            formData.append('password', this.materiel.password);
            formData.append('password_confirmation', this.materiel.password_confirmation);
            console.log(formData);
            try {
                const response = await Axios.post('/change-password', formData)
                if(response.data.status == 201){
                    this.visible = false
                    console.log(response.data.message)
                }else{
                    console.log(response.data)
                    this.error.current=response.data.message
                }
            } catch (error) {
                this.error.password=error.response.data.message
                console.error(error.response.data)
            }
        },
    },

}
</script>