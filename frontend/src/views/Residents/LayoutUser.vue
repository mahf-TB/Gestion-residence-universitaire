<template>
  <div class="bg-blue-0 ">
    <haut-header></haut-header>
    <Header class="sticky top-0 z-10"></Header>
    <div class=" mt-3 overflow-auto">
      <router-view :auth_user="user" class="font-Avenir" />
    </div>
  </div>
</template>

<script>
import Axios from '@/_Service/caller.service'
import HautHeader from '@/components/HautHeader.vue'
import Header from '@/components/ResidentComponents/Header.vue'
export default {
  name: 'LayoutUser',
  components: {
    Header, HautHeader
  },
  data() {
    return {
      user: ''
    }
  },
  mounted() {
    this.getUser()
  }, 
  methods: {
    async getUser() {
      let token = JSON.parse(localStorage.getItem('token'))
      if (token) {
        const res = await Axios.get('userConnect')
        this.user = res.data.user
      } 
    },
  }
}
</script>