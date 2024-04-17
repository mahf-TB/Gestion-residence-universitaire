<template>
    <div class="container ">
        <div class="mt-8 p-4 border-b bg-white border-gray-400 divide-y rounded-md shadow">
            <div class="bg-white rounded-md ">
                <h2 class="text-blue-2 text-xl text-center uppercase font-semibold ">
                    Liste de tous les Etudiant habite dans le cité
                </h2>
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px mb-4"></div>
                <div class="flex justify-between max-md:flex-col">
                    <!-- Recherche input en top -->
                    <div class="relative max-w-md w-full mb-1">
                        <div class="absolute top-1 left-2 inline-flex items-center p-2">
                            <i class="fas fa-search text-gray-400 "> </i>
                        </div>
                        <input v-model="query"
                            class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                            type="search" placeholder="Recherche..." />
                    </div>
                    <AjouterEtudiant></AjouterEtudiant>
                </div>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto overflow-x-auto divide-y divide-gray-200">
                        <thead class="bg-blue-1">
                            <tr>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Matricule
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Noms
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Ages
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Contact
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Ajouter
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-100 uppercase">
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" divide-y divide-gray-200">
                            <tr v-for="(row, index) in paginatedData" v-bind:key="index"
                                class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-3 py-3 border-b whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ row.matricule }}</div>
                                </td>
                                <td class="px-6 py-3 border-b   whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full"
                                                :src="require('@/assets/image/pdpNone.jpeg')" alt="" />
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ row.nom }}
                                            </div>
                                            <div class="text-sm text-gray-500">{{ row.prenom }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-3  border-b  whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ new Date(row.date_naissance).toLocaleDateString() }}
                                    </div>
                                    <div class="text-sm text-gray-500">CIN: {{ row.cin }}</div>
                                </td>
                                <td class="px-6 py-3  border-b whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ row.telephone }}</div>
                                    <div class="text-sm text-gray-500">{{ row.email }}</div>
                                </td>
                                <td class="px-6 py-3  border-b  whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                        {{ getDateAjouter(row.created_at) }}
                                    </span>
                                </td>
                                <td class="px-3 py-3  border-b whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ new Date(row.created_at).toLocaleDateString() }}
                                    </div>
                                </td>
                                <td class="px-6 py-3 border-b  text-sm font-medium text-center whitespace-nowrap">
                                    <div class="flex items-center justify-between text-[1rem]">
                                        <modifier-etudiant :id="row.id"  :getterEtudiant="getterEtudiant"></modifier-etudiant>
                                        <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-red-500  rounded-full"
                                            @click="deleteOne(row.id, row.nom)">
                                            <i class="fa-solid fa-trash-can text-[14px]"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="py-1 text-lg text-center">
                    <Paginator :rows="itemsPerPage" :totalRecords="length"
                        template="FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                        currentPageReportTemplate="Affichage {first} de {last} à {totalRecords}"
                        @page="handlePagination" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import Swal from 'sweetalert2'
import Paginator from 'primevue/paginator';
import AjouterEtudiant from '@/components/AdminComponents/Reservation/AjouterEtudiant.vue';
import ModifierEtudiant from '@/components/AdminComponents/Reservation/ModifierEtudiant.vue';
export default {
    name: 'Etudiant',
    components: { Paginator, AjouterEtudiant ,  ModifierEtudiant},
    data() {
        return {
            arrayData: [],
            itemsPerPage: 5,
            length: null,
            first: 0,
            query: '',
        }
    },
    mounted() {
        this.getterEtudiant();
    },
    computed: {
        paginatedData() {
            if (!this.arrayData) {
                return [];
            }
            this.length = this.arrayData.length
            const endIndex = this.first + this.itemsPerPage;
            return this.arrayData.slice(this.first, endIndex);
        },
    },
    methods: {
        async getterEtudiant() {
            try {
                var response = await Axios.get('/etudiants')
                this.arrayData = response.data.data.filter(items => {
                    return items.id_logement != null;
                });
            } catch (error) {
                console.error(error);
            }
        },

        deleteOne(id, nom) {
            console.log(id);
            Swal.fire({
                title: "Es-tu sûre de supprimer "+nom+"?",
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
                        const response = Axios.delete(`/etudiants/${id}`)
                        this.getterEtudiant();
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
        getDateAjouter(date) {
            let dateAjout = new Date(date);
            let dateNow = new Date()
            let dateNouveau = new Date(dateNow.getFullYear() - 1, dateNow.getMonth(), dateNow.getDate());
            let dateAcienne = new Date(dateNow.getFullYear() - 5, dateNow.getMonth(), dateNow.getDate());

            if (dateAjout > dateNouveau) {
                return 'Nouveaux Membre'
            }
            else if (dateAcienne < dateAjout && dateAjout <= dateNouveau) {
                return 'Membre'
            } else if (dateAcienne >= dateAjout) {
                return 'Ancien Membre'
            }

        },
        handlePagination(event) {
            this.first = event.first
            console.log(event);
        },

    }
}
</script>