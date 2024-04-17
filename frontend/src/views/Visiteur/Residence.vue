<template>
  <div class="">
    <div class="relative flex flex-col justify-center text-center bg-blue-0 py-[100px]">
      <h1 class="text-xxl text-blue-1">Toutes nos logement disponible dans la résidence</h1>
      <div class="flex  justify-center  ">
        <div class="relative max-w-xl mb-5 w-full">
          <div class="text-3xl flex items-center justify-between mt-3 text-blue-4 shadow rounded-md">
            <span class=" bg-blue-1 text-blue-0 px-3 py-2 h-14 rounded-s-md flex items-center ">
              <i class="fas fa-search" v-if="query == ''"></i>
              <i class="pi pi-spin pi-spinner" v-if="query != ''" style="font-size: 1.4rem"></i>
            </span>
            <input v-model="query"
              class="w-full h-14 pl-5 py-1 text-xl placeholder-gray-500 border border-blue-4 rounded-e-md" type="search"
              placeholder="Recherche..." />
          </div>
        </div>
      </div>
      <div class="absolute left-24 -bottom-20">
        <div class=" w-[400px] p-3">
          <div class="overflow-hidden">
            <img :src="require('@/assets/image/Batiment.png')" alt="Image"
              class="md:ml-auto block w-full h-[200px] object-cover animate-jump-in  animate-once animate-duration-[1500ms]">
          </div>
        </div>
      </div>
      <div class="absolute right-24 -bottom-20">
        <div class=" w-[400px] p-3">
          <div class="overflow-hidden">
            <img :src="require('@/assets/image/Batiment1.jpg')" alt="Image"
              class="md:ml-auto block w-full h-[200px] object-cover animate-jump-in  animate-once animate-duration-[1500ms]">
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-32">
      <div class="flex items-center justify-between">
        <div class="text-xl flex items-end text-blue-2  cursor-pointer">
          <span class="text-3xl mr-2">{{ dataArray.length }}</span>
          <span class="pb-[2px]">
            logement trouvés
          </span>
        </div>
        <div>
          <div>Appartements</div>
        </div>
      </div>
      <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px "></div>
      <div>
        <div class="bg-blue-0 h-full p-3 text-center" v-if="dataArray == '' ">
          <span class="font-semibold text-lg text-blue-2">Aucun résultat à trouver ...</span>
        </div>
        <div class="grid  grid-cols sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  mt-3">
          <div class="max-w-[300px] my-3 mx-3" v-for="(data, index) in paginatedData" :key="index">
            <CardLogement :data="data"></CardLogement>
          </div>
        </div>
        
        <div class="p-4 text-lg text-center mb-5 ">
          <Paginator :rows="itemsPerPage" :totalRecords="dataArray.length" @page="handlePagination" ></Paginator>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import CardLogement from '@/components/VisiteurComponents/cardLogement.vue';
import Paginator from 'primevue/paginator';
export default {
  name: 'Residence',
  components: {
    Paginator,CardLogement
  },
  data() {
    return {
      dataArray: [],
      itemsPerPage: 12,
      length: null,
      first: 0,
      query: ''
    }
  },
  computed:{
    paginatedData() {
      if (!this.dataArray) {
        return [];
      }
      this.length = this.dataArray.length
      const endIndex = this.first + this.itemsPerPage;
      return this.dataArray.slice(this.first, endIndex);
    },
  },
  mounted() {

    this.getAllLogement();
  },
  methods:{
    async getAllLogement(){
      try {
        var response = await Axios.get('/logement')
        this.dataArray = response.data;
        localStorage.setItem("index", 0)
      } catch (error) {
        console.error(error);
      }
    },
    handlePagination(event) {
      this.first = event.first
    },
   
  }

}
</script>

<style>
a {
    text-decoration-line: none;
}
</style>