<template>
    <div class="flex w-full flex-col rounded-md bg-white p-2 my-2 shadow-md shadow-shadow-500 ">
        <div class="flex items-start justify-between w-full">
            <div class="flex items-center justify-start ">
                <div class="cursor-pointer bg-center bg-cover bg-no-repeat  inline-block h-20 min-w-20">
                    <img :src="commande.image" class="h-full w-full object-cover rounded-md" alt="photo de profile">
                </div>
                <div class="mx-3">
                    <div class="">
                        <span class="text-base ">Votre commande est était le </span>
                        <span class="text-[14px] text-gray-500 ml-2 font-light font-Avenir">
                            {{ new Date(commande.date).toLocaleDateString() + ' à ' + new
                                Date(commande.date).toLocaleTimeString() }}
                        </span>
                        <div class="text-blue-2 font-semibold">{{ commande.nom_service + ': ' }}<span
                                class="text-gray-500 font-light" v-html="(commande.description).substring(0, 200)" />...
                        </div>
                    </div>
                    <div class="flex">
                        <span :class="validaty(commande.status)"
                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold ">
                            {{ commande.status == 'en attente' ? 'Commande envoyée ' : 'Commande en cours ' }}
                        </span>
                    </div>
                </div>
                <div>
                    {{ commande.nombre }}
                </div>

            </div>
            <div class="ml-2">
                <div class="text-blue-4 text-right mr-3 rounded-full cursor-pointer">
                    <i class="fa-solid fa-ellipsis-vertical px-3 py-2"></i>
                </div>
                <!-- <div class="flex items-center justify-between text-[1rem]">
                    <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-red-500  rounded-full"
                        @click="deleteOne(row.id, row.nom)">
                        <i class="fa-solid fa-trash-can text-[14px]"></i>
                    </div>
                    <div class="text-center hover:shadow-lg py-2 px-3 text-xs cursor-pointer text-red-500  rounded-full"
                        @click="deleteOne(row.id, row.nom)">
                        <i class="fa-solid fa-trash-can text-[14px]"></i>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CardCommandeUser',
    props: {
        commande: Array
    },
    data() {
        return {

        }
    },
    methods: {
        validaty(data) {
            if (data == 'en attente') {
                return 'bg-yellow-200 text-yellow-600'
            }
            else if (data == 'terminer') {
                return 'bg-green-100 text-green-600 '
            } else {
                return 'bg-blue-100 text-blue-500'
            }
        },
    },
    setup(props) {

        console.log(props.commande)
    },
}
</script>