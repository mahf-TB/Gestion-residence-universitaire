<template>
  <div class="mt-2">
    <!-- lien pour un template de site pour visiteur -->
    <!-- https://nicepage.com/fr/templates/preview/gestion-de-la-propriete-4460252?device=desktop -->
    <div class="flex items-start justify-between surface-section text-800">
    <div class="p-6 text-left mt-14 md:text-left flex w-[700px] items-center ">
        <section>
            <span class="block text-6xl font-bold mb-1">Create the screens </span>
            <div class="text-6xl text-primary font-bold mb-3">your visitors deserve to see</div>
            <p class="mt-0 mb-4 text-700 line-height-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class=" btn btn-primary flex items-center">
              <span class="text-xl uppercase">Réservation <i class="fa-solid fa-chevron-right ml-2"></i></span>
            </div>
          </section>
    </div>
    <div class="overflow-hidden">
        <img :src="require('@/assets/LC.png')" alt="Image" class="md:ml-auto block w-[500px] h-[500px]" width="500" height="500" style="clip-path: polygon(8% 0, 100% 0%, 100% 100%, 0 100%)">
    </div>
 </div>
 </div>
</template>

<script>

export default {
  name: 'Accueil',
  components: {

  }
}
</script>