<template>
      <div >
      <h1 class="text-5xl text-[#0458a0] font-bold mb-16 bg-[#ecf2f5] text-center py-16">
        Activités éducatives et de développement personnel
      </h1>
      <!-- component -->
      <div class="flex flex-wrap min-h-screen items-center justify-around">
        <div
          class="relative flex w-full mb-24 max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md"
        >
          <div
            class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
            <img
              :src="
                require('@/assets/image/activite_educative/conference.png')
              "
              alt="image"
              class="h-full w-full object-cover"
            />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
            >
              Conférences et Ateliers sur divers sujets
            </h4>
            <p
              class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
            >
              Afin d'aider nos résidents à mieux aborder leurs études, nous
              invitons des professionels qui sont reconnu dans le domaine qu'ils
              exercent, comme le développement durable, les langues étrangères
              ou même l'entreprenariat.
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
                require('@/assets/image/activite_educative/salle_etude.jpg')
              "
              alt="image"
              class="h-full w-full object-cover"
            />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
            >
              Mise à disposition d'espaces de coworking et d'étude
            </h4>
            <p
              class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
            >
              Votre confort et votre bien-être est notre priorité, dans cette
              optique, nous avons emménagé des salles afin de vous garantir une
              meilleure productivité, que ce soit des espaces de coworking ou
              d'études.
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
                require('@/assets/image/activite_educative/ancien_etudiant.png')
              "
              alt="image"
              class="h-full w-full object-cover"
            />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
            >
              Rencontres avec d'anciens étudiants
            </h4>
            <p
              class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased"
            >
              Notre communauté est solidaire, de ce fait, nos anciens étudiants
              propose de partager leur expérience durant leur séjour parmis
              nous, mais aussi donnent des conseils qui seront bénéfiques aux
              nouveaux.
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
              :src="
                require('@/assets/image/activite_educative/bourse.png')
              "
              alt="image"
              class="h-full w-full object-cover"
            />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased"
            >
              Partenariat avec des institutions à l'étranger
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
    name:"education"
}
</script>

<style>

</style>