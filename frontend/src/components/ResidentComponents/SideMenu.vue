<template>
  <div v-if="!isConnect" @click="open()"
    class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2"
    style="background-image: url(https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg)">

    <!-- // SideBar Menu pour l'utilisateur -->
    <Sidebar v-model:visible="visible" :baseZIndex="1000" position="right"
      class="w-[300px] text-blue-0 bg-blue-4 md:w-20rem lg:w-30rem ">

      <div class="flex flex-col  justify-between h-full">
        <div>
          <div class="flex items-center justify-start my-3">
            <div v-if="!isConnect"
              class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-10 w-10   ml-2"
              style="background-image: url(https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg)">
            </div>
            <div class="-0 ">
              <h1 class="text-[16px] ml-3">{{ User.username }}</h1>
              <h1 class="text-[14px] ml-3 text-gray-500  font-Avenir">{{ User.email }}</h1>
            </div>
          </div>
          <div class="bg-gradient-to-r from-blue-1 to-blue-2 h-px my-3"></div>
          <div class="cursor-pointer">
            <div  class="mt-auto cursor-pointer  py-2 rounded transition-all hover:bg-blue-2">
              <i class="pi pi-user mx-3"></i>
              Profile
            </div>
            <div  class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2">
              <i class="fa-solid fa-bell  mx-3"></i>
              Notifications
            </div>
            <div  class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2">
              <i class="fa-brands fa-facebook-messenger mx-3"></i>
              Messages
            </div>
            <div  class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2">
              <i class="pi pi-cog mx-3"></i>
             Parametre
            </div>
          </div>
        </div>
        <div class="">
          <div @click="deconnect()" class="mt-auto cursor-pointer py-2 rounded transition-all hover:bg-blue-2">
            <i class="pi pi-fw pi-sign-out mx-3"></i>
            Se déconnecter
          </div>
          <div class="bg-gradient-to-r from-blue-1 to-blue-2 h-px mt-3"></div>
          <p class="mb-1 py-2 text-center text-xs text-blue-3">
            Copyright by babaCode@2024
          </p>
        </div>

      </div>
    </Sidebar>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service'
import Sidebar from 'primevue/sidebar';
export default {
  name: 'SideMenu',
  components: {
    Sidebar,
  },
  data() {
    return {
      visible: false,
      User: '',
    }
  },
  mounted() {
  },
  computed: {
    isConnect() {
      let user = JSON.parse(localStorage.getItem('user-info'))
      console.log(user)
      if (user) {
        this.User = user
        return false
      }
      return true
    }
  },
  methods: {
    open() {
      this.visible = true
    },
    deconnect() {
      localStorage.removeItem('user-info');
      this.$router.push("/login");
    },


  },
}
</script>