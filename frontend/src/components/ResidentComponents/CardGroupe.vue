<template>
  <div class="w-1/4 bg-fotsy mx-5  my-2 px-4 py-3 rounded-xl shadow-sm">
      <div class="flex flex-col">
        <div class="flex my-2 items-center">
          <div class="font-bold text-blue-2">
            Votre groupe
          </div>

        </div>
        <div class="flex my-2 items-center">
          <div class="flex items-center justify-start">
            <div class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/joie1.jpg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2 ml-2">
              <div class="font-bold">
                Club Handball LC
              </div>
              <h1 class="text-[12px] text-gray-500  font-Avenir">Administrateur</h1>
            </div>
          </div>

          <button
            class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
            Voir plus
          </button>
        </div>
        <hr class="border-gray-00">
        <div class="flex my-2 items-center">
          <div class="font-bold text-blue-2">
            Groupe que vous avez membres
          </div>
        </div>
        <div class="flex my-2 items-center" v-for="(data, index) in 4" :key="index">
          <div class="flex items-center justify-start">
            <div class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12  ml-2">
              <img :src="require('@/assets/image/joie1.jpg')" class="h-12 w-12 object-cover rounded-full"
                alt="photo de profile">
            </div>
            <div class="pt-2 ml-2">
              <div class="font-bold">
                Programmation Java
              </div>
              <h1 class="text-[12px] text-gray-500  font-Avenir">Nouveaux membre</h1>
            </div>
          </div>

          <button
            class="flex  items-center  justify-center text-blue-4  whitespace-nowrap hover:underline  hover:text-blue-1 font-light  p-3 mr-0 ml-auto">
            Savoir plus
          </button>
        </div>
      </div>
    </div>
</template>

<script>

export default {
    name: 'CardGroupe',
    // props: { data: Object },
    components: {
        
    },
}
</script>