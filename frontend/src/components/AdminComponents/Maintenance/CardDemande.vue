<template>
    <div class="absolute -top-[150px] w-full text-white   rounded-md text-center  text-xl ">
          <div class="flex items-center justify-around">
            <div class="px-4 py-3 bg-white text-orange-600 rounded shadow ">
              <h1 class="text-lg flex items-center justify-between">Demande en attente
                <span class="ml-5 bg-orange-100 px-3 py-2 rounded"><i class="fa-solid fa-toolbox"></i></span>
              </h1>
              <div class="text-3xl flex items-center justify-between mt-3 text-blue-3">
                <span>{{ count.attente }}</span>
                <span class="text-sm ml-3 cursor-pointer flex items-center hover:text-blue-1">Cliquez ici pour afficher
                  <i class="fa-solid fa-angle-right ml-1"></i> </span>
              </div>
            </div>
            <div class="px-4 py-3 bg-white text-yellow-600 rounded shadow cursor-pointer ">
              <h1 class="text-lg flex items-center justify-between">Réparation en cours
                <span class="ml-5 bg-yellow-100 px-3 py-2 rounded"><i class="fa-solid fa-screwdriver-wrench"></i></span>
              </h1>
              <div class="text-3xl flex items-center justify-between mt-3 text-blue-3">
                <span>{{ count.refuse }}</span>
                <span class="text-sm ml-3 cursor-pointer flex items-center hover:text-blue-1">Cliquez ici pour afficher
                  <i class="fa-solid fa-angle-right ml-1"></i> </span>
              </div>
            </div>
            <div class="px-4 py-3 bg-white text-green-600 rounded shadow cursor-pointer">
              <h1 class="text-lg flex items-center justify-between">Réparation terminée
                <span class="ml-5 bg-green-100 px-3 py-2 rounded"><i class="fa-solid fa-square-check"></i></span>
              </h1>
              <div class="text-3xl flex items-center justify-between mt-3 text-blue-3">
                <span>{{ count.accepte }}</span>
                <span class="text-sm ml-3 cursor-pointer flex items-center hover:text-blue-1">Cliquez ici pour afficher
                  <i class="fa-solid fa-angle-right ml-1"></i> </span>
              </div>
            </div>
          </div>
        </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
export default {
    name :'CardDemande',
    data(){
        return {
            count: {
        attente: 0,
        accepte: 0,
        refuse: 0,
      }
        }
    },
    mounted() {
    this.getNbDemande();
  },
  methods:{
    async getNbDemande() {
      try {
        var response = await Axios.get('/count_status')

        let data = response.data;
        data.forEach(items => {
          if (items.status == 'en cours') {
            this.count.refuse = items.nombre
          } else if (items.status == 'terminer') {
            this.count.accepte = items.nombre
          } else {
            this.count.attente = items.nombre
          }
        });
      } catch (error) {
        console.error(error);
      }
    },
  }
}
</script>