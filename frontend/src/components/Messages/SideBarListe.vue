<template>
  <div>
    <div v-if="check" class="h-full overflow-scroll">
      <div v-for="(chat, index) in allUserChat" :key="index" @click="getMessagesUser(chat)" 
      :class="{ 'text-blue-4 border-gray-400  bg-white cursor-pointer border-l-blue-500 border-y': user.id === chat.id }"
        class="px-2 py-3  flex items-center cursor-pointer border-l-4 border-l-transparen">
        <img :src="chat.photo? chat.photo : require('@/assets/image/pdpNone.jpeg')" class="h-12 w-12 border-2 border-white rounded-full" alt="">
        <div class="ml-4">
          <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0">
            {{ chat.username }}
          </p>
          <p class="text-xs text-slate-400 -mt-0.5 font-light m-0" x-text="user.email">
            {{ chat.email }}
          </p>
        </div>
      </div>
    </div>

    <div v-else class="h-full overflow-scroll">
      <div v-for="(user, index) in userListe" :key="index" @click="getMessagesUser(user)"
        class="px-2 py-3  flex items-center   cursor-pointer border-l-4 border-l-transparent hover:bg-slate-100">
        <img :src="user.photo ? user.photo : require('@/assets/image/pdpNone.jpeg')"
          class="h-12 w-12 border-2 border-white rounded-full" alt="">
        <div class="ml-4">
          <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0">{{ user.username }}
          </p>
          <p class="text-xs text-green-400 -mt-0.5 font-semibold m-0" x-text="user.email">En ligne</p>
        </div>
      </div>
    </div>
  </div>


</template>

<script>
export default {
  name: 'SideBarListe',
  props: {
    userListe: Object,
    allUserChat: Object,
    check: Boolean,
    getMessagesUser: Function,
    user: Object
  },
  mounted(){
   
  },
  created() {
    // window.Echo.join('online-status')
    //   .here(users => {
    //     // Mettez à jour l'état en ligne des utilisateurs ici
    //     users.forEach(user => {
    //       console.log(user.id, true);
    //     });
    //   })
    //   .joining(user => {
    //     // Un utilisateur est connecté, mettez à jour son statut
       
    //     console.log(user.id, true);
    //   })
    //   .leaving(user => {
    //     // Un utilisateur est déconnecté, mettez à jour son statut
        
    //       console.log(user.id, false);
    //   });
  },
}
</script>