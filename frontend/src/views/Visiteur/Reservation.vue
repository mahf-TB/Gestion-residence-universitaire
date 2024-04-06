<template>
    <div class="container my-3">
        <div class=" py-2">
            <h1 class="text-xxl text-center mb-4 text-[#2b6b88]">Réservation de logement</h1>
            <div class="flex items-start justify-between surface-section text-800 mb-5">
                <div class=" text-left my-2 md:text-left flex w-[700px] items-center ">
                    <section class="animate-fade-right animate-ease-in-out w-full">
                        <form-reservation></form-reservation>
                    </section>
                </div>
                <div class="overflow-hidden px-2">
                    <img :src="require('@/assets/image/chambre.jpg')" alt="Image"
                        class="md:ml-auto block w-[600px] h-[600px] object-cover animate-fade-left animate-once animate-ease-in-out"
                        style="clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 100%)">
                </div>
            </div>
        </div>
    </div>
</template> 

<script>
import FormReservation from '@/components/VisiteurComponents/FormReservation.vue';
export default {
    name: 'Reservation',
    components: {
        FormReservation
    },
    data() {
        return {

        }
    },
    methods:{
       
    }
}
</script>