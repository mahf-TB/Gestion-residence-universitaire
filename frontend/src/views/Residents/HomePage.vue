<template>
  <div class=" container flex items-center flex-col justify-center">
    <!-- contenu center -->
    <div class="w-full lg:w-4/5 xl:w-3/5 mx-10">
      <div class=" w-[100%]">
        <div class="bg-fotsy px-3 py-3 rounded-xl shadow-sm">
          <div class="flex w-full">
            <img :src="user.photo ? user.photo : require('@/assets/image/pdpNone.jpeg')"
              class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full" alt="photo de profile">
            <publication :getAllPub="getAllPub" :user="user.username"></publication>
            {{ }}
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
      dataArray: [],
      user: []
    }
  },
  mounted() {
    this.getAllPub()
    this.getUser()
  },
  methods: {
    async getAllPub() {
      try {
        var response = await Axios.get('/index_pub')
        this.dataArray = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async getUser() {
      let token = JSON.parse(localStorage.getItem('token'))
      if (token) {
        try {
          const res = await Axios.get('userConnect')
          if (res.data.status == 'success') {
            this.user = res.data.user
          }
        } catch (error) {
          console.error(error);
        }

      }
    },
  }
}
</script>