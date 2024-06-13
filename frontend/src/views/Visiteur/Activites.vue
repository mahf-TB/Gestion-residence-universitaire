<template>
  <div>
    <sport v-if="getCas=='sport'"></sport>
    <education v-if="getCas=='education'"></education>
    <divertissement v-if="getCas=='divertissement'"></divertissement>
  </div>
</template>

<script>
import sport from "@/components/VisiteurComponents/activities/sport.vue";
import education from "@/components/VisiteurComponents/activities/education.vue";
import divertissement from '../../components/VisiteurComponents/activities/divertissement.vue';
export default {
  name: "Activites",
  components: {sport, education, divertissement},
  data() {
    return {
    }
  },
  computed : {
    getCas(){
      return this.$route.query.cas;
    }
  },
};
</script>