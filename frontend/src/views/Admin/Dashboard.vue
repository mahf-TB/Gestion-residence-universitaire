<template>
  <div class="">
    <h1 class="text-xxl text-[#2b6b88]">Tableau de bord</h1>
    <button @click="add()"
      class="uppercase max-md:w-full max-md:mt-2 bg-blue-2 hover:bg-blue-1 transition-all text-white text-sm py-2 px-4 rounded">
      Nouveaux Notif
    </button>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
export default {
  name: 'Dashboard',
  components: {

  },
  data(){
    return {
      note : 0
    }
  }
  ,
  mounted() {
  
  },
  methods: {
    add() {
      try {
        var response = Axios.get('/utilisateurs')
        console.log(response)
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>
