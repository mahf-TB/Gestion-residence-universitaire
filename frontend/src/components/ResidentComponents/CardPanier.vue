<template>
    <div :class="service.disponible ? 'text-blue-4 hover:bg-blue-2 cursor-pointer hover:text-white' : 'text-blue-4 '"
        class="flex items-center  justify-center rounded text-blue-4 text-xs py-2 w-1/3  transition duration-350 ease-in-out">
        <button  :disabled="service.disponible?false:true"
            v-if="service != ''" @click="openPosition('top')">
            <i class="fa fa-cart-plus mr-4"></i>
            {{ service.disponible ? 'Commander' : 'Pas Disponible' }}
        </button>
         <Dialog v-model:visible="visible" :style="{ width: '40rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }" :position="position" :modal="true" :draggable="false">
            <template #header>
                <div class="flex items-center justify-center uppercase w-full">
                    <span class="font-semibold text-lg text-blue-2">Faites votre Commande </span>
                </div>
            </template>
            <div class="modal-content">
                <div
                    class=" relative flex h-full w-full flex-col rounded-[20px] bg-white bg-clip-border p-4 shadow-3xl shadow-shadow-500">
                    <div class="modal-header p-0">
                        <div class="w-full">
                            <h4 class="text-xl font-bold text-navy-700 text-black">
                                Tous les voiture commander
                            </h4>
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <div class="max-h-[600px] overflow-auto">
                            <div
                                class="flex w-full items-center justify-between rounded-2xl bg-white p-3 shadow-3xl shadow-shadow-500 ">
                                <div class="flex items-center">
                                    <div class="h-20 w-2/12">
                                        <img class="justify-center grid h-[200px] w-[200px] object-cover rounded-lg"
                                            width="375" height="400" :src="image" alt="voiture Mercedes" />
                                    </div>
                                    <div class="ml-4 w-8/12">
                                        <div class="text-base font-medium uppercase text-navy-700 text-black">
                                            {{ service.nom_service }} <span>({{ commande.nombre }})</span>
                                        </div>
                                        <div v-html="service.description.substring(0, 80)"
                                            class="mt-2  overflow-auto text-sm text-gray-600" />
                                    </div>
                                </div>
                                <div @click="panier(1)"
                                    class="w-1/12 mr-4 flex items-center justify-center text-blue-600 text-lg">
                                    <i class="fa-solid fa-plus cursor-pointer"></i>
                                </div>
                                <div @click="panier(-1)"
                                    class="w-1/12 mr-4 flex items-center justify-center text-red-600 text-lg">
                                    <i class="fa-solid fa-minus cursor-pointer"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <template #footer>
                <div class="modal-footer p-0 ">
                    <button @click="saveCommande(service.id)"
                        class="flex justify-center text-fotsy max-h-max whitespace-nowrap   rounded max-w-max border bg-blue-2  items-center hover:shadow-lg font-light py-2 px-3  mr-0 ml-auto">
                        Envoyer votre commande
                    </button>

                </div>
            </template>
        </Dialog>

    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import VueMultiselect from 'vue-multiselect'
import Dialog from 'primevue/dialog';
import Axios from '@/_Service/caller.service'
import Swal from 'sweetalert2';

export default {
    name: 'CardAchat',
    props: {
        service: Object,
        image: String
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
