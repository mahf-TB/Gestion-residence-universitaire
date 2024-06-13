<template>
  <div class="mt-24 mb-10">
    <div class=" bg-white p-4  divide-y border-gray-400 rounded-md shadow ">
      <div class="relative rounded-md">
        <card-reservation :getterMaintenance="getterMaintenance"></card-reservation>
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
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Date du demande
                </th>
                <th class="pl-5 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  type de probleme
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Description
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Nom
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  chambre
                </th>
                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Batiment
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
              <tr class="transition-all h-11 hover:bg-gray-100 hover:shadow-lg" v-for="(data, index) in paginatedData"
                v-bind:key="index">
                <td class="py-2 border-b border-grey-light text-left">
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900"> {{ DateLocaLString(data.date) }}
                    </div>
                    <div class="text-sm text-gray-500">{{ new Date(data.date).toLocaleTimeString() }}</div>
                  </div>

                </td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.type }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left ">
                  <div class="h-10 overflow-hidden">
                    {{ data.design }}
                  </div>
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.etudiant }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.logement }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.batiment
                  }}</td>
                <td class="py-2 px-6 w-[150px] border-b border-grey-light text-left">
                  <span :class="isValide(data.status)"
                    class="inline-flex    items-center px-2 text-xs font-semibold leading-5 rounded-full">
                    <i :class="isIconValide(data.status)"></i>{{ data.status }}
                  </span>
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-center">
                  <div v-if="auth_user.type == 'P-maintenance'" class="flex items-center justify-between text-[1rem]">
                    <detaille-validation :data="data"></detaille-validation>
                  </div>
                  <div v-else>
                    <a title="Edit password" class="hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                      </svg>
                    </a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="p-2 text-center bg-blue-0 w-full" v-if="paginatedData == ''">
            Aucune données trouver
          </div>
        </div>
        <div class="p-1 text-lg text-center">
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
import CardReservation from '@/components/AdminComponents/Maintenance/CardDemande.vue';
import Paginator from 'primevue/paginator';
import Menu from 'primevue/menu';
import DetailleValidation from '@/components/AdminComponents/Maintenance/DetailleDemande.vue';

export default {
  name: 'ListeDemande',
  props: { auth_user: Object },
  components: {
    Paginator, Menu,
    CardReservation,
    DetailleValidation
  },
  data() {
    return {
      dataArray: [],
      itemsPerPage: 4,
      length: null,
      first: 0,
      query: '',

    }
  },
  computed: {
    paginatedData() {
      if (this.query != '') {
        const query = this.query.toLowerCase();
        let data = this.dataArray.filter(item => {
          return item.design.toLowerCase().includes(query)
            || item.etudiant.toLowerCase().includes(query)
            || item.logement.toLowerCase().includes(query)
            || item.batiment.toLowerCase().includes(query)
            || item.status.toLowerCase().includes(query)
            || item.type.toLowerCase().includes(query)
            || this.DateLocaLString(item.date).toLowerCase().includes(query);
        });

        this.length = data.length
        const endIndex = this.first + this.itemsPerPage;
        return data.slice(this.first, endIndex);
      }
      if (!this.dataArray) {
        return [];
      }
      this.length = this.dataArray.length
      const endIndex = this.first + this.itemsPerPage;
      return this.dataArray.slice(this.first, endIndex);
    },
  },
  mounted() {
    this.getterMaintenance();

  },
  methods: {
    async getterMaintenance(status) {
      try {
        var response = await Axios.get('/maintenance?status=' + status)
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
      if (status == 'terminer') {
        return "text-green-800 bg-green-100"
      }
      if (status == 'en cours') {
        return "text-yellow-800 bg-yellow-100"
      }
      return "text-red-800 bg-red-100"
    },
    isIconValide(status) {
      if (status == 'terminer') {
        return "fa-solid fa-circle-check mr-2"
      }
      return "fa-solid fa-clock mr-2"
    },


  },
}
</script>