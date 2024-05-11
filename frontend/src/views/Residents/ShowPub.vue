<template>
    <div class="-mt-3 container flex items-center justify-center"> 
        <div class="hidden">{{ getId }}</div>
            <card-pub-one :publication="dataArray"  :service="service"></card-pub-one> 
    </div>
</template>

<script>

import Axios from '@/_Service/caller.service';
import CardPubOne from '@/components/ResidentComponents/CardPubOne.vue';
export default {
    name: 'Service',
    components: {
        CardPubOne,
    },
    data() {
        return {
            dataArray: [],
            service: [],
        }
    },
    mounted() {
        this.getAllReparations()
    },
    computed:{
        getId(){
            this.getAllReparations()
            return this.$route.params.id
        },
    },

    methods: {
        async getAllReparations() {
            console.log(this.$route.params.id)
            try {
                var response = await Axios.get('/publication/'+this.$route.params.id);
                console.log(response.data.service);
                this.service = response.data.service;
                this.dataArray = response.data;
            } catch (error) {
                console.error(error);
            }
        },
    }

}
</script>