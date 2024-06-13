<template>
  <div>
    <h1
      class="text-5xl text-[#0458a0] font-bold mb-16 bg-[#ecf2f5] text-center py-16"
    >
      Activités de divertissement
    </h1>
    <!-- component -->
    <div class="flex flex-wrap min-h-screen items-center justify-around">
      <div
        class="relative flex w-full mb-24 max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md"
      >
        <div
          class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700"
        >
          <img
            :src="require('@/assets/image/activite_divertissement/cine.jpg')"
            alt="image"
            class="h-full w-full object-cover"
          />
        </div>
        <div class="p-6">
          <h4
            class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
          >
            Ciné-Club
          </h4>
          <p
            class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
          >
            Il existe un Ciné-Club au sein de notre cité, chaque résident peux y
            adhérer et peux ainsi assister aux soirées cinéma organiser par le
            club. Que ce soit les films cultes, ou les Blockbuster du moment,
            vous en aurez pour votre faim.
          </p>
        </div>
      </div>
      <div
        class="relative mb-24 flex w-full max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md"
      >
        <div
          class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700"
        >
          <img
            :src="
              require('@/assets/image/activite_divertissement/jeu_de_societe.jpg')
            "
            alt="image"
            class="h-full w-full object-cover"
          />
        </div>
        <div class="p-6">
          <h4
            class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
          >
            Soirées Jeux de société
          </h4>
          <p
            class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
          >
            Pour les amateurs de jeux de société, vous serez ravis, chaque
            vendredi soir, il est organisé une soirée qui vous est spéciallement
            resèrvé. Que ce soit : Monopoly, Scrable, Qui est-ce? et tant
            d'autres vous attendent.
          </p>
        </div>
      </div>
      <div
        class="relative mb-24 flex w-full max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md"
      >
        <div
          class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700"
        >
          <img
            :src="require('@/assets/image/activite_divertissement/lecture.jpg')"
            alt="image"
            class="h-full w-full object-cover"
          />
        </div>
        <div class="p-6">
          <h4
            class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
          >
            Groupe de lecture
          </h4>
          <p
            class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
          >
            Au sein de notre communauté, nous promouvons le partage, c'est de là
            qu'est né notre groupe de lecture, dans ce groupe, tout le monde est
            libre de partager ses idées, ses ressentis et son avis sur tel ou
            tel livre, tout celà sans être jugé par qui que ce soit.
          </p>
        </div>
      </div>
      <div
        class="relative mb-24 flex w-full max-w-[38rem] h-[20rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md"
      >
        <div
          class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700"
        >
          <img
            :src="require('@/assets/image/activite_divertissement/karaoke.jpg')"
            alt="image"
            class="h-full w-full object-cover"
          />
        </div>
        <div class="p-6">
          <h4
            class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
          >
            Soirées Karaoké
          </h4>
          <p
            class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
          >
            Étant leader dans notre domaine depuis des années, nous avons
            developpé nos relations et avons attiré l'oeil de partenaire à
            l'étranger, ce qui nous permet d'offrir des bourses aux étudiants
            qui le méritent.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "divertissement",
};
</script>

<style>
</style>