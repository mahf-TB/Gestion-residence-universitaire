<template>
  <div class="mt-5">
    <!-- lien pour un template de site pour visiteur -->
    <!-- https://nicepage.com/fr/templates/preview/gestion-de-la-propriete-4460252?device=desktop -->
    <div
      class="container flex items-start justify-between surface-section text-800"
    >
      <div
        class="p-6 text-left mt-14 mb-14 md:text-left flex w-[700px] items-center"
      >
        <section class="animate-fade-right animate-ease-in-out">
          <span class="block text-6xl font-bold mb-1"> Bienvenu au Lodge</span>
          <div class="text-6xl text-primary font-bold mb-3">
            Cité <br />Universitaire
          </div>
          <p class="mt-0 mb-4 text-700 line-height-3">
            Votre portail vers une vie éstudiantines simplifée, sécurisée et
            pleine d'activité
          </p>
          <a
            href="/residences"
            class="btn btn-primary flex items-center py-2 px-3"
          >
            <span class="text-xl uppercase">
              <i
                class="fa-solid fa-chevron-right ml-4 pr-4 animate-shake animate-infinite animate-duration-[1500ms]"
              ></i>
              Réservation
            </span>
          </a>
        </section>
      </div>
      <div class="overflow-hidden">
        <img
          :src="require('@/assets/image/Batiment2.jpg')"
          alt="Image"
          class="md:ml-auto block w-[700px] h-[500px] object-cover animate-fade-left animate-once animate-ease-in-out"
          style="clip-path: polygon(10% 0, 100% 0%, 100% 100%, 0 100%)"
        />
      </div>
    </div>
    <!-- lien pour un template de site pour visiteur -->
    <div class="container my-5">
      <AideReserverVue></AideReserverVue>
      <div class="my-1 pb-5 w-full text-center">
        <a
          href="/residences"
          class="btn btn-primary py-3 px-4 flex items-center"
        >
          <span class="text-lg uppercase">
            Nos Résidences <i class="fa-solid fa-chevron-right ml-2"></i>
          </span>
        </a>
      </div>
    </div>

    <div class="relative bg-blue-1 my-5">
      <AccordionVue></AccordionVue>
    </div>

    <div class="p-5">
      <div class="flex items-center justify-between w-full py-5">
        <div class="w-1/3">
          <h1 class="font-light mb-5 text-blue-1">
            Découvrez nos appartements individuel...
          </h1>
          <div class="cursor-pointer">
            <div
              class="p-5 py-3 px-2 flex items-center justify-center text-blue-1 border-3 border-blue-1 rounded hover:bg-blue-1 hover:text-blue-0 transition-all"
              @click="this.$router.push('/residences')"
            >
              <span class="text-lg uppercase">
                Toutes nos appartements individuel
                <i class="fa-solid fa-chevron-right ml-2"></i>
              </span>
            </div>
          </div>
          <span class="font-bold"></span>
        </div>
        <div class="w-2/3 overflow-hidden p-1">
          <div
            class="flex items-center justify-between py-3 m-2 overflow-auto"
          >
            <div class="min-w-[300px] mx-2"  v-for="(data, index) in dataArray"  :key="index">
              <cardLogementVue :data="data"></cardLogementVue>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container my-4">
      <CardServiceVue></CardServiceVue>
    </div>

    <!-- lien pour un template de site pour visiteur -->
    <!-- <div class="bg-blue-1">
      <card-activiter></card-activiter>
    </div> -->
  </div>
</template>

<script>
import Axios from "@/_Service/caller.service";
import AideReserverVue from "@/components/VisiteurComponents/AideReserver.vue";
import AccordionVue from "@/components/VisiteurComponents/Accordion.vue";
import cardLogementVue from "@/components/VisiteurComponents/cardLogement.vue";
import CardServiceVue from "@/components/VisiteurComponents/CardService.vue";
import CardActiviter from "@/components/VisiteurComponents/CardActiviter.vue";

export default {
  name: "Accueil",
  components: {
    AideReserverVue,
    AccordionVue,
    cardLogementVue,
    CardServiceVue,
    CardActiviter,
  },
  data() {
    return {
      dataArray: [],
    };
  },
  mounted() {
    this.getAllLogement();
  },
  methods: {
    async getAllLogement() {
      try {
        var response = await Axios.get("/logement");
        this.dataArray = response.data;
        localStorage.setItem("index", 0);
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>



<style>
.p-galleria-thumbnail-wrapper {
  height: 200px;
}
</style>