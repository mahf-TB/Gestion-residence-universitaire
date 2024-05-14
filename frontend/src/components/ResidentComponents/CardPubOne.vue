<template>
    <div class="w-full mb-2">
        <div
            class="flex w-full flex-col items-center justify-between rounded-sm bg-white shadow-3xl shadow-shadow-500 ">
            <div class="w-full flex items-start h-[80vh]  overflow-hidden">
                <div class="w-2/3 h-full ">
                    <img class="justify-center grid h-full w-full object-cover rounded-sm" width="375" height="400"
                        :src="publication.image" alt="voiture Mercedes" />
                </div>


                <div class="m-4 h-[95%] w-1/3 overflow-auto ">
                    <div class="flex flex-shrink-0 my-2">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block h-10 w-10 rounded-full"
                                    :src="publication.pdp ? publication.pdp : require('@/assets/image/pdpNone.jpeg')"
                                    alt="">
                            </div>
                            <div class="flex flex-col ml-4 list-none">
                                <span class="text-base  font-medium text-blue-1">
                                    {{ publication.auteur }} <span class="text-gray-500 font-extralight text-sm">a
                                        publié un plat de menu</span>
                                </span>
                                <span class="text-sm font-ligth text-gray-600  transition ease-in-out duration-150">
                                    <span>{{ new Date(publication.updated_at).toLocaleDateString() + ' à ' + new
                                        Date(publication.updated_at).toLocaleTimeString() }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div v-if="service">
                        <div class="mb-3 bg-gradient-to-r from-blue-300 to-blue-200 h-px"></div>
                        <div class="text-base my-2  font-medium uppercase text-navy-700 text-black">
                            {{ service.nom_service }}
                        </div>
                        <span class="my-2 inline overflow-auto text-sm text-gray-600">
                            <div v-html="(service.description + ' ').substring(0, 200)" class="" />
                        </span>
                        <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                            Disponibilité: <span :class="{ 'text-green-500': service.disponible }" class="">{{
                                service.disponible ? 'Mbola misy' : 'Efa lany' }}</span>
                        </div>
                        <div class="text-[14px] my-2 font-light  text-navy-700 text-black">
                            Prix: <span>{{ service.tarifs }} MGA</span>
                        </div>
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
                                class="flex items-center justify-start text-sm text-fotsy max-h-max  uppercase rounded max-w-max border bg-blue-2  hover:shadow-lg font-light py-2 px-3">
                                Envoyer votre commande
                            </button>
                        </div>
                    </div>

                    <div class="my-1 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                    <div class="flex items-center justify-between">
                        <div
                            class="flex items-center cursor-pointer justify-center rounded text-blue-4  text-xs py-2 w-1/2  hover:bg-blue-2 hover:text-white transition duration-350 ease-in-out">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <g>
                                    <path
                                        d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                    </path>
                                </g>
                            </svg>
                            J'aime
                        </div>
                        <div
                            class="flex items-center cursor-pointer justify-center rounded text-blue-4 text-xs py-2 w-1/2   hover:bg-blue-2 hover:text-white transition duration-350 ease-in-out">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <g>
                                    <path
                                        d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                    </path>
                                </g>
                            </svg>
                            Commenter
                        </div>
                    </div>
                    <div class="my-1 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                    <div class="my-3">
                        <pre>{{ publication }}</pre>
                    </div>
                </div>
            </div>
        </div>
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
        publication: Object,
        service: Object,
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
