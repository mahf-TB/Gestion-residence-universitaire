<template>
    <div>
        <TabView :activeIndex="index">
            <TabPanel>
                <div class="absolute -top-11 left-0 px-3 py-2 text-lg cursor-pointer transition-all duration-300 hover:bg-blue-0 rounded"
                    @click="this.$router.push('/residences')">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Retour
                </div>
                <div class="min-w-[400px] mr-[50px]">
                    <h1 class=" text-2xl uppercase mb-4 font-light  text-blue-1">Votre choix est le <span
                            class="text-blue-2 font-bold">chambre N°: {{ loge.num_logement }}</span> <br />
                        <span class="font-semibold text-lg">dans le {{ bati.nom_batiment }} </span><br />
                        <span class=" text-base ml-3">{{ loge.type_logement }} à la {{ etage
                            }}</span>
                    </h1>
                    <div class="cursor-pointer w-[400px]">
                        <div class="p-3 flex items-center justify-between text-blue-1 shadow-md rounded">
                            <div class="uppercase">
                                <span>à prix de </span><br />
                                <span>{{ loge.prix }} ar/mois</span>
                            </div>
                            <div @click="passeIndex()"
                                class="rounded h-full bg-red-500 p-3 text-white hover:bg-blue-1 hover:text-blue-0 transition-all duration-500">
                                <span class="text-lg uppercase">
                                    Pré-réserver <i class="fa-solid fa-chevron-right ml-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="my-5">
                        <div>
                            <span class="font-semibold text-lg">Vous allez aimer</span>
                        </div>
                        <p class="line-height-3 text-sm m-0">
                        <ul class="pl-1">
                            <li class="my-2"><i class="fa-solid fa-heart text-red-600 mr-2"></i> Notre établissement
                                propose une connexion Wi-Fi haut débit gratuite</li>
                            <li class="my-2"><i class="fa-solid fa-heart text-red-600 mr-2"></i>Profitez d'une vue
                                spectaculaire depuis vos chambres </li>
                            <li class="my-2"><i class="fa-solid fa-heart text-red-600 mr-2"></i>Notre équipe de
                                concierges est à votre disposition pour répondre à tous vos besoins </li>
                            <li class="my-2"><i class="fa-solid fa-heart text-red-600 mr-2"></i>Dégustez une cuisine
                                raffinée et créative dans nos restaurants sur place.</li>
                            <li class="my-2"><i class="fa-solid fa-heart text-red-600 mr-2"></i>Vivez des moments
                                uniques en participant à nos événements spéciaux
                            </li>
                        </ul>
                        </p>
                    </div>
                    <div class="flex items-center justify-between mx-5">
                        <div class=" p-5 py-3 px-2 flex items-center justify-center cursor-pointer text-blue-1 border-3 border-blue-1 rounded hover:bg-blue-1 hover:text-blue-0 transition-all duration-300"
                            @click="this.$router.push('/residences')">
                            <span class="text-base uppercase ">
                                Partager l'annonce
                            </span>
                        </div>
                        <div class=" p-5 py-3 px-2 flex items-center justify-center cursor-pointer text-blue-0 border-3 border-blue-2 rounded bg-blue-2 hover:bg-blue-1 hover:border-blue-1 transition-all duration-300"
                            @click="this.$router.push('/residencesc')">
                            <span class="text-base uppercase ">
                                Demander un rendez-vous
                            </span>
                        </div>
                    </div>
                </div>
            </TabPanel>
            <TabPanel>
                <div class="container mr-5">

                    <div class="my-5">
                        <div class="absolute -top-11 left-0 px-3 py-2 text-lg cursor-pointer transition-all duration-300 hover:bg-blue-0 rounded"
                            @click="preveIndex()">
                            <i class="fa-solid fa-chevron-left mr-2"></i>Retour
                        </div>
                        <div class="text-3xl flex flex-col items-center justify-center mb-5 text-blue-1 ">
                            <div class="text-[4rem] mb-2">
                                <span> <i class="fa-solid fa-house-user p-4 rounded-full shadow-sm"></i></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-blue-2 font-bold">Bonjour,</span>
                            </div>
                            <span class="text-base mb-2"> Vous souhaitez faire une demande de réservation pour un
                            </span>

                            <span class="text-base underline">Chambre N°: {{ loge.num_logement }}</span>
                        </div>
                    </div>
                    <div class="m-0">
                        <div class="mb-2 text-3xl">
                            <span class="text-blue-2 font-bold">Comment pouvons-nous vous contacter ?</span>
                        </div>
                        <div class="mt-3">
                            <span class="text-base mb-2">Quel est votre e-mail </span>
                        </div>
                        <div class="mb-4 border-b-2 pb-2 ">
                            <input type="email"
                                class="rounded-[4px] w-full p-2 text-[16px] bg-blue-0 border-none placeholder:text-blue-1  mb-1  border-1 border-gray-400 hover:border-blue-2"
                                name="integration[prenom]" required placeholder="Entrer votre email" v-model="email" />
                            <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                        </div>
                        <button
                            class=" p-5 py-2 px-3 flex items-center justify-center cursor-pointer text-blue-0 border-3 border-blue-2 rounded bg-blue-2 hover:bg-blue-1 hover:border-blue-1 transition-all duration-300"
                            @click="passeIndex()">
                            <span class="text-base uppercase ">
                                suivante
                            </span>
                        </button>

                    </div>
                </div>
            </TabPanel>
            <TabPanel>
                <div class="absolute -top-11 left-0 px-3 py-2 text-lg cursor-pointer transition-all duration-300 hover:bg-blue-0 rounded"
                    @click="preveIndex()">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Retour
                </div>
                <form @submit.prevent="enregistrer()" class="px-1">
                    <div class="flex flex-col text-sm rounded-md">
                        <!-- adresse email -->
                        <div class="mb-3 border-b-2 pb-1 flex flex-col">
                            <label for="integration[email]" class="my-1 text-sm">Juste pour être sûr<span
                                    class="text-red-500">*</span></label>
                            <input type="email"
                                class="rounded-[4px]  p-2 text-[14px]  mb-1 bg-blue-0 border-none placeholder:text-blue-1"
                                name="integration[email]" required placeholder="Confirmation d'E-mail"
                                v-model="client.email" />
                        </div>
                        <div class="flex mb-3">
                            <!-- adresse email ou username -->
                            <div class="grow flex flex-col mr-1 border-b-2 pb-1 ">
                                <label for="integration[name]" class="my-1 text-sm">Nom<span
                                        class="text-red-500">*</span></label>
                                <input type="text"
                                    class="rounded-[4px]  p-2 text-[14px]  mb-1  bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[name]" required placeholder="Entrer votre nom"
                                    v-model="client.nom" />
                            </div>
                            <!-- adresse email ou username -->
                            <div class="grow flex flex-col ml-1 border-b-2 pb-1 ">
                                <label for="integration[prenom]" class="my-1 text-sm">Prenom<span
                                        class="text-red-500">*</span></label>
                                <input type="text"
                                    class="rounded-[4px] p-2 text-[14px]  mb-1 bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[prenom]" required placeholder="Entrer votre prenom"
                                    v-model="client.prenom" />
                            </div>
                        </div>
                        <div class="mb-3 border-b-2 pb-1 flex flex-col">
                            <label for="integration[email]" class="my-1 text-sm">Matricule<span
                                    class="text-red-500">*</span></label>
                            <input type="text"
                                class="rounded-[4px]  p-2 text-[14px]  mb-1 bg-blue-0 border-none placeholder:text-blue-1"
                                name="integration[email]" required placeholder="Votre matricule"
                                v-model="client.matricule" />
                        </div>
                        <div class="flex mb-3">
                            <!-- adresse email ou username -->
                            <div class="grow flex flex-col mr-1 border-b-2 pb-1">
                                <label for="integration[name]" class="my-1 text-sm">Date de naissance<span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="rounded-[4px] p-2 text-[14px]  mb-1 text-blue-1 bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[name]" required placeholder="Entrer votre Nom"
                                    v-model="client.date_naissance" />
                            </div>
                            <!-- adresse email ou username -->
                            <div class="grow flex flex-col ml-1 border-b-2 pb-1">
                                <label for="sexe" class="my-1 text-sm">Civilité<span
                                        class="text-red-500">*</span></label>
                                <select
                                    class=" w-100  mb-1 rounded-[4px] p-[10px] text-[14px] text-blue-1 bg-blue-0 border-none placeholder:text-blue-1"
                                    v-model="client.sexe" aria-label="Default select example" id="sexe" name="sexe"
                                    required>
                                    <option disabled value="" class="text-sm">Selectionner ici</option>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <!-- adresse email ou username -->
                            <div class="grow flex flex-col mr-1 border-b-2 pb-1 ">
                                <label for="integration[name]" class="my-1 text-sm">CIN</label>
                                <input type="text" maxlength="12" minlength="12"
                                    class="rounded-[4px]  p-2 text-[14px]  mb-1  bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[name]" required placeholder="Numéro d'identité National"
                                    v-model="client.cin" />
                            </div>
                            <!-- adresse email ou username -->
                            <div class="grow flex flex-col ml-1 border-b-2 pb-1 ">
                                <label for="integration[prenom]" class="my-1 text-sm">Telephone<span
                                        class="text-red-500">*</span></label>
                                <input type="text" maxlength="13" minlength="10"
                                    class="rounded-[4px] p-2 text-[14px]  mb-1 bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[prenom]" required placeholder="Votre numéro telephone"
                                    v-model="client.telephone" />
                            </div>
                        </div>
                        <div class="flex">
                            <!-- adresse email -->
                            <div class="grow flex flex-col mr-1   border-b-2 pb-1">
                                <label for="integration[debut]" class="my-1 text-sm">Date debut<span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="rounded-[4px]  p-2 text-[14px]  mb-1  text-blue-1 bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[debut]" required placeholder="Entrer votre Nom"
                                    v-model="client.date_debut" />
                            </div>
                            <!-- adresse email -->
                            <div class="grow flex flex-col ml-1  border-b-2 pb-1">
                                <label for="integration[fin]" class="my-1 text-sm">Date fin<span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="rounded-[4px] p-2 text-[14px]  mb-1 text-blue-1  bg-blue-0 border-none placeholder:text-blue-1"
                                    name="integration[fin]" required placeholder="Entrer votre Nom"
                                    v-model="client.date_fin" />
                            </div>
                        </div>
                    </div>
                    <button
                        class="mt-3 w-full border p-2 uppercase bg-gradient-to-r from-blue-800 bg-blue-500 text-white rounded-[4px] hover:bg-slate-400 scale-105 duration-300"
                        type="submit">
                        Envoyez votre demande
                    </button>
                </form>
            </TabPanel>
        </TabView>

    </div>
</template>
<script>


import Axios from '@/_Service/caller.service';
import VueMultiselect from 'vue-multiselect'
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import { computed } from 'vue';

export default {
    name: 'FormReservation',
    components: { VueMultiselect, TabView, TabPanel },
    data() {
        return {
            id: this.$route.params.id,
            client: {
                matricule: '',
                nom: '',
                prenom: '',
                email: '',
                date_naissance: '',
                cin: '',
                sexe: '',
                telephone: '',
                id_logement: this.$route.params.id,
                date_debut: null,
                date_fin: null,
            },
            loge: [],
            bati: [],
            etage: '',
            email: '',
            index: 0,
            emptyEmail: '',

        }
    },
    mounted() {
        this.getOneLogement();
        this.index = JSON.parse(localStorage.getItem('index'));
    },
    methods: {
        async enregistrer() {
            console.log(this.client);
            if (condition) {
                try {
                    const response = await Axios.post('/reservation', this.client)
                    console.log(response);
                    this.client = []
                } catch (error) {
                    console.error(error)
                }
            }

        },
        async getOneLogement() {
            try {
                var response = await Axios.get(`/logement/${this.id}`)
                this.loge = response.data
                this.bati = this.loge.batiment
                this.etage = this.loge.num_logement.charAt(0)
                if (this.etage == '1') {
                    this.etage = '1ére Etage'
                } else {
                    this.etage = this.etage + 'éme Etage'
                }
            } catch (error) {
                console.error(error);
            }
        },
        passeIndex() {
            if (this.index < 1 || this.email != '') {
                localStorage.setItem("index", this.index += 1)
            } else {
                this.emptyEmail = 'Veillez entre votre E-mail pour vous contactez'
            }
        },
        preveIndex() {
            if (this.index > 0) {
                localStorage.setItem("index", this.index -= 1)
            }
        },
    }
}
</script>

<style>
.multiselect {
    min-height: 50px;
}

.p-tabview-nav-content {
    display: none;
}
</style>