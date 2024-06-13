<template>
  <div class="">
    <!-- <h1 class="text-xxl text-[#2b6b88]">Bienvenue dans le logement page</h1> -->
    <div class="mt-8 bg-white p-4  border-b border-gray-400 divide-y  rounded-md shadow ">
      <div class="bg-white rounded-md">

        <h2 class="text-blue-2 text-center uppercase text-xl font-semibold">Liste de tout les logement et sa
          disponiblité
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
            <ajouter-logement :getterLogement="getterLogement"></ajouter-logement>
          </div>
        </div>
        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
        <div class="overflow-x-scroll">
          <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-1">
              <tr class="">
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  #
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Batiments
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  chambre
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Type
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Prix
                </th>

                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Date de modification
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                  Status
                </th>
                <th scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-100 uppercase">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y  divide-gray-200" v-for="(data, index) in paginatedData" v-bind:key="index">
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                <td class="py-2 px-4 border-b border-grey-light text-left" @click="expandTable(index, data.id)">
                  <i class="fa-solid fa-plus" aria-hidden="true" v-if="!expandData.includes(index)"></i>
                  <i class="fa-solid fa-minus" aria-hidden="true" v-else></i>
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.batiment.nom_batiment }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.num_logement }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.type_logement }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.prix }}</td>
                <td class="py-2 px-4 border-b border-grey-light text-left">
                  {{ new Date(data.date).toLocaleDateString() }}
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-left">
                  <span
                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                    :class="data.status == 'occuper' ? 'text-yellow-800 bg-yellow-100' : ''">
                    {{ data.status }}
                  </span>
                </td>
                <td class="py-2 px-4 border-b border-grey-light text-center">
                  <div class="flex items-center justify-around text-[1rem]">
                    <modifier-logement :id="data.id" :getterLogement="getterLogement"></modifier-logement>
                    <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-red-500 rounded-full"
                      @click="deleteOne(data.id, data.num_logement + ' ' + data.batiment.nom_batiment)">
                      <i class="fa-solid fa-trash-can text-[14px]"></i>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="">
                <td colspan="1" v-if="expandData.includes(index)"></td>
                <td colspan="7" v-if="expandData.includes(index)">
                  <table class="w-full text-sm ">
                    <thead class="bg-blue-0 w-full" v-if="dataRows != ''">
                      <th class="px-6 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Noms
                      </th>
                      <th class="px-6 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Adresse email
                      </th>
                      <th class="px-6 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Numero telephone
                      </th>
                    </thead>
                    <thead class="bg-blue-0 w-full" v-if="dataRows == ''">
                      <th colspan="3"
                        class="px-6 py-3 text-center text-xs font-medium tracking-wider  text-gray-500 uppercase">
                        Aucun etudiant habite dans cette logement
                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="(dataRow, index) in dataRows" :key="index" class="bg-gray-200">
                        <td class="py-2 px-4 border-b border-grey-light text-left">{{ dataRow.nom + ' ' + dataRow.prenom
                          }}</td>
                        <td class="py-2 px-4 border-b border-grey-light text-left">{{ dataRow.email }}</td>
                        <td class="py-2 px-4 border-b border-grey-light text-left">{{ dataRow.telephone }}</td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="p-2 text-center bg-blue-0 w-full" v-if="paginatedData == ''">
            Aucune données trouver
          </div>
        </div>
        <div class="py-1 text-lg text-center">
          <Paginator :rows="itemsPerPage" :totalRecords="length"
            template="FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
            currentPageReportTemplate="Affichage {first} de {last} à {totalRecords}" @page="handlePagination" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Swal from 'sweetalert2'
import Axios from '@/_Service/caller.service';
import Paginator from 'primevue/paginator';
import AjouterLogement from '@/components/AdminComponents/Reservation/AjouterLogement.vue';
import ModifierLogement from '@/components/AdminComponents/Reservation/ModifierLogement.vue';

export default {
  name: 'Logement',
  components: {
    Paginator,
    AjouterLogement,
    ModifierLogement
  },
  data() {
    return {
      dataArray: [],
      itemsPerPage: 5,
      length: null,
      first: 0,
      query: '',
      expandData: [],
      dataRows: []

    }
  },
  computed: {
    paginatedData() {
      if (this.query != '') {
        const query = this.query.toLowerCase();
        let data = this.dataArray.filter(item => {
          return item.num_logement.toLowerCase().includes(query)
            || item.type_logement.toLowerCase().includes(query)
            || item.prix.toString().toLowerCase().includes(query)
            || item.status.toLowerCase().includes(query)
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
    this.getterLogement();
  },
  methods: {
    async getterLogement() {
      try {
        var response = await Axios.get('/logement')
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    handlePagination(event) {
      this.expandData = []
      this.first = event.first
    },
    DateLocaLString(items) {
      return new Date(items).toLocaleDateString()
    },
    // etudiant_logement
    async expandTable(index, dataId) {
      var id = this.expandData.indexOf(index);
      try {
        var response = await Axios.get(`/etudiant_logement?id=${dataId}`);
        this.dataRows = response.data;
      } catch (error) {
        console.error(error);
      }
      if (id > -1) {
        this.expandData.splice(id, 1);
      } else {
        this.expandData = []
        this.expandData.push(index);

      }

    },
    deleteOne(id, nom) {
      console.log(id);
      Swal.fire({
        title: "Es-tu sûre de supprimer logement N°: " + nom + "?",
        text: "Vous ne serez pas en mesure d'inverser cela.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Annuler!",
        confirmButtonText: "Oui, supprimez-le!",

      }).then(async (result) => {
        if (result.isConfirmed) {
          try {
            const response = Axios.delete(`/logement/${id}`)
            // this.getterEtudiant();
            console.log(response)
            Swal.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success"
            });
          } catch (error) {
            console.error(error);
          }

        }
      });
    },
  },
}
</script>