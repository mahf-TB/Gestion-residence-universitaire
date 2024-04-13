<template>
    <div class="container flex items-center flex-col justify-center">
        <div class=" w-[60%]">
            <!-- <div class="bg-blue-0 px-3 pt-3 my-3 rounded-xl shadow-sm" v-for="(data, index) in dataArray" :key="index">
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
                <div class="flex items-center justify-center" v-if="data.image != 'http://localhost:8000/storage/null'">
                    <div>
                        <img :src="data.image" :alt="data.type" class="h-[60vh] w-full object-cover object-center">
                    </div>
                </div>

                <div class="mt-2 bg-gradient-to-r from-blue-900 to-blue-800 h-px"></div>

                <div class="flex items-center justify-between py-3">
                    <div :class="validaty(data.status)"
                        class="mx-1 px-4 py-2 flex items-center justify-center rounded transition-all  w-1/2">
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

            </div> -->

            <!-- This is an example component -->
            <div  v-for="(data, index) in dataArray" :key="index">

                <div class="inline-grid max-w-xs sm:max-w-full lg:max-w-full lg:flex bg-blue-4 rounded-lg border pb-6 lg:pb-0">
                    <div class="w-full lg:w-1/3 lg:p-4">
                        <!-- <img src="img/profile.jpg" alt="profile picture" class="rounded-lg"> -->
                        <img src="https://source.unsplash.com/nqEJ548Hqjs/800x600" alt="image"
                            class="h-64 lg:h-full object-cover object-center w-full">
                    </div>

                    <div class="w-full lg:w-2/3 p-4">
                        <div class="flex w-full">
                            <img :src="require('@/assets/image/pdpNone.jpeg')"
                                class="h-10 w-10 mx-2 object-cover cursor-pointer rounded-full" alt="photo de profile">
                            <div class="ml-2">
                                <p class="work-sans font-semibold text-lg text-white">{{data.user}}</p>
                                <p class="text-xs text-slate-400 -mt-0.5  m-0 font-normal"><i
                                        class="fa-solid fa-earth-americas mr-2"></i><span>{{ new Date(data.date).toLocaleDateString()+' à '+new Date(data.date).toLocaleTimeString() }}</span></p>
                            </div>
                        </div>
                        <div class="inline-grid">
                            <p class="raleway text-sm mt-2 text-white opacity-75">Lorem consequuntur deserunt aut dolor
                                ipsa.</p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center -mt-10 rounded-b-lg max-w-xs lg:max-w-full lg:-mt-8 lg:justify-end lg:pr-8 py-1">
                    <button type="button" class="text-white py-2 px-3 rounded-lg bg-blue-500">
                        <span class="work-sans font-semibold text-sm tracking-wide">Demande en attente</span>
                    </button>
                    <button type="button" class="py-2 px-3 bg-blue-500 rounded-lg ml-3 text-white">
                        <span class="work-sans font-semibold text-sm tracking-wide">Annuler la demande</span>
                    </button>
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
    methods: {
        validaty(data) {
            if (data == 'en cours') {
                return 'bg-yellow-200 text-yellow-600'
            }
            else if (data == 'terminer') {
                return 'bg-green-600 text-white'
            } else {
                return 'bg-slate-50 '
            }
        }
    }

}
</script>