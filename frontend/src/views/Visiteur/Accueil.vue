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
    <div class="container my-4">
      <CardServiceVue></CardServiceVue>
    </div>
 </div>
 </div>
</template>

<script>

export default {
  name: "Accueil",
  components: {

  }
}
</script>