<template>
  <div class="container flex items-center flex-col justify-center">

    <div class=" w-[60%]">
      <div class="bg-blue-0 px-3 pt-3 rounded-xl shadow-sm">
        <div class="flex w-full">
          <img :src="require('@/assets/image/pdpNone.jpeg')"
            class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full" alt="photo de profile">
          <demande-maintenance></demande-maintenance>
          <div
            class="mx-1 px-3  my-1 flex items-center text-sm text-blue-0 bg-blue-1 hover:bg-slate-50 hover:text-blue-1 rounded transition-all cursor-pointer">
            <span class="mx-1"><i class="fa-regular fa-calendar-days "></i></span>
            <span class="mx-1 font-light ">
              Filtres
            </span>
          </div>
        </div>
        <div class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
        <div class="flex items-center">
          <div
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-2  border-b-4 border-blue-2  transition-all cursor-pointer w-1/2">
            <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
            <span class="mx-2 font-bold ">
              Vue Liste
            </span>
          </div>
          <div
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-1 hover:text-blue-1 hover:bg-slate-50 rounded transition-all cursor-pointer  w-1/2">
            <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
            <span class="mx-2 font-bold ">
              Vue Grille
            </span>
          </div>
        </div>
      </div>
      <div class="my-2" v-if="dataArray== ''">
        <div class=" h-full p-2 text-center">
          <span class="font-semibold text-lg text-blue-2">Aucune demande effectué</span>
        </div>
      </div>
    </div>
    <!-- right contenu -->
    <liste-reparer class="my-3" :dataArray="dataArray"  v-if="dataArray!= ''" ></liste-reparer>
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
      dataArray: []
    }
  },
   mounted() { this.getAllReparations()},
  methods: {
    async getAllReparations() {
      try {
        var response = await Axios.get('/index_reparer')
        this.dataArray = response.data;;
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>