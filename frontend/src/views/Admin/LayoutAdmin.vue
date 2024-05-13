<template>
  <div class="bg-blue-0 ">
    <Header class="sticky top-0 z-10" v-if="user.type == 'admin'"></Header>
    <header-personnel v-else class="sticky top-0 z-10"></header-personnel>
    <div class="container">
      <router-view :auth_user="user" class="font-Avenir" />
    </div>

  </div>
</template>

<script>
import Axios from '@/_Service/caller.service'
import Header from '../../components/AdminComponents/Header.vue'
import HeaderPersonnel from '../../components/PersonnelComponents/HeaderPersonnel.vue'
export default {
  name: 'LayoutAdmin',
  components: {
    Header,
    HeaderPersonnel
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