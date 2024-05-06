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


                        <div class="my-4 ">
                            <div class="relative z-0">
                                <input type="email" name="name" v-model="email" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Quel est votre e-mail</label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
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
                        <div class="mb-4  flex flex-col">
                            <div class="relative z-0">
                                <input type="email" name="name" v-model="client.email" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Juste pour être sûr, votre email<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                           
                        </div>
                        <div class="flex items-center justify-between mb-4">
                             <!--  votre nom -->
                            <div class="relative pb-1 z-0 w-1/2 mr-1">
                                <input type="text" name="name" v-model="client.nom" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Entrer votre nom<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                            <!--  votre prenom -->
                            <div class="relative pb-1 z-0 w-1/2  ml-1">
                                <input type="text" name="name" v-model="client.prenom" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Entrer votre prenom<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                           
                        </div>
                        <div class="mb-4 flex flex-col">
                            <!--  Numéro du matricule -->
                            <div class="relative z-0">
                                <input type="text" name="name"  v-model="client.matricule" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Numéro du matricule<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                           
                        </div>
                        <div class="flex mb-4">
                            <!-- Date de naissance -->
                            <div class="relative pb-1 z-0 w-1/2 mr-1">
                                <input type="date" name="name" v-model="client.date_naissance" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Date de naissance<span class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                        
                            <!-- Civilité -->
                            <div class="relative pb-1 z-0 w-1/2  ml-1">
                                <select  name="name"   v-model="client.sexe" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " >
                                    <option disabled value="" class="text-sm">Selectionner ici</option>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Civilité<span class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                            
                        </div>
                        <div class="flex mb-4">
                            <!-- Numéros de CIN -->
                            <div class="relative pb-1 z-0 w-1/2 mr-1">
                                <input type="text" name="name" v-model="client.cin" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Numéros de CIN<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                           
                            <!-- Numéros du Telephone -->
                            <div class="relative pb-1 z-0 w-1/2  ml-1">
                                <input type="text" name="name"   v-model="client.telephone" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Numéros du Telephone<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                          
                        </div>
                        <div class="flex mb-4">
                            <!--  Date d'entree soundites , date debut -->
                            <div class="relative pb-1 z-0 w-1/2 mr-1">
                                <input type="date" name="name" v-model="client.date_debut" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " />
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Date d'entree soundites<span  class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
                            </div>
                           
                            <!-- Durée de location en mois -->
                            <div class="relative pb-1 z-0 w-1/2  ml-1">
                                <select  name="name"   v-model="mois" required
                                    :class="emptyEmail != '' ? 'border-red-600' : 'border-blue-3'"
                                    class="peer block w-full appearance-none border-b-2  bg-transparent py-2.5 px-0 text-sm  focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " >
                                    <option disabled value="" class="text-sm">moins de 1 mois</option>
                                    <option v-for="i of 36"  :key="i" :value="i">{{i}}</option>
                                </select>
                                <label :class="emptyEmail != '' ? ' text-red-600' : 'text-gray-500 '"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                    Durée de location<span class="text-red-500">*</span></label>
                                <p class="text-red-500 text-xs italic mb-1">{{ emptyEmail }}</p>
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
            mois:null,
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
        var tok = JSON.parse(localStorage.getItem('index'));
        this.index = tok ? tok : 0;
    },
    methods: {
        async enregistrer() {
            console.log(this.client);
            if (this.email == this.client.email) {
                try {
                    // const response = await Axios.post('/reservation', this.client)
                    // console.log(response);
                    this.client = []
                } catch (error) {
                    console.error(error)
                }
            } else {
                this.emptyEmail = 'verifiez votre E-mail '
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
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

            if (this.index < 1 || this.email != '') {
                if (this.index < 1 || this.email.match(validRegex)) {
                    localStorage.setItem("index", this.index += 1)
                    this.emptyEmail = ''
                } else {
                    this.emptyEmail = 'verifiez votre E-mail '
                }

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