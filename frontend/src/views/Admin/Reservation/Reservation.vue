<template>
  <div class="mt-24">
    <div class=" bg-white p-4 divide-y border-gray-400 rounded-md shadow ">
      <div class="relative rounded-md">
        <card-reservation :functStatus='getterReservation'></card-reservation>
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px mt-5 mb-4"></div>
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
            <!--  -->
          </div>
        </div>

        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
        <div class=" overflow-x-auto">
          <table class="w-full table-hover table-auto text-sm  overflow-x-scroll divide-y divide-gray-200">
            <thead>
              <tr class="text-sm leading-normal bg-blue-1 text-blue-0">
                <th class="pl-5 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  date de Reservation
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  noms
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  email
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  chambre
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  date du debut
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Date du fin
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Status
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-100 uppercase">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg" v-for="(data, index) in paginatedData"
                v-bind:key="index">
                <td class="py-2 border-b border-grey-light text-left">
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900"> {{ DateLocaLString(data.date_reserve) }}
                    </div>
                    <div class="text-sm text-gray-500">{{ new Date(data.date_reserve).toLocaleTimeString() }}</div>
                  </div>

                </td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.noms }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.email }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.chambre }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ DateLocaLString(data.date_debut) }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ DateLocaLString(data.date_fin)
                  }}</td>
                <td class="py-2 px-6 w-[150px] border-b border-grey-light text-left">
                  <span :class="isValide(data.status)"
                    class="inline-flex    items-center px-2 text-xs font-semibold leading-5 rounded-full">
                    <i :class="isIconValide(data.status)"></i>{{ data.status }}
                  </span>
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-center">
                  <div class="flex items-center justify-between text-[1rem]">
                    <detaille-validation :data="data"></detaille-validation>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="p-2 text-center bg-blue-0 w-full" v-if="paginatedData == ''">
            Aucune données trouver
          </div>
        </div>

        <div class="p-2 text-lg text-center">
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
import CardReservation from '@/components/AdminComponents/Reservation/CardReservation.vue';
import Paginator from 'primevue/paginator';
import Menu from 'primevue/menu';
import DetailleValidation from '@/components/AdminComponents/Reservation/DetailleValidation.vue';

export default {
  name: 'Reservation',
  components: {
    Paginator, Menu,
    CardReservation,
    DetailleValidation
  },
  data() {
    return {
      dataArray: [],
      itemsPerPage: 5,
      length: null,
      first: 0,
      query: '',
      items1: [
        { label: 'Accepter', command: () => this.getterLogement() },
        { label: 'Refuser', command: () => this.getterLogement() },
      ]
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
    this.getterReservation();

  },
  methods: {
    async getterReservation(data) {
      try {
        var response = await Axios.get(`/reservation?status=${data}`)
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    },

    handlePagination(event) {
      this.first = event.first
      console.log(event);
    },
    DateLocaLString(items) {
      return new Date(items).toLocaleDateString()
    },
    isValide(status) {
      if (status == 'accepter') {
        return "text-green-800 bg-green-100"
      }
      if (status == 'refuser') {
        return "text-red-800 bg-red-100"
      }
      return "text-yellow-800 bg-yellow-100"
    },
    isIconValide(status) {
      if (status == 'accepter') {
        return "fa-solid fa-circle-check mr-2"
      }
      if (status == 'refuser') {
        return "fa-solid fa-circle-xmark mr-2"
      }
      return "fa-solid fa-clock mr-2"
    },


  },
}
</script>