<template>
    <div @click="openPosition('top')"
        :class="service.disponible ? 'text-blue-4 hover:bg-blue-2 cursor-pointer hover:text-white' : 'text-blue-4 '"
        class="flex items-center  justify-center rounded text-blue-4 text-xs py-2 w-1/3  transition duration-350 ease-in-out">
        <button :disabled="service.disponible ? false : true" >
            <i class="fa fa-cart-plus mr-4"></i>
            {{ service.disponible ? 'Commander' : 'Pas Disponible' }}
        </button>
        <Dialog v-model:visible="visible" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }" :position="position" :modal="true" :draggable="false">
            <template #header>
                <div class="flex items-center justify-center uppercase w-full">
                    <span class="font-semibold text-lg text-blue-2">Faites votre Commande </span>
                </div>
            </template>
            <div class="mb-4 mt-1 bg-gradient-to-r from-blue-900 to-blue-800 h-px"></div>
            <div class="modal-content">
                <div
                    class=" relative flex h-full w-full flex-col rounded-[20px] bg-white bg-clip-border p-2 shadow-3xl shadow-shadow-500">
                    <div class="modal-header p-0">
                        <div class="w-full">
                            <h4 class="text-base font-light text-navy-700 text-black">
                                Voulez-vous commandée du {{ service.nom_service }}
                            </h4>
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <div class=" overflow-auto">
                            <div
                                class="flex w-full flex-col items-center justify-between rounded-2xl bg-white p-2 shadow-3xl shadow-shadow-500 ">
                                <div class="flex items-start">
                                    <div class="w-5/12">
                                        <img class="justify-center grid h-[330px] w-[500px] object-cover rounded-lg"
                                            width="375" height="400" :src="image" alt="voiture Mercedes" />
                                    </div>
                                    <div class="ml-4 w-7/12">
                                        <div class="text-base my-2  font-medium uppercase text-navy-700 text-black">
                                            {{ service.nom_service }} <span></span>
                                        </div>
                                        <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                                            Disponibilité: <span :class="{ 'text-green-500': service.disponible }"
                                                class="">{{
                                                service.disponible?'Mbola misy':'Efa lany' }}</span>
                                        </div>
                                        <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                                            Prix: <span>{{ service.tarifs }} MGA</span>
                                        </div>
                                        <span class="my-2 inline overflow-auto text-sm text-gray-600">
                                            {{ }}
                                            <div v-html="(service.nom_service + ' ' + service.description).substring(0, 200)"
                                                class="" />
                                        </span>
                                        <div class="text-[14px] my-3 font-light text-navy-700 text-black">

                                            <span class="text-sm text-blue-4">Ajouter au panier</span>
                                            <div class="flex ">  
                                                <span class="py-2 px-5 border border-gray-400 ">{{ commande.nombre }}</span>
                                                <div class="flex items-center justify-center bg-blue-0">
                                                    <div @click="panier(1)"
                                                        class="w-1/2 px-4 p-2 flex items-center hover:shadow justify-center text-blue-600 text-lg ">
                                                        <i class="fa-solid fa-plus cursor-pointer"></i>
                                                    </div>
                                                    <div @click="panier(-1)"
                                                        class="w-1/2 px-4 p-2 flex items-center hover:shadow justify-center text-red-600 text-lg">
                                                        <i class="fa-solid fa-minus cursor-pointer"></i>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                         <div class="text-[14px] my-3 font-light text-navy-700 text-black">
                                            <span class="text-sm text-blue-4">Options de paiement</span>
                                            <div class="flex ">  
                                                <span class="py-2 px-3 border border-gray-400 ">Espèces</span>
                                                <span class="py-2 px-3 border border-gray-400 ">PayPal</span>
                                                <span class="py-2 px-3 border border-gray-400 ">Carte de crédit</span>
                                                
                                            </div>
                                         </div>
                                        <div class="my-3 p-0 ">
                                            <button @click="saveCommande(service.id)"
                                                class="flex justify-center text-sm text-fotsy max-h-max whitespace-nowrap uppercase rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
                                                Envoyer votre commande
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Dialog>
    </div>
</template>

<script>

import VueMultiselect from 'vue-multiselect'
import Dialog from 'primevue/dialog';
import Axios from '@/_Service/caller.service'
import Swal from 'sweetalert2';

export default {
    name: 'CardAchat',
    props: {
        service: Object,
        image: String,
        commandeUser: Function
    },
    components: {
        VueMultiselect, Dialog
    },
    data() {
        return {
            visible: false,
            position: 'center',
            commande: {
                id_service: '',
                nombre: 1
            },
        }
    },
    computed: {

    },
    mounted() {

    },
    methods: {
        async saveCommande(items) {
            this.commande.id_service = items
            console.log(this.commande)
            try {
                const res = await Axios.post('commande-service', this.commande)
                console.log(res)
                if (res.data.status) {
                    this.visible = false
                    Swal.fire({
                        title: "Enregistrement...!",
                        text: "Your file has been saved.",
                        icon: "success"
                    });
                    this.commandeUser();
                }
            } catch (error) {
                console.error(error)
            }
        },
        openPosition(position) {
            this.position = position;
            this.visible = true;
        },
        panier(items) {
            if (this.commande.nombre >= 1) {
                if (this.commande.nombre == 1 && items < 0) {
                    return
                }
                this.commande.nombre += items;
            }
        }
    }
}
</script>
