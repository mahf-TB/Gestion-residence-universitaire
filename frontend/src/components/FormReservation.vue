<template>
    <div>
        <form @submit.prevent="enregistrer()" class="px-1">
            <div class="flex flex-col text-sm rounded-md">
                <div class="flex mb-3">
                    <!-- adresse email ou username -->
                    <div class="grow flex flex-col mr-1">
                        <label for="integration[name]" class="my-1 text-lg">Nom<span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[name]" required placeholder="Entrer votre Nom" v-model="client.nom" />
                    </div>
                    <!-- adresse email ou username -->
                    <div class="grow flex flex-col ml-1">
                        <label for="integration[prenom]" class="my-1 text-lg">Prenom<span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[prenom]" required placeholder="Entrer votre Nom" v-model="client.prenom" />
                    </div>
                </div>
                <!-- adresse email -->
                <label for="integration[email]" class="my-1 text-lg">Email<span class="text-red-500">*</span></label>
                <input type="email"
                    class="rounded-[4px] p-3 text-[14px]  mb-3  border-1 border-gray-400 hover:border-blue-2"
                    name="integration[email]" required placeholder="Entrer votre Nom" v-model="client.email" />
                    <!-- adresse email -->
                <label for="integration[type]" class="my-1 text-lg">Type de logement<span
                        class="text-red-500">*</span></label>
                <input type="text"
                    class="rounded-[4px] p-3 text-[14px]  mb-3  border-1 border-gray-400 hover:border-blue-2"
                    name="integration[type]" required placeholder="Entrer votre Nom" v-model="client.type_logement" />
                <!-- adresse email -->
                <label for="integration[logement]" class="my-1 text-lg">Logement<span class="text-red-500">*</span></label>
                <input type="text"
                    class="rounded-[4px] p-3 text-[14px]  mb-3  border-1 border-gray-400 hover:border-blue-2"
                    name="integration[logement]" required placeholder="Entrer votre Nom" v-model="client.logement" />
                
                <div class="flex mb-2">
                    <!-- adresse email -->
                    <div class="grow flex flex-col mr-1">
                        <label for="integration[debut]" class="my-1 text-lg">Date debut<span
                                class="text-red-500">*</span></label>
                        <input type="date"
                            class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[debut]" required placeholder="Entrer votre Nom" v-model="client.debut" />
                    </div>
                    <!-- adresse email -->
                    <div class="grow flex flex-col ml-1">
                        <label for="integration[fin]" class="my-1 text-lg">Date fin<span
                                class="text-red-500">*</span></label>
                        <input type="date"
                            class="rounded-[4px] p-3 text-[14px]  mb-1  border-1 border-gray-400 hover:border-blue-2"
                            name="integration[fin]" required placeholder="Entrer votre Nom" v-model="client.fin" />
                    </div>
                </div>
            </div>
            <button
            class="mt-3 w-full border p-2 uppercase bg-gradient-to-r from-blue-800 bg-blue-500 text-white rounded-[4px] hover:bg-slate-400 scale-105 duration-300"
            type="submit">
            Envoyez votre demande
          </button>
        </form>
    </div>
</template>
<script>
export default {
    name: 'FormReservation',
    data() {
        return {
            client: {
                nom: '',
                prenom: '',
                email: '',
                logement: '',
                type_logement: '',
                debut: null,
                fin: null,
            }
        }
    },
    methods: {
        enregistrer(){

            console.log(this.client);
            
        }
    }
}
</script>