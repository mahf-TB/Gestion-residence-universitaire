<template>
  <div class="mt-2">
    <!-- lien pour un template de site pour visiteur -->
    <!-- https://nicepage.com/fr/templates/preview/gestion-de-la-propriete-4460252?device=desktop -->
    <div class="flex items-start justify-between surface-section text-800">
      <div class="p-6 text-left mt-14 mb-14 md:text-left flex w-[700px] items-center ">
        <section class="animate-fade-right animate-ease-in-out">
          <span class="block text-6xl font-bold mb-1">Create the screens </span>
          <div class="text-6xl text-primary font-bold mb-3">visitors deserve <br/>to see</div>
          <p class="mt-0 mb-4 text-700 line-height-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class=" btn btn-primary flex items-center" @click="this.$router.push('/reservation')">
            <span class="text-xl uppercase">
              <i class="fa-solid fa-chevron-right ml-4 pr-4 animate-shake animate-infinite animate-duration-[1500ms] "></i>
              Réservation 
            </span>
          </div>
        </section>
      </div>
      <div class="overflow-hidden">
        <img :src="require('@/assets/image/Batiment2.jpg')" alt="Image" class="md:ml-auto block w-[700px] h-[500px] object-cover animate-fade-left animate-once animate-ease-in-out" 
           style="clip-path: polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
      </div>
    </div>
</div>
</template>

<script>
import Galleria from 'primevue/galleria';

export default {
  name: 'Accueil',
  components: {
    Galleria
  },
  data() {
    return {


    }
  }
}
</script>
<style>
.p-galleria-thumbnail-wrapper{
    height: 200px;
}
</style>