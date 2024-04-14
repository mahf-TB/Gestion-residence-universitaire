<template>
    <div class="flex flex-col text-center w-full py-5">
        <h1 class="font mb-5">Comment réserver <span class="font-bold text-blue-1">mon appartement ?</span> </h1>
        <div class="flex items-center justify-around">
            <div class="px-4 py-3 bg-white text-blue-1 rounded shadow animate-fade-right hover:animate-shake">
                <h1 class="text-lg flex items-center justify-between">Choisissez votre appartement   </h1>
                <div class="text-3xl flex items-center justify-between mt-3 text-blue-4">
                    <span class=" bg-blue-0 text-blue-1 px-3 py-2 rounded"><i class="fa-solid fa-building-user"></i></span>
                    <span class="text-sm ml-3  flex items-center hover:text-blue-1">Cliquez sur Pre-réserver
                        <i class="fa-solid fa-angle-right ml-1"></i> </span>
                </div>
            </div>
            <div class="px-4 py-3 bg-white text-blue-1 rounded shadow animate-fade-right hover:animate-shake">
                <h1 class="text-lg flex items-center justify-between">Saisissez votre adresse email</h1>
                <div class="text-3xl flex items-center justify-between mt-3 text-blue-4">
                    <span class=" bg-blue-0 text-blue-1 px-3 py-2 rounded "><i class="fa-solid fa-envelope"></i></span>
                    <span class="text-sm ml-3  flex items-center hover:text-blue-1">Cliquez sur suivant
                        <i class="fa-solid fa-angle-right ml-1"></i> </span>
                </div>
            </div>
            <div class="px-4 py-3 bg-white text-blue-1 rounded shadow animate-fade-left hover:animate-shake">
                <h1 class="text-lg flex items-center justify-between">Entrez vos informations </h1>
                <div class="text-3xl flex items-center justify-between mt-3 text-blue-4">
                    <span class=" bg-blue-0 text-blue-1 px-3 py-2 rounded"><i class="fa-solid fa-address-card"></i></span>
                    <span class="text-sm ml-3  flex items-center hover:text-blue-1">Cliquez sur Envoyer
                        <i class="fa-solid fa-angle-right ml-1"></i> </span>
                </div>
            </div>
            <div class="px-4 py-3 bg-white text-blue-1 rounded shadow animate-fade-left hover:animate-shake">
                <h1 class="text-lg flex items-center justify-between">Recevez le resultat de votre demande</h1>
                <div class="text-3xl flex items-center justify-between mt-3 text-blue-4">
                    <span class=" bg-blue-0 text-blue-1 px-3 py-2 rounded"><i class="fa-solid fa-envelope-open-text"></i></span>
                    <span class="text-sm ml-3  flex items-center hover:text-blue-1">Attendez reponse par email
                        <i class="fa-solid fa-angle-right ml-1"></i> </span>
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