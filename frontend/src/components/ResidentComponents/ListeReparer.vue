<template>
    <div class="container flex items-center flex-col justify-center">

        <div class=" w-[60%]">
            <div class="bg-blue-0 px-3 pt-3 my-3 rounded-xl shadow-sm" v-for="(data, index) in dataArray" :key="index">
                <div class="flex w-full">
                    <img :src="require('@/assets/image/pdpNone.jpeg')"
                        class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full" alt="photo de profile">
                    <div class="ml-2">
                        <p class="text-lg font-bold text-blue-4 m-0 p-0 ">{{data.user}}
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5  m-0 font-normal"><i
                                class="fa-solid fa-earth-americas mr-2"></i><span>{{ new Date(data.date).toLocaleDateString()+' à '+new Date(data.date).toLocaleTimeString() }}</span></p>
                    </div>
                </div>
                <div class="my-2 mx-4">
                    <p :class="data.image == 'http://localhost:8000/storage/null' ? 'text-3xl':''">
                        {{ data.design }}
                    </p>
                </div>
                <div class="flex items-center" v-if="data.image != 'http://localhost:8000/storage/null'">
                    <div>
                        <img :src="data.image" :alt="data.type" class="h-[60vh] w-full object-cover">
                    </div>
                </div>

                <div class="mt-2 bg-gradient-to-r from-blue-900 to-blue-800 h-px"></div>
                <div class="flex items-center justify-between py-3">
                    <div :class="data.status == 'en cours' ? 'bg-yellow-200 text-yellow-600':'bg-slate-50 '"
                        class="mx-1 px-4 py-2 flex items-center justify-center  hover:text-blue-0 hover:bg-blue-2 rounded transition-all cursor-pointer w-1/2">
                        <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
                        <span class="mx-2 font-bold ">
                           Demande {{ data.status }}
                        </span>
                    </div>
                    <div
                        class="mx-1 px-4 py-2 flex items-center justify-center text-white bg-red-500  hover:text-white hover:bg-red-400 rounded transition-all cursor-pointer  w-1/2">
                        <span class="mx-2"><i class="fa-solid fa-calendar-days "></i></span>
                        <span class="mx-2 font-bold ">
                            Annuler le demande
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ListeReparer',
    props: { dataArray: Array },
    components: {

    },

}
</script>