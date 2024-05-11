<template>
    <div class="container flex items-center flex-col justify-center">
        <div class=" w-[60%]">
            <!-- This is an example component -->
            <Menu ref="menu" :popup="true" appendToBody="top"  class="flex" :model="items1"></Menu>
            <div v-for="(data, index) in dataArray" :key="index">
                <div
                    class="inline-grid max-w-xs sm:max-w-full lg:max-w-full lg:flex bg-fotsy rounded-lg border pb-6 lg:pb-0">
                    <div class="w-full lg:w-1/3 lg:p-4 h-64 ">
                        <img :src="data.image" alt="image" class="h-64 lg:h-full object-cover object-center w-full">
                    </div>

                    <div class="w-full flex flex-col  lg:w-2/3 p-3">
                        <div class="flex items-center justify-between w-full">
                            <div class="flex">
                                <img :src="data.user.photo ? data.user.photo : require('@/assets/image/pdpNone.jpeg')"
                                    class="h-10 w-10 mx-2 object-cover cursor-pointer rounded-full"
                                    alt="photo de profile">
                                <div class="ml-2">
                                    <p class="work-sans font-semibold text-lg m-0 text-blue-4">{{ data.user.username }}
                                        <span class="font-extralight">à faite demande le </span>
                                    </p>
                                    <p class="text-xs text-slate-500 -mt-0.5  m-0 font-normal flex items-center">
                                        <span>{{ new Date(data.date).toLocaleDateString() + ' à ' + new
                                            Date(data.date).toLocaleTimeString() }}</span>
                                    </p>
                                </div>
                            </div>
                                <div @click="toggle($event , index)"
                                class="text-blue-4 text-right mr-3 rounded-full cursor-pointer">
                                    <i class="fa-solid fa-ellipsis-vertical p-2"></i>
                                </div>
                        </div>
                        <div class="">
                            <span class="ml-4 text-lg font-bold mt-2 mb-0 text-blue-4 opacity-95">
                                {{ data.type }}:
                            </span>
                        </div>
                        <div>
                            <div class="inline-grid " v-if="true">
                                <p class="ml-4 text-sm mt-2 text-blue-4 opacity-75">
                                    {{ data.design }}
                                </p>
                            </div>
                            <div v-else class="grid">
                                <textarea id="contenu" rows="1" v-autoresize v-model="data.design"
                                    class="block w-full p-2 text-sm  text-blue-3 opacity-75 bg-transparent border-0  resize-none focus:outline-none"
                                    placeholder="Décrivez votre problème ici" required></textarea>
                            </div>

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
import Menu from 'primevue/menu';
import Swal from 'sweetalert2'
export default {
    name: 'ListeReparer',
    props: { dataArray: Array },
    components: {
        Menu
    }, data() {
        return {
            items1: [
                { label: 'Modifier le demande', command: (index) => console.log(index) },
            ],
        }
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
        toggle(event , i){
            let verRef = this.$refs['menu'] 
            verRef.toggle(event);
        },
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