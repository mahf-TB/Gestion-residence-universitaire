<template>
  <div class=" grid grid-cols  sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
    <div v-for="(data, index) in dataCard" v-bind:key="index" @click="data.command()">
      <div :class="data.class"
        class="shadow-lg rounded-md flex flex-wrap items-center h-[150px] justify-between p-3 border-b-4  text-white font-medium group">
        <div
          class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
          
          <i class="text-2xl" :class="data.icon"></i>
        </div>
        <div class="text-right p-2">
          <p class="text-3xl font-bold  m-0 inline-flex items-center"><span class="mx-2">{{ data.value }} </span><span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
              </svg>
            </span>
          </p>
        </div>
        <p class="mt-2">{{ data.name }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from '@/_Service/caller.service';
// import SkeletCard from './Skeleton/SkeletCard.vue';
export default {
  name: 'cardStat',
  components: {
    // SkeletCard
  },
  data() {
    return {
      isLoad: true,
      dataCard: [
 
      ]
    }
  },
  mounted() {
    this.getCount();
  },
  methods: {
    async getCount() {
      try {
        const response = await Axios.get('/index_count')
        var data = response.data;
        this.dataCard = [
        {
          value: data.etudiants,
          name: 'Nombre des etudiants dans la résidence',
          class: 'bg-gray-400  border-gray-600 cursor-pointer',
          icon: 'text-gray-400 fa-solid fa-user-graduate',
          command: () => {
          }
        },
        {
          value: data.logements,
          name: 'Nombre de toutes les logements dans la résidence',
          class: 'bg-[#427D9D] border-[#176B87] cursor-pointer',
          icon: 'text-[#427D9D] fa-solid fa-house-user',
          command: () => {

          }
        },

        {
          value: data.users,
          name: 'Nombre des Administrateur et les Staff  dans la résidence',
          class: 'bg-yellow-600   border-yellow-400 cursor-pointer',
          icon: 'text-yellow-600 fa-solid fa-users',
          command: () => {
         
          }
        },
        {
          value: 56,
          name: 'Agents qui ont des Categorie HEE',
          class: 'bg-blue-400 border-blue-600 cursor-pointer',
          icon: 'text-blue-400',
          command: () => {
          }
        },
        ]
        console.log(data)
      } catch (error) {
        console.log("error dans l'axios: ", error)
      }

    },
  }
}
</script>