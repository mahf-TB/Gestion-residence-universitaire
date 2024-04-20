<template>
  <div class="container flex items-center flex-col justify-center">
    <!-- contenu center -->
    <div class=" w-[60%]">
      <div class="bg-fotsy px-3 pt-2 mb-1 rounded-xl shadow">
        <div class="flex items-center justify-between w-full">
          <div class="text-blue-4">
            <span class="uppercase mx-1 font-bold ">
              Services Disponible
            </span>
          </div>
          <div class="flex items-center justify-between">
            <div
              class="mx-1 px-3 py-1 flex items-center text-base text-blue-0 bg-blue-2 hover:bg-blue-1  rounded transition-all cursor-pointer">
              <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
              <span class="mx-2 font-light ">
                Filtres
              </span>
            </div>

          </div>

        </div>
        <div class="my-2 bg-gradient-to-r from-blue-900 to-blue-800 h-px"></div>
        <div class="flex items-center">
          <div
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-2  border-b-4 border-blue-2   transition-all cursor-pointer w-1/2">
            <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
            <span class="mx-2 font-ligth ">
              Vue Liste
            </span>
          </div>
          <div
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-2  hover:text-blue-2 hover:bg-blue-0 rounded transition-all cursor-pointer  w-1/2">
            <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
            <span class="mx-2 font-ligth ">
              Vue Grille
            </span>
          </div>
        </div>
      </div>
      <!-- Contenu liste des pub de service -->
      <div class="container py-3" v-for="(data, i) in dataArray" :key="i">
        <ListeService :data="data" class="bg-fotsy hover:bg-gray-50"></ListeService>
      </div>
    </div>
    <!-- right contenu -->
    <div class="my-2">
      <div class=" h-full p-2 text-center">
        <span class="font-semibold text-lg text-blue-2">Aucun service disponible</span>
      </div> 
    </div>


  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import ListeService from '@/components/ResidentComponents/ListeService.vue'
export default {
  name: 'Service',
  components: {
    ListeService
  },
  data() {
    return {
      dataArray:[]
    }
  },
  mounted() {
    this.getAllReparations()
  },
  methods: {
    async getAllReparations() {
      try {
        var response = await Axios.get('/index_service?type=resto')
        console.log(response.data)
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>