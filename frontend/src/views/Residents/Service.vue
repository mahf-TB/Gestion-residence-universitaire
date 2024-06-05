<template>
  <div class="container flex items-center flex-col justify-center">
    <!-- contenu center -->
    <div class="w-full lg:w-4/5 xl:w-3/5">
      <div class="bg-fotsy px-3 pt-2 mb-1 rounded-xl shadow">
        <div class="flex items-center justify-between w-full">
          <div class="p-1 flex items-center text-base text-blue-4  rounded transition-all ">
            <span class="px-2 py-1 cursor-pointer rounded-sm hover:bg-blue-1 hover:text-blue-0"><i class="fa-solid fa-filter"></i></span>
            <div class="text-blue-4">
              <span class="uppercase mx-1 font-bold ">
                {{ isCommande  ?  'Liste de votre commande' :'Services Disponible'}}
              </span>
            </div>
          </div>

          <div class="flex items-center justify-between">

            <div @click="commandeUser()"
              class="mx-1 px-3 py-1 flex items-center text-base text-blue-0 bg-blue-2 hover:bg-blue-1  rounded transition-all cursor-pointer">
              <span class="mx-2"><i class="fa-solid fa-cart-arrow-down"></i></span>
              <span class="mx-2 font-light ">
                Votre commande
              </span>
            </div>
          </div>
 
        </div>
        <div class="my-2 bg-gradient-to-r from-blue-900 to-blue-800 h-px"></div>
        <div class="flex items-center">
          <div :class="{ 'text-blue-2  border-b-4 border-blue-2': !liste }" @click="doListe()"
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-1  hover:text-blue-2 hover:bg-blue-0  rounded-t  transition-all cursor-pointer w-1/2">
            <span class="mx-2"><i class="fa-solid fa-table-cells-large"></i></span>
            <span class="mx-2 font-ligth ">
              Vue grille
            </span>
          </div>
          <div :class="{ 'text-blue-2  border-b-4 border-blue-2': liste }" @click="doListe()"
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-1  hover:text-blue-2 hover:bg-blue-0 rounded-t transition-all cursor-pointer  w-1/2">
            <span class="mx-2"><i class="fa-solid fa-list"></i></span>
            <span class="mx-2 font-ligth ">
              Vue liste
            </span>
          </div>
        </div>
      </div>
      <!-- Contenu liste des commande effectuer-->
      <div class="my-3" v-if="isCommande">
        <div v-for="(data, index) in commandes" :key="index">
          <card-commande-user :commande="data"></card-commande-user>
        </div>
        <div v-if="commandes == ''" class="my-2">
          <div class=" h-full p-2 text-center">
            <span class="font-semibold text-lg text-blue-2">Aucun commande effectuer</span>
          </div>
        </div>
      </div>

      <!-- Contenu liste des pub de service -->
      <div v-else class="container py-3" v-for="(data, i) in dataArray" :key="i">
        <ListeService :data="data"  :commandeUser="commandeUser"
        class="bg-fotsy hover:bg-gray-50"></ListeService>
      </div>
      <div  v-if="dataArray == ''" class="my-2">
        <div class=" h-full p-2 text-center">
          <span class="font-semibold text-lg text-blue-2">Aucun service disponible</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import ListeService from '@/components/ResidentComponents/ListeService.vue'
import CardCommandeUser from '@/components/ResidentComponents/CardCommandeUser.vue';
export default {
  name: 'Service',
  components: {
    ListeService,
    CardCommandeUser
  },
  data() {
    return {
      dataArray: [],
      commandes: [],
      liste:false,
      isCommande:false
    }
  },
  mounted() {
    this.getAllReparations()
  },
  methods: {
    async getAllReparations() {
      try {
        var response = await Axios.get('/index-service')
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async commandeUser() {
      try {
        var response = await Axios.get('/commande-user')
        this.commandes = response.data;
        this.isCommande = true;
      } catch (error) {
        console.error(error);
      }
    },
    doListe(){
      this.liste = !this.liste
      this.isCommande = false;
    }
  }
}
</script>