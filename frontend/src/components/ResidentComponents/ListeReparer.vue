<template>
    <div class="container flex items-center flex-col justify-center">
        <div class=" w-[60%] ">
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
            <div v-for="(data, index) in dataArray" :key="index">

                <div
                    class="inline-grid max-w-xs sm:max-w-full lg:max-w-full lg:flex bg-fotsy rounded-lg border pb-6 lg:pb-0">
                    <div class="w-full lg:w-1/3 lg:p-4 h-64 ">
                        <img :src="data.image" alt="image" class="h-64 lg:h-full object-cover object-center w-full">
                    </div>

                    <div class="w-full flex flex-col  lg:w-2/3 p-3">
                        <div class="flex items-center justify-between w-full">
                            <div class="flex">
                                <img :src="require('@/assets/image/pdpNone.jpeg')"
                                    class="h-10 w-10 mx-2 object-cover cursor-pointer rounded-full"
                                    alt="photo de profile">
                                <div class="ml-2">
                                    <p class="work-sans font-semibold text-lg m-0 text-blue-4">{{ data.user }} <span
                                            class="font-extralight">à faite demande le </span></p>
                                    <p class="text-xs text-slate-500 -mt-0.5  m-0 font-normal flex items-center">
                                        <span>{{ new Date(data.date).toLocaleDateString() + ' à ' + new
                                            Date(data.date).toLocaleTimeString() }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="text-blue-4 text-right mr-3 rounded-full hover:bg-slate-500">
                                <i class="fa-solid fa-ellipsis-vertical px-3 py-2"></i>
                            </div>
                        </div>
                        <div class="">
                            <span class="ml-4 text-lg font-bold mt-2 mb-0 text-blue-4 opacity-95">
                                {{ data.type }}:
                            </span>
                        </div>
                        <div class="grid" v-if="!true">
                            <textarea id="contenu" rows="1" v-autoresize v-model="data.design"
                                class="block w-full p-2 text-sm  text-blue-3 opacity-75 bg-transparent border-0  resize-none focus:outline-none"
                                placeholder="Décrivez votre problème ici" required></textarea>
                        </div>
                        <div class="inline-grid " v-if="true">
                            <p class="ml-4 text-sm mt-2 text-blue-4 opacity-75">
                                {{ data.design }}
                            </p>
                        </div>
                        <div class="flex">
                            <span :class="validaty(data.status)"
                                class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold ">
                                {{ data.status == 'terminer' ? 'Reparation ' + data.status : 'Demande ' + data.status }}
                            </span>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center -mt-10 rounded-b-lg max-w-xs lg:max-w-full lg:-mt-8 lg:justify-end lg:pr-8 py-1">
                    <button type="button" class=" py-2 px-3 rounded-lg  bg-green-400 text-white "
                        v-if="data.status == 'terminer'">
                        <span class="work-sans font-semibold text-sm tracking-wide">Demande {{ data.status }}</span>
                    </button>
                    <button @click="annulerDemande(data.id)" v-if="data.status != 'terminer'"
                        class="py-2 px-3 bg-red-400  hover:text-white hover:bg-red-600 rounded-lg ml-3 text-white">
                        <span class="work-sans font-semibold text-sm tracking-wide">Annuler la demande</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import Axios from '@/_Service/caller.service';
import Swal from 'sweetalert2'
export default {
    name: 'ListeReparer',
    props: { dataArray: Array },
    components: {

    },
    directives: {
        autoresize(el) {
            const resize = () => {
                el.style.height = 'auto';
                el.style.height = el.scrollHeight + 'px';
            };
            el.addEventListener('input', resize);
            resize();
        },
    },
    methods: {
        validaty(data) {
            if (data == 'en cours') {
                return 'bg-yellow-200 text-yellow-600'
            }
            else if (data == 'terminer') {
                return 'bg-green-100 text-green-600 '
            } else {
                return 'bg-blue-100 text-blue-500'
            }
        },
        async annulerDemande(id) {
            Swal.fire({
                title: "Es-tu sûre ?",
                text: "Vous ne serez pas en mesure d'inverser cela.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Annuler!",
                confirmButtonText: "Oui, supprimez-le!",

            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        var response = await Axios.delete('/delete_reparation?id=' + id)
                        console.log(response)
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    } catch (error) {
                        console.error(error);
                    }

                }
            });

        }
    }

}
</script>