<template>
  <div class="">
    <!-- <h1 class="text-xxl text-[#2b6b88]">Bienvenue dans le logement page</h1> -->
    <div class="mt-8 bg-white p-4 divide-y border-gray-400 rounded-md shadow ">
      <div class="bg-white rounded-md">

        <h2 class="text-blue-2 text-center uppercase text-xl font-semibold">Liste de tout les logement et sa disponiblité
        </h2>
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px mb-4"></div>
        <div class="flex justify-between max-md:flex-col">
          <!-- Recherche input en top -->
          <div class="relative max-w-md w-full mb-1">
            <div class="absolute top-1 left-2 inline-flex items-center p-2">
              <i class="fas fa-search text-blue-1 "> </i>
            </div>
            <input v-model="query"
              class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-blue-1 border border-blue-4 rounded-full focus:shadow-outline"
              type="search" placeholder="Recherche..." />
          </div>
          <div class="text-xl  pb-4">
            <button @click="this.$router.push('/user/residencescc')"
              class="uppercase bg-blue-2 hover:bg-blue-1 text-white text-sm py-2 px-3 rounded">
              <i class="fa-solid fa-plus pr-2"></i>Nouveaux
            </button>
          </div>
        </div>

        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
        <div class=" overflow-x-auto">
          <table class="w-full table-hover table-auto text-sm  overflow-x-scroll divide-y divide-gray-200">
            <thead>
              <tr class="text-sm leading-normal bg-blue-1 text-blue-0">
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  id
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Batiments
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  chambre
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Type
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Prix
                </th>

                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Date de création
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Status
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-100 uppercase">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg" v-for="(data, index) in paginatedData"
                v-bind:key="index">
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.id }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.batiment.nom_batiment }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.num_logement }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.type_logement }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.prix }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ new
              Date(data.created_at).toLocaleDateString() }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">
                  <span
                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                    :class="data.status == 'occuper' ? 'text-yellow-800 bg-yellow-100' : ''">
                    {{ data.status }}
                  </span>
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-center">
                  
                    <div class="flex items-center justify-around text-[1rem]">
                      <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-yellow-600  rounded-full"
                        @click="deleteOne(row.id)">
                        <i class="fa-solid fa-pen-to-square text-[14px]"></i>
                      </div>
                      <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-red-500 rounded-full"
                        @click="deleteOne(row.id)">
                        <i class="fa-solid fa-trash-can text-[14px]"></i>
                      </div>
                    </div>
                  
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="p-4 text-lg text-center">
          <Paginator :rows="itemsPerPage" :totalRecords="length"
            template="FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
            currentPageReportTemplate="Affichage {first} de {last} à {totalRecords}" @page="handlePagination" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import Paginator from 'primevue/paginator';
export default {
  name: 'Logement',
  components: {
    Paginator
  },
  data() {
    return {
      dataArray: [],
      itemsPerPage: 5,
      length: null,
      first: 0,
      query: '',
    }
  },
  computed: {
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
    this.getterLogement();
  },
  methods: {
    async getterLogement() {
      try {
        var response = await Axios.get('/logement')
        console.log(response.data);
        this.dataArray = response.data;
        console.log(this.dataArray);
      } catch (error) {
        console.error(error);
      }
    },
    handlePagination(event) {
      this.first = event.first
      console.log(event);
    },
  },
}
</script>