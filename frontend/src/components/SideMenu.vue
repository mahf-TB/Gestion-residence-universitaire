<template>
  <div v-if="isConnect" @click="visible = true"
    class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2">
    <img :src="require('@/assets/image/pdpNone.jpeg')" class="h-12 w-12  object-cover rounded-full"
      alt="photo de profile">

    <!-- // SideBar Menu pour l'utilisateur -->
    <Sidebar v-model:visible="visible" :baseZIndex="1000" position="right"
      class="w-[300px] text-blue-0 bg-blue-4 md:w-20rem lg:w-30rem ">

      <div class="flex flex-col  justify-between h-full">
        <div>
          <div class="flex items-center justify-start my-3">
            <div v-if="isConnect"
              class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/pdpNone.jpeg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2">
              <h1 class="text-[14px] ml-3">{{ User.username }}</h1>
              <h1 class="text-[12px] ml-3 text-gray-500  font-Avenir">{{ User.email }}</h1>
            </div>
          </div>
          <div class="bg-gradient-to-r from-blue-1 to-blue-2 h-px my-3"></div>
          <div class="cursor-pointer text-[14px]">
            <div   @click="this.$router.push('/profile')"
            class="mt-auto cursor-pointer  py-2 rounded transition-all hover:bg-blue-2">
              <i class="pi pi-user mx-3"></i>
              Profile
            </div>
            <div class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2"
              @click="this.$router.push('/admin/liste-utilisateur') , visible=false">

              <i class="fa-solid fa-bell  mx-3"></i>
              Utilisateurs
            </div>
            <div class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2"
              @click="this.$router.push('/user/home')">

              <i class="fa-solid fa-bell  mx-3"></i>
              Notifications

            </div>
            <div class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2">
              <i class="fa-brands fa-facebook-messenger mx-3"></i>
              Messages
            </div>
            <div class="mt-auto cursor-pointer my-2 py-2 rounded transition-all hover:bg-blue-2">
              <i class="pi pi-cog mx-3"></i>
              Parametre
            </div>
          </div>
        </div>
        <div class="text-[14px]">
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
import Swal from 'sweetalert2';
export default {
  name: 'SideMenu',
  components: {
    Sidebar,
  },
  data() {
    return {
      visible: false,
      User: '',
      isConnect: null
    }
  },
  mounted() {
    this.isConnectUser()
  },
  computed: {

  },
  methods: {
    async isConnectUser() {
      let token = JSON.parse(localStorage.getItem('token'))
      if (token) {
        const res = await Axios.get('userConnect')
        
        this.User = res.data.user
        this.isConnect = true
      }else{
        this.isConnect =false
      }
    },
    async deconnect() {
      const result = await Swal.fire({
        title: 'Se deconnecter du compte?',
        text: "Cette action est irréversible!",
        // icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Annuler',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Déconnexion'
      });
      if (result.isConfirmed) {
        try {
          const res = await Axios.get('logout')
          if (res.data.status) {
          localStorage.removeItem('token');
          this.$router.push("/login");
          }
      } catch (error) {
        console.error(error)
      }
      }
      
    },
  },
}
</script>