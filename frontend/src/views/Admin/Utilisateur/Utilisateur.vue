<template>
    <div class="">
        <!-- <h1 class="text-xxl text-[#2b6b88]">Bienvenue dans le logement page</h1> -->
        <div class="mt-8 bg-white p-4  border-b border-gray-400 divide-y  rounded-md shadow ">
            <div class="bg-white rounded-md">

                <h2 class="text-blue-2 text-center uppercase text-xl font-semibold">Liste de tout les Utilisateur et son
                    rôle
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
                        <ajouter-logement :getterUtilisateurs="getterUtilisateurs" ></ajouter-logement>
                    </div>
                </div>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                <div class="overflow-x-scroll">
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-blue-1">
                            <tr class="">
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    photo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Nom d'utilisateur
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Adresse e-mail
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Rôle
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-100 uppercase">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y  divide-gray-200" v-for="(data, index) in dataArray"
                            v-bind:key="index">
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="py-2 px-4 border-b border-grey-light text-left">
                                    {{ data.id }}
                                </td>

                                <td class="py-2 px-4 border-b border-grey-light text-left">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full"
                                                :src="require('@/assets/image/pdpNone.jpeg')" alt="" />
                                        </div>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.username }}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.email }}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-left">{{ data.type }}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-left">
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5  rounded-full"
                                        :class="data.type != 'user' ? 'text-yellow-700 bg-yellow-100' : 'text-green-800 bg-green-100'">
                                        {{ data.type == 'user' ? 'Etudiant' : 'Administratif' }}
                                    </span>
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-center">
                                    <div class="flex items-center justify-around text-[1rem]">
                                        <modifier-logement :id="data.id"
                                        :getterUtilisateurs="getterUtilisateurs" ></modifier-logement>
                                        <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-red-500 rounded-full"
                                            @click="deleteOne(data.id, data.username)">
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

import Swal from 'sweetalert2'
import Axios from '@/_Service/caller.service';
import Paginator from 'primevue/paginator';
import AjouterLogement from '@/components/AdminComponents/Utilisateur/AjouterUser.vue';
import ModifierLogement from '@/components/AdminComponents/Utilisateur/ModifierUser.vue';

export default {
    name: 'Utilisateur',
    components: {
        Paginator,
        AjouterLogement,
        ModifierLogement
    },
    data() {
        return {
            dataArray: [],
            itemsPerPage: null,
            length: null,
            query: '',
        }
    },
    computed: {
       
    },
    mounted() {
        this.getterUtilisateurs();
    },
    methods: {
        async getterUtilisateurs() {
            try {
                var response = await Axios.get('/utilisateurs')
                this.dataArray = response.data.data;
                this.length = response.data.total
                this.itemsPerPage = response.data.per_page
            } catch (error) {
                console.error(error);
            }
        },
        async handlePagination(event) {
            let page = event.page+1;
            try {
                var response = await Axios.get('/utilisateurs?page='+page)
                this.dataArray = response.data.data;

            } catch (error) {
                console.error(error);
            }
        
        },

        deleteOne(id, nom) {
            console.log(id);
            Swal.fire({
                title: "Es-tu sûre de supprimer " + nom + "?",
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
                        const response = Axios.delete(`/utilisateurs/${id}`)
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        this.getterUtilisateurs();
                    } catch (error) {
                        console.error(error);
                    }

                }
            });
        },
    },
}
</script>