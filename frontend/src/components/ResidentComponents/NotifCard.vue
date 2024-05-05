<template>
    <div class="text-blue-4 px-2 cursor-pointer h-full relative flex items-center" @click="$refs.menu4.toggle($event)">
        <i class="fa-solid fa-bell" style="font-size: 1.4rem"></i>
        <span v-if="note"
            class="absolute top-2 right-1 text-[8px] px-[6px] py-[2px] rounded-full bg-red-500 text-fotsy">{{ note
            }}</span>

        <Menu ref="menu4" :popup="true" class="flex flex-col p-2 w-[400px]" :model="dataArray">
            <template #start>
                <div class="flex items-center justify-between p-1">
                    <div class="font-bold text-lg text-blue-2">
                        Notifications
                    </div>
                    <div @click="readAll()" class="font-ligth text-blue-4 text-sm hover:underline cursor-pointer">
                        Tout marquer comme lu
                    </div>
                </div>
                <hr class="border-gray-00 my-1">
            </template>
            <template #item="{ item, props }">
                <div @click="readAll(item.id)" class="flex items-center " :class="item.read ? '' : 'bg-slate-100'"
                    v-bind="props.action">
                    <div class="flex items-center justify-start"
                        v-if="jsonData(item.message).type_service == 'RestoPlat'">
                        <div
                            class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 min-w-12">
                            <img :src="'http://127.0.0.1:8000/Storage/' + jsonData(item.message).image"
                                class="h-12 w-12 object-cover rounded-md" alt="photo de profile">
                        </div>
                        <div class="pt-2 ml-2">
                            <div class="font-bold">
                                <span class="text-sm uppercase">{{ jsonData(item.message).nom_service }} </span>
                                <span class="text-[14px] text-gray-500 ml-2 font-light font-Avenir"></span>
                                <h1 class="text-[14px] text-gray-500 ml-2 font-light font-Avenir">vous invite à voir
                                    son nouvelle plat dans menu
                                </h1>
                            </div>

                        </div>
                    </div>
                </div>
            </template>
        </Menu>
    </div>
</template>
<script>

import Axios from '@/_Service/caller.service'
import Menu from 'primevue/menu';
export default {
    name: 'NotifCard',
    // props: { data: Object },
    components: {
        Menu
    },
    data() {
        return {
            items: [
                { label: 'Chef service', command: () => this.$router.push("/accueil") },
                { label: 'Mahefa', command: () => this.$router.push("/user/residences") },
                { label: 'Admin', command: () => this.$router.push("/user/service") },
            ],
            note: 0,
            dataArray: []
        }
    },
    mounted() {
        window.Echo.channel('notif').listen('ServiceNotif', (e) => {
            this.getDataArray()
            console.log(e)
        });
        this.getDataArray()
    },
    computed: {

    },
    methods: {
        async getDataArray() {
            try {
                const res = await Axios.get('index_notif')
                this.dataArray = res.data;
                this.note = this.dataArray.filter(items => items.read != 1).length
            } catch (error) {
                console.log(error)
            }
        },
        jsonData(data) {
            return JSON.parse(data)
        },
        async readAll(id = 0) {

            try {
                if (id) {
                     await Axios.get('read?id='+id)
                    this.getDataArray()
                } else {
                     await Axios.get('read')
                    this.getDataArray()
                }
            } catch (error) {
                console.log(error)
            }

        }
    }

    // index_notif
}
</script>