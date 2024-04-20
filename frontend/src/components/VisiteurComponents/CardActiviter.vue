<template>
    <div class="container w-full text-blue-0 py-5">
        <div class="w-[50%] p-3 px-4">
            <div class="mb-2">
                <h1 class=" font-light text-4xl text-white">
                    <span class="font-bold">Une résidence étudiante</span> sans renoncer au confort
                </h1>
            </div>

        </div>
        <div class="grid grid-cols grid-cols-2">
            <div class=" w-[100%] mx-3 my-3 flex justify-between rounded-md" v-for="(data, index) in 4" :key="index">
                <div class="relative overflow-hidden mx-3 text-center w-full">
                    <img :src="require('@/assets/image/EtudiantCode.jpg')" alt="Image"
                        class="md:ml-auto block w-full h-[500px] object-cover rounded-md  animate-jump-in  animate-ease-in-out">
                    <div
                        class=" absolute -bottom-10 group-hover:top-0 left-0 w-full h-full group-hover:bg-green-900 transition-all ease-in-out duration-500  ">
                        <div class="w-full h-full   p-5   relative">
                            <div
                                class="absolute bottom-0 group-hover:bottom-24 text-white  text-left   transition-all ease-in-out duration-500 ">
                                <h2 class="text-2xl font-bold  text-white mb-0 pb-1">Standard Color</h2>
                                <p class="text-lg font-light text-white">Lorem ipsum dolor sit amet, #brands.</p>
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

    },
} 
</script>