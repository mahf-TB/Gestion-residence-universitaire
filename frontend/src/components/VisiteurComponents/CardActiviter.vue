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
                <div class="relative overflow-hidden mx-3  w-full">
                    <img :src="require('@/assets/image/EtudiantCode.jpg')" alt="Image"
                        class="md:ml-auto block w-full h-[500px] object-cover rounded-md  animate-jump-in  animate-ease-in-out">
                    <div class="absolute bottom-0 bg-blue-0 w-full p-3 rounded-b-md">
                        <div>
                            <div class="text-3xl flex items-center font-bold text-blue-2 cursor-pointer">
                                Club Sportifs <span class="text-base font-light ml-3">(BasketBall, Football, VolleyBall, HandBall, ...)</span>
                            </div>
                            <p class="test-sm text-blue-2 m-0 pl-5">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis excepturi repellat
                                architecto temporibus. Optio voluptate sed distinctio nesciunt repellendus.
                            </p>
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