<template>
    <div class="text-blue-4 px-2 cursor-pointer h-full relative flex items-center" @click="$refs.menu4.toggle($event)">
        <i class="fa-solid fa-bell" style="font-size: 1.4rem"></i>
        <span v-if="note"
            class="absolute top-2 right-1 text-[8px] px-[6px] py-[2px] rounded-full bg-red-500 text-fotsy">{{ note
            }}</span>

        <Menu ref="menu4" :popup="true" class="flex flex-col p-2 max-w-[450px] max-h-[80vh] overflow-y-auto" :model="dataArray">
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
                <div  @click="readAll(item.id, item.message.id)" class="flex items-center " :class="item.read ? '' : 'bg-slate-100'"
                    v-bind="props.action">
                    <div class="flex items-center justify-start"
                        v-if="item.message.id_service">
                        <div
                            class="cursor-pointer bg-center bg-cover bg-no-repeat rounded-full inline-block h-14 min-w-14">
                            <img :src=" item.image"
                                class="h-14 w-14 object-cover rounded-md" alt="photo de profile">
                        </div>
                        <div class="ml-2">
                            <div class="font-bold">
                                <span class="text-sm uppercase">{{ item.service.user.username }} </span>
                                <span class="text-[14px] text-gray-500 ml-2 font-light font-Avenir">a publié un autre plat dans le menu Resto-Interne.
                                    <span class="text-blue-2 font-semibold">{{ item.service.nom_service+': ' }}</span><span v-html="(item.service.description ).substring(0, 20)" />...
                                </span>
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
        async readAll(id_notif = 0, id_pub = 0) {
            try {
                if (id_notif) {
                     await Axios.get('read?id='+id_notif)
                     this.$router.push(`/user/show-pub/${id_pub}`)
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