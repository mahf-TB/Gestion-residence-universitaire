<template>
    <div class="flex flex-col text-center w-full py-5"         
        data-aos="new-animation"
        data-aos-offset="200"
        data-aos-easing="ease-in-out"
    >
        <h1 class="font-light mb-5"><span class="font-bold text-blue-1">Des prestations premium </span><br />pour un
            emménagement rapide </h1>
        <div class="grid grid-cols sm:grid-cols-2 lg:grid-cols-5">
            <div v-for="(data, index) in dataService" :key="index"
                class="px-4 py-4 m-4 bg-white text-blue-1 rounded shadow  hover:animate-shake">
                <div class="text-3xl flex items-center justify-center mb-2">
                    <span class=" bg-blue-0  px-4 py-3 rounded">
                        <i :class="data.icon"></i>
                        
                    </span>
                </div>
                <div class="text-3xl flex items-center justify-center mt-3 text-blue-4">
                    <span class="text-sm flex items-center uppercase text-blue-1">{{ data.titre }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted } from "vue";
import AOS from "aos";

onMounted(() => {
    AOS.init();
})
export default {
    name: 'CardService',
    components: {

    },
    data() {
        return {

            dataService: [
                {  icon: ' fa-solid fa-city',   titre: 'Accueil'  },
                {  icon: 'fa-solid fa-champagne-glasses',   titre: 'Restaurent'  },
                {  icon: 'fa-solid fa-suitcase-medical',   titre: 'Kit Medical'  },
                {  icon: 'fa-solid fa-blender-phone',   titre: 'InterPhone'  },
                {  icon: 'fa-solid fa-toilet-paper',   titre: 'Kit linge'  },
                {  icon: 'fa-solid fa-bath',   titre: 'Laverie'  },
                {  icon: 'fa-solid fa-broom',   titre: 'Service Menager'  },
                {  icon: 'fa-solid fa-wifi',   titre: 'WiFi'  },
                {  icon: 'fa-solid fa-square-parking',   titre: 'Parking'  },
                {  icon: 'fa-solid fa-code',   titre: 'Digicode'  },
            ]
        }
    }
} 
</script>