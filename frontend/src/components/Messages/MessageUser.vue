<template>
    <!--  contenu du message -->
    <div class="h-full  px-10 bg-slate-200 py-4 overflow-scroll">
        <!-- message container -->
        <div class="text-center ">
            <span class="text-xs text-blue-1 font-medium px-3 -mt-3">

            </span>
        </div>
        <div v-for="(data, index) in messageUser" :key="index">
            <!-- messages receive to user -->
            <div v-if="data.id_receive != id_user" class="w-full flex flex-start overflow-y-auto">
                <div class="max-w-[50%]">
                    <div class="flex items-center">
                        <p class="font-semibold mx-3 my-0 text-sm text-slate-600"><span
                                class="text-slate-400 text-xs ">{{ new Date(data.created_at).toLocaleTimeString() }}
                            </span></p>
                    </div>

                    <div class="mt-1 w-full bg-slate-50 py-2 px-3 rounded-b-xl rounded-tr-xl">
                        <p class=" text-sm text-slate-500">
                            {{ data.message }}
                        </p>
                    </div>
                </div>

            </div>
            <!-- message send to user -->
            <div v-else class="w-full flex justify-end mt-3">
                <div class=" max-w-[50%]">
                    <div class="flex items-center justify-end">
                        <p class="font-semibold mx-3 my-0  text-sm text-slate-600"><span
                                class="text-slate-400 text-xs">{{ new Date(data.created_at).toLocaleTimeString() }}
                                PM</span>

                        </p>
                    </div>
                    <div class="mt-1 w-full bg-blue-500 py-2 px-3 rounded-b-xl rounded-tl-xl">
                        <p class=" text-sm text-white">
                            {{ data.message }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- <pre>{{ data }}</pre> -->
        </div>
    </div>
</template>

<script>
export default {
    name: 'SideBarListe',
    props: {
        messageUser: Object,
        check: Boolean,
        id_user: Number
    },
    methods: {

    },
    setup() {
    },
}
</script>