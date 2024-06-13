<template>
    <div class=" flex flex-col text-center w-full pt-5 relative bottom-0 bg-blue-0 p-3">
        <div class="container flex items-center justify-around pt-3 ">
            <div class="px-4 py-3  text-blue-1 rounded w-[40%]">
                <h1 class="text-lg flex items-center justify-between m-0">Suivez-nous </h1>
                <div class="text-3xl flex items-center justify-between text-blue-4">
                    <span class=" bg-blue-0 text-blue-1 px-3 rounded cursor-pointer">
                        <i class="fa-brands fa-facebook  mx-2" style="font-size: 1.4rem"></i>
                        <i class="fa-brands fa-instagram  mx-2" style="font-size: 1.4rem"></i>
                        <i class="fa-brands fa-x-twitter  mx-2" style="font-size: 1.4rem"></i>
                    </span>
                </div>
                <h1 class="text-lg flex items-center justify-between mb-0 mt-3">Adresse :</h1>
                <div class="text-sm flex items-start text-left text-blue-4 ">
                    <p class="  text-blue-1 px-3 rounded cursor-pointer">
                        Tanambao Fianarantsoa
                    </p>
                </div>
                <div class="flex flex-col text-left text-base  text-blue-1">
                    <span><i class="fa-solid fa-phone pr-2"></i>+261 33 17 189 39</span>
                    <span>
                        <i class="fa-solid fa-envelope pr-2"></i>lodgecite.univ@gmail.com</span>
                </div>
            </div>
            <div class="px-4 py-3 bg-white text-blue-1 rounded shadow w-[40%]">
                <h1 class="text-lg flex items-center justify-between">Saisissez vos adresse email </h1>
                <div class="text-3xl flex items-center justify-between mt-3 text-blue-4">
                    <span class=" bg-blue-0 text-blue-1 px-3 py-2 rounded"><i class="fa-solid fa-envelope"></i></span>
                    <span class="text-sm ml-3  flex items-center hover:text-blue-1">Cliquez sur suivant
                        <i class="fa-solid fa-angle-right ml-1"></i> </span>
                </div>
            </div>
           
        </div>
        <div class="pt-5">
            <div class="text-blue-1">
                © 2024 les Lodge Cité by Zifukoro
            </div>
        </div>
    </div>
    
</template>

<script>

export default {
    name: 'Footer',
    components: {

    }
} 
</script>