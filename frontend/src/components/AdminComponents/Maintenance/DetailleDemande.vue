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
            <section class="bg-white">
                <div class="container px-2 py-4 mx-auto">
                    <div class="mt-2 lg:-mx-6 lg:flex lg:items-start">
                        <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" :src="data.image"
                            alt="pdp ">
                        <div class="mt-4 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                            <div class="flex items-center ">
                                <div>
                                    <img class="object-cover object-center w-12 h-12 rounded-full"
                                        src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                                        alt="">
                                </div>
                                <div class="mx-2">
                                    <h1 class="text-sm text-gray-700">{{ data.etudiant }}</h1>
                                    <div class="flex  text-xs items-center">
                                        <span class=" text-gray-500">
                                            {{ new Date(data.date).toLocaleDateString() + ' à ' + new
                                                Date(data.date).toLocaleTimeString()
                                            }}
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <p class="text-sm m-3 text-blue-500 uppercase"><span class="">{{ data.type }}</span>
                            </p>
                            <a href="#"
                                class="block mb-3 text-base font-semibold text-gray-800 hover:underline">
                                {{ data.logement +' dans le '+ data.batiment}}
                            </a>

                            <p class="mt-3 text-sm text-gray-700  md:text-sm">
                                {{ data.design }}
                            </p>
                            <div class="flex items-center justify-end" v-if="data.status == 'en attente'">
                                <button @click="visible = false"
                                    class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-danger  rounded-full">
                                    Retour
                                </button>
                                <button @click="reparationEncours('encours', data)"
                                    class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-primary rounded-full">
                                    <i class="fa-solid fa-hammer"></i> Reparer
                                </button>
                            </div>
                            <div class="flex items-center justify-end" v-if="data.status == 'en cours'">
                                <button @click="visible = false"
                                    class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-danger  rounded-full">
                                    Retour
                                </button>
                                <button @click="reparationEncours('terminer', data)"
                                    class="text-center hover:shadow-lg mx-2 text-lg cursor-pointer btn btn-primary rounded-full">
                                    <i class="fa-solid fa-hammer"></i> Terminer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        async reparationEncours(status, data) {
            try {
                var response = await Axios.get(`/reparer?status=${status}&id=${data.id}`);
                console.log(response);
                this.visible = false
            } catch (error) {
                console.error('holllaallaaa.  ', error);
            }
        },
    }
}
</script>