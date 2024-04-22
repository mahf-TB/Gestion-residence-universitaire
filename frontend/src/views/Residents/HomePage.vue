<template>
  <div class="mx-3 flex items-start  justify-center">
    <!-- left contenu -->
    <div class="w-1/4 bg-fotsy mx-5 my-2 px-4 py-3 rounded-xl shadow-sm">
      <div class="flex flex-col">
        <div class="flex my-2 items-center">
          <div class="font-bold text-blue-2">
            Votre groupe
          </div>

        </div>
        <div class="flex my-2 items-center">
          <div class="flex items-center justify-start">
            <div class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/joie1.jpg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2 ml-2">
              <div class="font-bold">
                Club Handball LC
              </div>
              <h1 class="text-[12px] text-gray-500  font-Avenir">Administrateur</h1>
            </div>
          </div>

          <button
            class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
            Voir plus
          </button>
        </div>
        <hr class="border-gray-00">
        <div class="flex my-2 items-center">
          <div class="font-bold text-blue-2">
            Groupe que vous avez membres
          </div>
        </div>
        <div class="flex my-2 items-center" v-for="(data, index) in 4" :key="index">
          <div class="flex items-center justify-start">
            <div class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/joie1.jpg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2 ml-2">
              <div class="font-bold">
                Programmation Java
              </div>
              <h1 class="text-[12px] text-gray-500  font-Avenir">Nouveaux membre</h1>
            </div>
          </div>

          <button
            class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
            Savoir plus
          </button>
        </div>
      </div>
    </div>
    <!-- contenu center -->
    <div class="w-3/5">

      <div class=" w-[100%]">
        <div class="bg-fotsy px-3 py-3 rounded-xl shadow-sm">
          <div class="flex w-full">
            <img :src="require('@/assets/image/pdpNone.jpeg')"
              class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full" alt="photo de profile">
            <publication></publication>
          </div>
          <div class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"></div>
          <div class="flex items-center">
            <div
              class="mx-1 px-4 py-2 flex text-blue-2 hover:bg-blue-1 hover:text-blue-0 rounded transition-all cursor-pointer">
              <img :src="require('@/assets/icon-image.png')" class="mx-2 object-cover" height="24" width="24"
                alt="photo de profile">
              <span class="uppercaose mx-1 font-bold text-base">
                Photo/Video
              </span>
            </div>
          </div>
        </div>
        <!-- liste des publication  -->

        <div class="container py-3" v-for="(data, i) in dataArray" :key="i">
          <ListePublicationVue class="bg-fotsy hover:bg-gray-50" :data="data"></ListePublicationVue>
        </div>
      </div>
      <div class="my-2">
        <div class=" h-full p-2 text-center">
          <span class="font-semibold text-lg text-blue-2">Aucune publication disponible</span>
        </div>
      </div>

    </div>
    <!-- right contenu -->
    <div class="w-1/4 bg-fotsy mx-5  my-2 px-4 py-3 rounded-xl shadow-sm">
      <div class="flex flex-col">
        <div class="flex my-2 items-center">
          <div class="font-bold text-blue-2">
            Votre groupe
          </div>

        </div>
        <div class="flex my-2 items-center">
          <div class="flex items-center justify-start">
            <div class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/joie1.jpg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2 ml-2">
              <div class="font-bold">
                Club Handball LC
              </div>
              <h1 class="text-[12px] text-gray-500  font-Avenir">Administrateur</h1>
            </div>
          </div>

          <button
            class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
            Voir plus
          </button>
        </div>
        <hr class="border-gray-00">
        <div class="flex my-2 items-center">
          <div class="font-bold text-blue-2">
            Groupe que vous avez membres
          </div>
        </div>
        <div class="flex my-2 items-center" v-for="(data, index) in 4" :key="index">
          <div class="flex items-center justify-start">
            <div class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/joie1.jpg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2 ml-2">
              <div class="font-bold">
                Programmation Java
              </div>
              <h1 class="text-[12px] text-gray-500  font-Avenir">Nouveaux membre</h1>
            </div>
          </div>

          <button
            class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
            Savoir plus
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from '@/_Service/caller.service';
import Publication from '@/components/ResidentComponents/Publication.vue'
import ListePublicationVue from '@/components/ResidentComponents/ListePublication.vue'
export default {
  name: 'Home',
  components: {
    Publication, ListePublicationVue

  },
  data() {
    return {
      dataArray: []
    }
  },
  mounted() {
    this.getAllReparations()
  },
  methods: {
    async getAllReparations() {
      try {
        var response = await Axios.get('/index_pub')
        console.log(response.data)
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>