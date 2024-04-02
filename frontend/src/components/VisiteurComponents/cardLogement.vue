<template>
    <div class="flex items-center justify-between w-full py-5">
        <div class="max-w-[400px] mr-[150px]">
            <h1 class="font-light mb-5 text-blue-1">Découvrez nos offres spéciales...
            </h1>
            <div class="cursor-pointer">
                <div class=" p-5 py-3 px-2 flex items-center justify-center text-blue-1 border-3 border-blue-1 rounded hover:bg-blue-1 hover:text-blue-0 transition-all"
                    @click="this.$router.push('/residences')">
                    <span class="text-lg uppercase ">
                        Toutes nos offres spéciales <i class="fa-solid fa-chevron-right ml-2"></i>
                    </span>
                </div>
            </div>
            <span class="font-bold "></span>
        </div>
        <div class="flex items-center justif" v-for="(data,index) in 3" :key="index">
            <div class="max-w-[300px]">
                <div class="w-full"> 
                    <div class="bg-white text-blue-1 rounded shadow relative">
                        <img :src="require('@/assets/image/logement1.jpg')" alt="Image"
                            class="md:ml-auto block  h-[200px] object-cover ">
                            <div class="absolute top-0 right-0 z-10 bg-red-600 px-3 py-1 text-blue-0">
                                <span class="text-sm">Promotion</span>
                            </div>
                        <div class="px-4 py-1 flex flex-col items-start justify-between text-blue-1">
                            <div class=" text-left py-2">
                                <span class="font-light text-sm uppercase text-gray-500"> Bagneux 92220 </span>
                            </div>
                            <div class=" text-left py-2">
                            <div class="text-3xl flex items-center hover:text-blue-2 cursor-pointer">
                                Paris Bagneux
                                <i class="fa-solid fa-angle-right ml-1"></i>
                             </div>
                             <span class="text-sm text-gray-500">Du 16 à 22 mc</span>
                            </div>
                            <div class=" text-left py-2">
                                <span class="font-light text-sm uppercase text-gray-500">À prix de  </span><br/>
                                <span class="font-bold text-xl text-blue-3">200000MGA / mois </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'AideReserver',
    components: {

    }
} 
</script>