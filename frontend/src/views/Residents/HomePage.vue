<template>
  <div class="container flex items-center flex-col justify-center">
    <!-- left contenu -->
    <!-- contenu center -->
    <div class=" w-[60%]">
      <div class="bg-blue-0 px-3 py-3 rounded-xl shadow-sm">
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

    <div class="container py-3" v-for="(data, i) in datas" :key="i">
      <ListePublicationVue class="bg-blue-4 hover:bg-gray-900"></ListePublicationVue>
      </div>
    </div>
    <div class="my-2">
      <div class=" h-full p-2 text-center">
        <span class="font-semibold text-lg text-blue-2">Aucune publication disponible</span>
      </div>
    </div>
    <!-- right contenu -->

  </div>
</template>

<script>
import Publication from '@/components/ResidentComponents/Publication.vue'
import ListePublicationVue from '@/components/ResidentComponents/ListePublication.vue'
export default {
  name: 'Home',
  components: {
    Publication, ListePublicationVue

  }, data(){
    return {
      datas:4
    }
  }
}
</script>