<template>
  <div>

    <!-- lien pour un template de site pour visiteur -->
    <!-- https://nicepage.com/fr/templates/preview/gestion-de-la-propriete-4460252?device=desktop -->
    <sport v-if="getCas =='sport'"></sport>
   <education v-if="getCas=='education'"></education>
  </div>
</template>

<script>
import sport from "@/components/VisiteurComponents/activities/sport.vue";
import education from "@/components/VisiteurComponents/activities/education.vue";
export default {
  name: "Activites",
  components: {sport, education},
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