<template>
    <div @click="visible = true" class="text-center  py-2 px-3 text-lg cursor-pointer text-yellow-600  rounded-full">
        <i class="fa-solid fa-file"></i>
        <Dialog v-model:visible="visible" modal header="Header" class="p-0" :style="{ width: '70rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                    <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                        Information sur le commande du client
                    </h2>
                </template>
            <div class="w-full">
                <div
                    class="flex w-full flex-col items-center justify-between rounded-sm bg-white shadow-3xl shadow-shadow-500 ">
                    <div class="w-full flex items-start h-[45rem']  overflow-hidden">
                        <div class="w-2/3 h-[700px] ">
                            <img class="justify-center grid h-full w-full object-cover rounded-sm" width="375"
                                height="400" :src="data.image" alt="voiture Mercedes" />
                        </div>
                        <div class="m-4 h-[95%] w-1/3 overflow-auto ">
                            <div class="flex flex-shrink-0 my-2">
                                <div class="flex items-center">
                                    <div>
                                        <img class="inline-block h-10 w-10 rounded-full"
                                            :src="data.photo ? data.photo : require('@/assets/image/pdpNone.jpeg')"
                                            alt="">
                                    </div>
                                    <div class="flex flex-col ml-4 list-none">
                                        <span class="text-base  font-medium text-blue-1">
                                            {{ data.nom_etudaiant }} <span
                                                class="text-gray-500 font-extralight text-sm"></span>
                                        </span>
                                        <span
                                            class="text-sm font-ligth text-gray-600  transition ease-in-out duration-150">
                                            <span>{{ new Date(data.date).toLocaleDateString() + ' à ' + new
                                                Date(data.date).toLocaleTimeString() }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="mb-3 bg-gradient-to-r from-blue-300 to-blue-200 h-px"></div>
                                <div class="text-base my-2  font-medium uppercase text-navy-700 text-black">
                                    {{ data.nom_service }}
                                </div>
                                <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                                    {{data.batiment}}: <span class="text-green-500">{{data.logement
                                        }}</span>
                                </div>
                                <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                                    Téléphone: <span>{{ data.tele }}</span>
                                </div>
                                <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                                    Nombre: <span>{{ data.nombre }}</span>
                                </div>
                                <div class="text-[14px] my-3 font-light text-navy-700 text-black">
                                    <span class="text-sm text-blue-4">Status du commande</span>
                                    <div class="flex ">
                                        <span class="py-2 px-3 border border-gray-400 "
                                            :class="{'bg-yellow-100 text-yellow-500': data.status == 'en attente'}">En
                                            attendant</span>
                                    </div>
                                </div>
                                <div class="my-3 p-0 flex items-center">
                                    <button @click="saveCommande(data.id)"
                                        class="flex items-center w-1/2 justify-center text-sm text-fotsy max-h-max  uppercase rounded border bg-blue-2  hover:shadow-lg font-light py-2 px-3">
                                        Confirmer
                                    </button>
                                    <button @click="saveCommande(data.id)"
                                        class="flex items-center w-1/2  justify-center text-sm text-fotsy max-h-max  uppercase rounded border bg-red-500  hover:shadow-lg font-light py-2 px-3">
                                        Annuler
                                    </button>
                                </div>
                            </div>
                            <div class="my-1 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </Dialog>
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import Dialog from 'primevue/dialog';
export default {
    name: 'DetailleValidation',
    components: { Dialog },
    props: {
        data: Object
    },
    data() {
        return {
            visible: false
        }
    },
    methods: {
        async saveCommande(id) {
            
            console.log(id);
            // try {
            //     var response = await Axios.post(`/send_email?status=${status}`, post);
            //     if (!response.data.envoyer) {
            //         alert('Verifiez votre connexion ou votre router');
            //     }
            // } catch (error) {
            //     console.error('holllaallaaa.  ', error);
            // }
        },
    }
}
</script>


<style scoped>
.p-dialog-content {
    padding: 0;
}
</style>
<style></style>