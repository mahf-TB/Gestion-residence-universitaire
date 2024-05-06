<template>
    <div class="bg-fotsy">
        <div class="relative  text-blue-4">
            <main class="container flex justify-center pt-2">
                <div class="flex flex-col mt-2 overflow-auto ">
                    <div class="bg-fotsy pt-3 rounded-xl flex">
                        <profile-card-vue></profile-card-vue>
                    </div>
                    <div class="mt-3">
                        <div class=" px-3 py-3 rounded-xl ">
                            <div class="flex w-full">
                                <img :src="require('@/assets/image/pdpNone.jpeg')"
                                    class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full"
                                    alt="photo de profile">
                                <publication></publication>
                            </div>
                            <div class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
                        </div>
                        <div class="container py-1 my-3" v-for="(data, i) in dataArray" :key="i">
                            <ListePublicationVue class="bg-gray-100 hover:bg-gray-50" :data="data">
                            </ListePublicationVue>
                        </div>
                        <div v-if="dataArray == ''" class="my-2">
                            <div class=" h-full p-2 text-center">
                                <span class="font-semibold text-lg text-blue-2">Aucune publication disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import Publication from '@/components/ResidentComponents/Publication.vue'
import ListePublicationVue from '@/components/ResidentComponents/ListePublication.vue'
import Header from '@/components/ResidentComponents/Header.vue';
import ProfileCardVue from '@/components/ResidentComponents/Profile/ProfileCardAdmin.vue';
export default {
    name: 'ProfileAdmin',
    components: {
        Publication, ListePublicationVue, Header, ProfileCardVue
    },
    data() {
        return {
            dataArray: [],
        }
    },
    mounted() {

        this.getAllReparations()
    },
    methods: {
        async getAllReparations() {
            try {
                var response = await Axios.get('/index_pub?params=user')
                this.dataArray = response.data;
            } catch (error) {
                console.error(error);
            }
        },

    }
}
</script>