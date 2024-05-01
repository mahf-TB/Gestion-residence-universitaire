<template>
  <div>
    <!-- lien pour un template de site pour visiteur -->
    <!-- https://nicepage.com/fr/templates/preview/gestion-de-la-propriete-4460252?device=desktop -->
    <h1 class="text-5xl text-[#0458a0] font-bold mb-16 bg-[#ecf2f5] text-center py-16">
      Activités Sportives et Loisirs
    </h1>
    <div class="container my-5">
      <div class="flex flex-wrap justify-around">
        <div class="w-[500px] pb-16">
          <a href="#" class="shadow-2xl relative">
            <div class="h-full relative shadow-3xl overflow-hidden group rounded-lg">
              <div
                class="absolute -bottom-0 group-hover:top-0 left-0 w-full h-full bg-slate-900/60 group-hover:bg-slate-900/80 transition-all ease-in-out duration-500">
                <div class="w-full h-full p-5 relative">
                  <div
                    class="absolute -bottom-[4rem] group-hover:top-0 text-white text-left transition-all ease-in-out duration-500">
                    <h2 class="text-3xl font-bold text-white pt-32 mb-4">
                      Installation Sportives à disposition
                    </h2>
                    <p class="text-lg font-light text-white mb-0">
                      Nous vous proposons toutes les installations et matériels
                      sportifs dont vous aurez besoin
                    </p>
                  </div>
                </div>
              </div>
              <img :src="require('@/assets/image/activite_sportive_loisir/salle_de_sport1.jpg')
                " alt="Image" class="w-full z-0 h-full object-fill example" />
              <!-- <img src="https://source.unsplash.com/random/400x400" class="w-full z-0 h-full object-fill example"> -->
            </div>
          </a>
        </div>
        <div class="w-[500px] pb-16">
          <a href="#" class="shadow-2xl relative">
            <div class="h-full relative shadow-3xl overflow-hidden group rounded-lg">
              <div
                class="absolute -bottom-0 group-hover:top-0 left-0 w-full h-full bg-slate-900/60 group-hover:bg-slate-900/80 transition-all ease-in-out duration-500">
                <div class="w-full h-full p-5 relative">
                  <div
                    class="absolute -bottom-20 group-hover:top-0 text-white text-left transition-all ease-in-out duration-500">
                    <h2 class="text-3xl font-bold text-white pt-32 mb-4">
                      Tournois et <br />
                      Événements sportifs
                    </h2>
                    <p class="text-lg mb-0 font-light text-white">
                      Pour renforcer le lien entre nos locataires, nous
                      organisons des tournois et événements où ils peuvent
                      participer
                    </p>
                  </div>
                </div>
              </div>
              <img :src="require('@/assets/image/activite_sportive_loisir/basketball_game.jpg')
                " alt="Image" class="w-full z-0 h-full object-fill example" />
              <!-- <img src="https://source.unsplash.com/random/400x400" class="w-full z-0 h-full object-fill example"> -->
            </div>
          </a>
        </div>
        <div class="w-[500px] pb-16">
          <a href="#" class="shadow-2xl relative">
            <div class="h-full relative shadow-3xl overflow-hidden group rounded-lg">
              <div
                class="absolute -bottom-0 group-hover:top-0 left-0 w-full h-full bg-slate-900/60 group-hover:bg-slate-900/80 transition-all ease-in-out duration-500">
                <div class="w-full h-full p-5 relative">
                  <div
                    class="absolute -bottom-20 group-hover:top-0 text-white text-left transition-all ease-in-out duration-500">
                    <h2 class="text-3xl font-bold text-white pb-1 pt-32">
                      Cours de sport <br />
                      et de fitness
                    </h2>
                    <p class="text-lg font-light mb-0 pr-4 text-white">
                      Pour que nos locataires puissent rester en forme, nous
                      sommes heureux de leur proposer des cours de sport et de
                      fitness
                    </p>
                  </div>
                </div>
              </div>
              <img :src="require('@/assets/image/activite_sportive_loisir/yoga_classs.jpg')
                " alt="Image" class="w-full z-0 h-full object-fill example" />
              <!-- <img src="https://source.unsplash.com/random/400x400" class="w-full z-0 h-full object-fill example"> -->
            </div>
          </a>
        </div>
        <div class="w-[500px] pb-16">
          <a href="#" class="shadow-2xl relative">
            <div class="h-full relative shadow-3xl overflow-hidden group rounded-lg">
              <div
                class="absolute -bottom-0 group-hover:top-0 left-0 w-full h-full bg-slate-900/40 group-hover:bg-slate-900/70 transition-all ease-in-out duration-500">
                <div class="w-full h-full p-5 relative">
                  <div
                    class="absolute -bottom-10 group-hover:top-0 text-white text-left transition-all ease-in-out duration-500">
                    <h2 class="text-3xl font-bold text-white pt-32">
                      Clubs sportifs
                    </h2>
                    <p class="text-lg font-light -mb-4 text-white">
                      Lodge Cité Universitaire a ses propres clubs sportifs tels
                      qu'un club de Basketball, de Football, de Volleyball...
                    </p>
                  </div>
                </div>
              </div>
              <img :src="require('@/assets/image/activite_sportive_loisir/football_team.jpg')
                " alt="Image" class="w-full z-0 h-full object-fill example" />
              <!-- <img src="https://source.unsplash.com/random/400x400" class="w-full z-0 h-full object-fill example"> -->
            </div>
          </a>
        </div>
        <div class="w-[500px] pb-16">
          <a href="#" class="shadow-2xl relative">
            <div class="h-full relative shadow-3xl overflow-hidden group rounded-lg">
              <div
                class="absolute -bottom-0 group-hover:top-0 left-0 w-full h-full bg-slate-900/40 group-hover:bg-slate-900/70 transition-all ease-in-out duration-500">
                <div class="w-full h-full p-5 relative">
                  <div
                    class="absolute -bottom-20 group-hover:top-0 text-white text-left transition-all ease-in-out duration-500">
                    <h2 class="text-3xl font-bold text-white pb-1 pt-32">
                      Organisation de sorties <br />
                      et de randonnées
                    </h2>
                    <p class="text-lg font-light mb-0 text-white">
                      Se détendre de temps en temps est crucial pour la
                      productivité, c'est pour celà que nous organisons des
                      sorties lorsque vous en avez le plus besoin
                    </p>
                  </div>
                </div>
              </div>
              <img :src="require('@/assets/image/activite_sportive_loisir/sorties.jpg')
                " alt="Image" class="w-full z-0 h-full object-fill example" />
              <!-- <img src="https://source.unsplash.com/random/400x400" class="w-full z-0 h-full object-fill example"> -->
            </div>
          </a>
        </div>
        <div class="w-[500px] pb-16">
          <a href="#" class="shadow-2xl relative">
            <div class="h-full relative shadow-3xl overflow-hidden group rounded-lg">
              <div
                class="absolute -bottom-0 group-hover:top-0 left-0 w-full h-full bg-slate-900/40 group-hover:bg-slate-900/70 transition-all ease-in-out duration-500">
                <div class="w-full h-full p-5 relative">
                  <div
                    class="absolute -bottom-20 group-hover:top-0 text-white text-left transition-all ease-in-out duration-500">
                    <h2 class="text-3xl font-bold text-white pb-1 pt-32">
                      Mise en place d'espaces de détente et de jeux:
                    </h2>
                    <p class="text-lg font-light text-white mb-0">
                      Détente et plaisir, nous locataires bénéficient de
                      plusieurs espaces leur permetant celà mais aussi de se
                      divertir
                    </p>
                  </div>
                </div>
              </div>
              <img :src="require('@/assets/image/activite_sportive_loisir/billard.jpg')
                " alt="Image" class="w-full z-0 h-full object-fill example" />
              <!-- <img src="https://source.unsplash.com/random/400x400" class="w-full z-0 h-full object-fill example"> -->
            </div>
          </a>
        </div>
      </div>
    </div>
    <div>
      <h1 class="text-5xl text-[#0458a0] font-bold mb-16 bg-[#ecf2f5] text-center py-16">
        Activités éducatives et de développement personnel
      </h1>
      <!-- component -->
      <div class="flex flex-wrap min-h-screen items-center justify-around">
        <div
          class="relative flex w-full mb-24 max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md">
          <div
            class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
            <img :src="require('@/assets/image/activite_educative/conference.png')
              " alt="image" class="h-full w-full object-cover" />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased">
              Conférences et Ateliers sur divers sujets
            </h4>
            <p class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
              Afin d'aider nos résidents à mieux aborder leurs études, nous
              invitons des professionels qui sont reconnu dans le domaine qu'ils
              exercent, comme le développement durable, les langues étrangères
              ou même l'entreprenariat.
            </p>
          </div>
        </div>
        <div
          class="relative mb-24 flex w-full max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md">
          <div
            class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
            <img :src="require('@/assets/image/activite_educative/salle_etude.jpg')
              " alt="image" class="h-full w-full object-cover" />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased">
              Mise à disposition d'espaces de coworking et d'étude
            </h4>
            <p class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
              Votre confort et votre bien-être est notre priorité, dans cette
              optique, nous avons emménagé des salles afin de vous garantir une
              meilleure productivité, que ce soit des espaces de coworking ou
              d'études.
            </p>
          </div>
        </div>
        <div
          class="relative mb-24 flex w-full max-w-[38rem] max-h-[24rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md">
          <div
            class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
            <img :src="require('@/assets/image/activite_educative/ancien_etudiant.png')
              " alt="image" class="h-full w-full object-cover" />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased">
              Rencontres avec d'anciens étudiants
            </h4>
            <p class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
              Notre communauté est solidaire, de ce fait, nos anciens étudiants
              propose de partager leur expérience durant leur séjour parmis
              nous, mais aussi donnent des conseils qui seront bénéfiques aux
              nouveaux.
            </p>
          </div>
        </div>
        <div
          class="relative mb-24 flex w-full max-w-[38rem] h-[20rem] flex-row rounded-xl bg-gray-100 bg-clip-border text-gray-700 shadow-md">
          <div
            class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
            <img :src="require('@/assets/image/activite_educative/bourse.png')
              " alt="image" class="h-full w-full object-cover" />
          </div>
          <div class="p-6">
            <h4
              class="mb-4 block font-sans text-2xl font-semibold leading-snug text-blue-1 tracking-normal text-blue-gray-900 antialiased">
              Partenariat avec des institutions à l'étranger
            </h4>
            <p class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
              Étant leader dans notre domaine depuis des années, nous avons
              developpé nos relations et avons attiré l'oeil de partenaire à
              l'étranger, ce qui nous permet d'offrir des bourses aux étudiants
              qui le méritent.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Activites",
  components: {},
};
</script>