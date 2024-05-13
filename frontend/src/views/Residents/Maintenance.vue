<template>
  <div class="container flex items-center flex-col justify-center">

    <div class="w-full lg:w-4/5 xl:w-3/5">
      <!-- card pour envoyer demande de maintenance -->
      <div class="bg-fotsy px-3 pt-3 rounded-xl shadow-sm">
        <div class="flex w-full">
          <img :src="user.photo ? user.photo : require('@/assets/image/pdpNone.jpeg')"
            class="h-12 w-16 object-cover cursor-pointer rounded-full" alt="photo de profile">
          <demande-maintenance :getAllReparations="getAllReparations"></demande-maintenance>
          <div
            class="mx-1 px-3  my-1 flex items-center text-sm text-blue-0 bg-blue-2 hover:bg-blue-1   rounded transition-all cursor-pointer">
            <span class="mx-1"><i class="fa-solid fa-filter "></i></span>
            <span class="mx-1 font-light ">
              Filtres
            </span>
          </div>
        </div>
        <div class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
        <div class="flex items-center">
          <div :class="{ 'text-blue-2  border-b-4 border-blue-2': !liste }" @click="doListe()"
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-1 hover:text-blue-1 hover:bg-blue-0 transition-all rounded-t  cursor-pointer w-1/2">
            <span class="mx-2"><i class="fa-solid fa-list"></i></span>
            <span class="mx-2 font-ligth ">
              Vue liste
            </span>
          </div>
          <!-- hover:text-blue-1 hover:bg-blue-0 -->
          <div :class="{ 'text-blue-2  border-b-4 border-blue-2': liste}" @click="doListe()"
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-1 hover:text-blue-1 hover:bg-blue-0  transition-all rounded-t  cursor-pointer  w-1/2">
            <span class="mx-2"><i class="fa-solid fa-table-cells-large"></i></span>
            <span class="mx-2 font-ligth ">
              Vue grille
            </span>
          </div>
        </div>
      </div>
      <!-- card pour liste le damnde effectuer -->
      <div class="my-2" v-if="dataArray == ''">
        <div class=" h-full p-2 text-center">
          <span class="font-semibold text-lg text-blue-2">Aucune demande effectué</span>
        </div>
      </div>
    </div>
    <!-- card pour liste le damnde effectuer  -->
    <liste-reparer class="my-3" :dataArray="dataArray" v-if="dataArray != ''"></liste-reparer>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import DemandeMaintenance from '@/components/ResidentComponents/DemandeMaintenance.vue'
import ListeReparer from '@/components/ResidentComponents/ListeReparer.vue'
export default {
  name: 'Maintenance',
  components: {
    DemandeMaintenance, ListeReparer
  },
  data() {
    return {
      dataArray: [],
      user: [],
      liste : false,
    }
  },
  mounted() {
    this.getAllReparations()
    this.getUser()
  },
  methods: {
    async getAllReparations() {
      try {
        var response = await Axios.get('/index_reparer')
        console.log(response.data)
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async getUser() {
      let token = JSON.parse(localStorage.getItem('token'))
      if (token) {
        const res = await Axios.get('userConnect')
        if (res.data.status == 'success') {
          console.log(res.data)
          this.user = res.data.user
          console.log(this.user)
        }
      }
    },
    doListe(){
      this.liste = !this.liste
      this.getAllReparations()
    }
  }
}
</script>