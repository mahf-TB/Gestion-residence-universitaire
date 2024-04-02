<template>
    <div @click="visible = true" class="text-center  py-2 px-3 text-lg cursor-pointer text-yellow-600  rounded-full">
        <i class="fa-solid fa-file"></i>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem' }"
            :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
            <template #header>
                <h2 class="text-lg text-center m-0 text-blue-2 uppercase font-semibold ">
                    Detailler pour le réparation
                </h2>
            </template>
            <div>
                <div class="flex items-center text-lg px-2 py-3">
                    <div class="flex flex-col text-sm rounded-md ">
                        <div class="flex mb-3 text-lg items-center">
                           <span class="mr-3">Date du demande : {{ new Date(data.date).toLocaleDateString() }}   à </span>
                           <span class="text-sm text-gray-500"> {{ new Date(data.date).toLocaleTimeString() }}</span>
                        </div>
                        <div class="flex mb-3 text-lg items-center">
                            Type du probleme : <span class="ml-3">{{ data.type }}</span>
                        </div>
                        <div class="flex mb-3 text-lg items-center">
                             <span class="ml-3 text-gray-500">{{ data.design }}</span>
                        </div>
                        <div class="flex mb-3 text-lg items-center">
                            Par : <span class="ml-3">{{ data.etudiant }}</span>
                        </div>
                        <div class="flex mb-3 text-lg items-center">
                            Dans : <span class="mx-3">{{ data.logement }}</span>
                            Du : <span class="ml-3">{{ data.batiment }}</span>
                        </div>
                   </div>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px my-3"></div>
                <div class="flex items-center justify-end" v-if="data.status == 'en attend'">
                    <button @click="visible = false"
                        class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-danger  rounded-full">
                        Non
                    </button>
                    <button @click="reparationEncours('encours',data)"
                        class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-primary rounded-full">
                        <i class="fa-solid fa-hammer"></i> Reparer
                    </button>
                </div>
                <div class="flex items-center justify-end" v-if="data.status == 'en cours'">
                    <button @click="visible = false"
                        class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-danger  rounded-full">
                         Non
                    </button>
                    <button @click="reparationEncours('terminer',data)"
                        class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-primary rounded-full">
                        <i class="fa-solid fa-hammer"></i> Terminer
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
    name: 'DetailleDemande',
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
        async reparationEncours(status,data) {
            let post = {
                'id': data.id,
                'type': data.type,
            }
            console.log(response);
            try {
                var response = await Axios.post(`/updateReparation?status=${status}`, post);
                console.log(response);
                this.visible = false
            } catch (error) {
                console.error('holllaallaaa.  ',error);
            }
        },
    }
}
</script>