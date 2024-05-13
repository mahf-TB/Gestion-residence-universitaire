<template>
    <div class="w-full">
        <div class="bg-white text-blue-1 rounded shadow-md">

            <div class=" relative">
                <img :src="materiel.isImage==''? require('@/assets/image/logement1.jpg') : materiel.image" alt="Image de la chambre "
                    class="md:ml-auto block w-full h-[200px] rounded-t object-cover animatejump-in animate-duration-[1500ms]" />
            </div>
            <div class="px-4 pb-4 flex flex-col h-[136px]  items-start justify-between text-blue-1">
                <div class="text-left pt-2">
                    <span class="font-light text-sm uppercase text-gray-500">{{ new Date( materiel.date).toLocaleString() }}
                    </span>
                </div>
                <div class="text-left py-1">
                    <span
                        class="text-2xl flex items-center hover:text-blue-2 cursor-pointer"
                        style="text-decoration: none">
                        {{ materiel.nom }}
                    <span class="text-sm mx-1">({{ materiel.qte }})</span>
                    </span>
                    
                </div>
                <div class="text-left py-1">
                    <span class="font-light text-sm  text-gray-500" v-html="(materiel.description).substring(0, 30)"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardLogement",
    props: { materiel: Array },
    components: {},
    methods: {
        getEtage(data) {
            return data.charAt(0);
        },
    },
};
</script>