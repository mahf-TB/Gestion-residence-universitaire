<template>
  <div class="bg-blue-4">
    <div class="flex items-center justify-center h-screen relative  overflow-hidden">
      <!-- Login Container -->
      <div class="min-w-[400px] relative flex-col z-10 border bg-white px-6 py-14 shadow-md rounded-xl">
        <div class="mb-8 text-center text-blue-1">
          <div class="absolute top-3 text-xl cursor-pointer transition-all duration-300 hover:bg-blue-0 rounded"
            @click="this.$router.push('/accueil');">
            <i class="fa-solid fa-arrow-left-long p-2 "></i>
          </div>
          <div class="flex justify-center">
            <img class="w-[100px] h-[100px]" :src="require('@/assets/LC.png')" alt="logo pour le residence" />
          </div>
          <div>
            <h1 class="text-[24px] italic text-blue-1">Lodge Cité Universitaire</h1>
          </div>
        </div>
        <form @submit.prevent="login()">
          <div class="flex flex-col text-sm rounded-md">
            <!-- adresse email ou username -->
            <input type="text"
              class="rounded-[4px] text-[16px] p-3 hover:outline-none focus:outline-none border-1 border-gray-400 hover:border-green-400"
              name="integration[email]" required placeholder="Email ou username" v-model="user.email" />
            <p class="text-red-500 text-xs italic mb-3">{{ errorID }}</p>
            <!-- input pour votre mot de passe -->
            <input
              class=" rounded-[4px] p-3 text-[16px] hover:outline-none focus:outline-none border-1 border-gray-400 hover:border-green-400"
              name="integration[password]" :class="errorClass" :type="[toggle ? 'text' : 'password']"
              placeholder="Mot de passe " v-model="user.motdepasse" />
            <p class="text-red-500 text-xs italic mb-3">{{ errorPWD }}</p>
            <!-- toggle voir ou hash pour votre mot de passe -->
            <div class="flex mb-1 justify-between">
              <label for="toggle" class="mb-3 relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                :class="[toggle ? 'bg-green-400' : 'bg-gray-200']">
                <div 
                  class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                  :class="[toggle ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-200']">
                  <input type="checkbox" id="toggle" name="toggle"
                    class="appearance-none w-full h-full active:outline-none focus:outline-none" @click="onToggle()" />
                </div>
              </label>
              <RouterLink to="/reset">Mot de passe oublié?</RouterLink>
            </div>
          </div>
          <button
            class="mt-3 w-full border p-2 bg-gradient-to-r from-blue-800 bg-blue-500 text-white rounded-[4px] hover:bg-slate-400 scale-105 duration-300"
            type="submit">
            SE CONNECTER
          </button>
        </form>
        <div class="mt-2 flex justify-center text-center text-[#2f7c89]">
          <RouterLink to="/signup">Créer un nouveaux compte?</RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from '@/_Service/caller.service';
export default {
  name: 'HomeView',
  components: {
  },
  data() {
    return {
      user: {
        email: "",
        motdepasse: "",
      },
      toggle: false,
      errorID: "",
      errorPWD: "",
      errorClass: "",
    };
  },
  methods: {
    async login() {
      const formData = new FormData()
      formData.append('email', this.user.email)
      formData.append('password', this.user.motdepasse)
      try {
        const response = await Axios.post('/auth/login', formData)
        if (response.data.status == 'success') {
          let user = response.data.user
          console.log(user.type)
          
          //add to user and token dans le localeStorage
          localStorage.setItem("token", JSON.stringify(response.data.access_token))
          
          if (user.type == 'admin') {
            this.$router.push("/admin/dashboard");
          } else if (user.type == 'user') {
            this.$router.push("/user/home");
          }
        } else {
          this.errorID = 'Incorrect !, verifiez votre address email'
          this.errorPWD = 'Incorrect !, verifiez votre mot de passe '
        }
      } catch (error) {
        var erreur = error.response.data.errors
        if (erreur.email != '') {
          this.errorID = 'Incorrect !, verifiez votre address email'
          this.errorPWD = 'Incorrect !, verifiez votre mot de passe '
        }

      }
    },
    onToggle() {
      this.toggle = !this.toggle;
    },
  }
}
</script>
