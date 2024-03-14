<template>
    <div class="bg-blue-0 p-4">
        <nav class="text-[18px] flex items-center justify-around">
            <router-link to="/accueil">Homepage</router-link>
            <router-link to="">Etudiants</router-link>
            <router-link to="" @click="deconnect()">Deconnecter</router-link>
        </nav>
    </div>
</template>

<script>

export default {
    name: 'Header',
    components: {

    },
    methods:{
        deconnect(){
            localStorage.removeItem('user-info');
        this.$router.push("/login");
        }
    }
}
</script>