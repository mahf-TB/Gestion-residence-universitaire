<template>
  <div class="pb-5">
    <CardStat></CardStat>
    <table-users></table-users>
  </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import CardStat from '@/components/AdminComponents/Dashboard/CardStat.vue';
import TableUsers from '../../components/AdminComponents/Dashboard/TableUsers.vue';
export default {
  name: 'Dashboard',
  components: {
    CardStat,
    TableUsers,
  },
  data() {
    return {
      note: 0
    }
  }
  ,
  mounted() {
    this.add()
  },
  methods: {
    async add() {
      try {
        var response = await Axios.get('/utilisateurs')
        console.log(response.data)
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>
