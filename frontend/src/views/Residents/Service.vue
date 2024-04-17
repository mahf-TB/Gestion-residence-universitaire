<template>
  <div class="container flex items-center flex-col justify-center">
    <!-- left contenu -->
    <!-- <div class="bg-red-100">
      <span>Left Mantenance</span>
    </div> -->
    <!-- contenu center -->
    <div class=" w-[60%]">
      <div class="bg-blue-1 px-3 pt-2 mb-1 rounded-xl shadow">
        <div class="flex items-center justify-between w-full">
          <div class="text-blue-0">
            <span class="uppercase mx-1 font-bold ">
              Services Disponible
            </span>
          </div>
          <div class="flex items-center justify-between">
            <div
              class="mx-1 px-3 py-1 flex items-center text-base text-blue-2 bg-blue-0 hover:bg-slate-50 hover:text-blue-1 rounded transition-all cursor-pointer">
              <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
              <span class="mx-2 font-bold ">
                Filtres
              </span>
            </div>
           
          </div>

        </div>
        <div class="my-2 bg-gradient-to-r from-blue-900 to-blue-800 h-px"></div>
        <div class="flex items-center">
          <div
            class="mx-1 px-4 py-2 flex items-center justify-center text-white  border-b-4 border-white  transition-all cursor-pointer w-1/2">
            <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
              <span class="mx-2 font-bold ">
                Vue Liste
              </span>
          </div>
          <div
            class="mx-1 px-4 py-2 flex items-center justify-center text-blue-0 hover:text-blue-2 hover:bg-blue-0 rounded transition-all cursor-pointer  w-1/2">
            <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
              <span class="mx-2 font-bold ">
                Vue Grille
              </span>
          </div>
        </div>
      </div>
      <div class="my-2">
        <div class=" h-full p-2 text-center">
          <span class="font-semibold text-lg text-blue-2">Aucun service disponible</span>
        </div>
      </div>
    </div>
    <!-- right contenu -->

  </div>
</template>

<script>

export default {
  name: 'Service',
  components: {

  }
}
</script>