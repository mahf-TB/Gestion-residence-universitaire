<template>
    <div @click="visible = true" class="text-center  py-2 px-3 text-lg cursor-pointer text-yellow-600  rounded-full">
        <i class="fa-solid fa-file"></i>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                    Detaille sur un commande 
                </h2>
            </template>
            <div>
                hello commande
            </div>
            <div>
                <div class="flex items-center justify-around" v-if="data.status == 'en attend'">
                    <button @click="validationDemande('refuser', data)"
                        class="text-center hover:shadow-lg py-2 px-3 text-lg cursor-pointer text-red-600  rounded-full">
                        <i class="fa-solid fa-xmark"></i> Refuser
                    </button>
                    <button @click="validationDemande('accepter', data)"
                        class="text-center hover:shadow-lg py-2 px-3 text-lg cursor-pointer text-green-600  rounded-full">
                        <i class="fa-solid fa-check"></i> Accepter
                    </button>
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
        async validationDemande(status, data) {
            let post = {
                'email': data.email,
                'id': data.id,
                'date_debut' : data.date_debut,
                'date_fin' : data.date_fin,
                'noms' : data.noms,
                'chambre' : data.chambre,
            }
            console.log(post);
            try {
                var response = await Axios.post(`/send_email?status=${status}`, post);
                if(!response.data.envoyer){
                    alert('Verifiez votre connexion ou votre router');
                }
            } catch (error) {
                console.error('holllaallaaa.  ',error);
            }
        },
    }
}
</script>