<template>
  <div class="container my-5 text center">
    <div class="text-center">
      <p class="text-sm text-[#2b6b88] italic">Lodge Cité Universitaire</p>
      <h1 class="text-8xxl text-[#2b6b88] mb-32">Qui sommes-nous ?</h1>
    </div>
    <div class="px-32">
      <div class="flex mb-32">
        <div class="px-4 w-1/2">
          <h1 class="text-3xl text-[#2b6b88] mb-6 font-semibold">
            Nos valeurs
          </h1>
          <p class="mr-16">
            Depuis de nombreuses années, nos résidents nous font confiance pour
            leur logement. Nos exigences d’implantation, de qualité de
            construction et de bonne gestion, sont la garantie d’un vrai confort
            de vie. Lieux de convivialité où chacun retrouve ses repères, nous offrons un cadre idéal pour réussir ses études et son
            entrée dans la vie active.
          </p>
        </div>
        <div class="w-1/2 flex h-full">
          <img
            :src="require('@/assets/image/salle_vie_commune1.jpg')"
            alt="image"
          />
        </div>
      </div>
      <div class="flex mb-32">
        <div class="w-1/2 flex h-full">
          <img
            :src="require('@/assets/image/salle_vie_commune2.jpg')"
            alt="image"
          />
        </div>
        <div class="px-4 w-1/2">
          <h1 class="text-3xl text-[#2b6b88] mb-6 font-semibold">
            Nos logements
          </h1>
          <p>
            Situées dans les grandes villes universitaires et dans des quartiers
            bien desservis, Lodge Cité Universitaire propose
            des logements fonctionnels et des services adaptés à vos besoins.
            Nos appartements (du Studio au Quatre pièces) sont meublés et
            équipés. Ils comprennent une pièce principale, un espace cuisine,
            une entrée et une salle d'eau avec WC.
          </p>
        </div>
      </div>
      <div class="flex mb-32">
        <div class="px-4 w-1/2">
          <h1 class="text-3xl text-[#2b6b88] mb-6 font-semibold">
            Nos services
          </h1>
          <p class="mr-16">
            Afin de vous garantir sécurité, confort et bien-être au sein de nos
            résidences, nous mettons à votre disposition de nombreux services
            offerts, tels que l'accueil et l'accès à Internet. Des services à la
            carte, comme le parking ou la laverie, faciliteront également votre
            vie quotidienne. Les prestations varient en fonction des résidences.
          </p>
        </div>
        <div class="w-1/2 flex h-full">
          <img
            :src="require('@/assets/image/salle_vie_commune3.jpg')"
            alt="image"
          />
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
export default {
  name: "Fondation",
  components: {},
};
</script>