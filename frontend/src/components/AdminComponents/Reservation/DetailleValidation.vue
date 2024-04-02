<template>
    <div @click="visible = true" class="text-center  py-2 px-3 text-lg cursor-pointer text-yellow-600  rounded-full">
        <i class="fa-solid fa-file"></i>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                    Information sur le demande de logement
                </h2>
            </template>
            <div>
                <div class="flex items-center text-lg px-5 py-3">
                    <p v-if="data.status == 'en attend'">
                        Nous avons reçu une demande de réservation en attente de confirmation de la part de <span class="font-bold">{{ data.noms
                        }}</span>,
                        pour la {{ data.chambre }}.
                        Les dates demandées pour le séjour sont du {{ data.date_debut }} au {{ data.date_fin }}.
                        <br>
                        La demande de réservation a été enregistrée le {{ new Date(data.date_reserve).toLocaleString()
                        }},
                        avec une adresse e-mail de contact associée à {{ data.email }}. Actuellement, le statut de cette
                        réservation
                        est en attente de confirmation.
                        <br>
                        Nous tenons à informer {{ data.noms }} que sa demande de réservation est en cours de traitement
                        et
                        qu'il recevra une notification dès que celle-ci sera confirmée ou refusée.
                    </p>
                    <p v-if="data.status == 'refuser'">
                        Malheureusement, la demande de réservation de<span class="font-bold">{{ data.noms }} </span> pour la {{ data.chambre }} a été
                        refusée.
                        Cette décision a été prise le {{ new Date(data.date_reserve).toLocaleString() }}. Si vous avez
                        des questions
                        ou des préoccupations.
                    </p>
                    <p v-if="data.status === 'accepter'">
                        Félicitations ! La demande de réservation de <span class="font-bold">{{ data.noms }}</span> pour la chambre <span class="font-bold">{{ data.chambre }}</span> a été
                        acceptée.
                        Votre séjour est prévu du <span class="font-bold">{{ data.date_debut }}</span> au <span class="font-bold">{{ data.date_fin }}</span>. Vous recevrez bientôt
                        une
                        confirmation officielle par e-mail à l'adresse {{ data.email }}. Nous vous attendons avec
                        impatience !
                    </p>
                </div>
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