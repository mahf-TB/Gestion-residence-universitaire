<template>
    <div class="w-full">
        <div class="bg-white text-blue-1 rounded shadow-md relative">
            <img :src="data.isImage==''? require('@/assets/image/logement1.jpg') : data.image" alt="Image de la chambre "
                class="md:ml-auto block w-full h-[200px] object-cover animatejump-in animate-duration-[1500ms]" />
            <div class="absolute top-0 right-0 z-10 bg-green-600 px-3 py-1 text-blue-0 ">
                <span class="text-sm">{{ data.type_logement }}</span>
            </div>
            <div class="px-4 py-1 flex flex-col items-start justify-between text-blue-1">
                <div class="text-left pt-2">
                    <span class="font-light text-sm uppercase text-gray-500">{{ data.batiment.nom_batiment }}
                    </span>
                </div>
                <div class="text-left py-2">
                    <a :href="`/reservation/${data.id}`"
                        class="text-2xl flex items-center hover:text-blue-2 cursor-pointer"
                        style="text-decoration: none">
                        {{ "Chambre N°: " + data.num_logement }}
                    </a>
                    <span class="text-sm text-gray-500">{{ getEtage(data.num_logement) }}
                        {{
                getEtage(data.num_logement) == "1" ? "ère Etage" : "ème Etage"
            }}</span>
                </div>
                <div class="text-left py-2">
                    <span class="font-light text-sm uppercase text-gray-500">À prix de </span><br />
                    <span class="font-bold text-xl text-blue-3">{{ data.prix + " ar/mois " }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardLogement",
    props: { data: Array },
    components: {},
    methods: {
        getEtage(data) {
            return data.charAt(0);
        },
    },
};
</script>