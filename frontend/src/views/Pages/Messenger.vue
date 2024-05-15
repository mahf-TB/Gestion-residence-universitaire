<template>
  <div class="container mt-3">
    <div class=" h-full bg-blue-0  flex flex-col rounded-xl  shadow-xl">
      <!-- body -->
      <div class="h-[700px] flex">
        <!-- sidebar liste discussion personne -->
        <div class="h-full w-96  bg-slate-50 border-r flex flex-col  rounded-l-xl ">
          <div class="h-14  border-b px-2 rounded-t-xl  flex items-center justify-between space-x-4">
            <div :class="{ 'border-b-4 border-blue-500': check }" class="px-2 py-3">Discusions{{ check }}</div>
            <div class="flex items-center justify-end text-blue-2">
              <div :class="{ 'border-b-4 border-blue-500': !check }" class="px-2 py-3" @click="check = false"><i
                  class="fa-solid  fa-users"></i></div>
              <div class="px-2 py-4 "><i class="fa-regular fa-pen-to-square"></i></div>
            </div>
          </div>
          <side-bar-liste :check="check" :userListe="userListe" :allUserChat="allUserChat" :user="user"
            :getMessagesUser="getMessagesUser"></side-bar-liste>
        </div>
        <div class="w-full h-full flex flex-col">
          <!-- header de contenu du message -->
          <div
            class="h-16 border-b flex bg-slate-50 justify-between items-center rounded-tr-xl w-full px-5 py-2 shadow-sm">
            <div class="flex items-center">
              <img class="h-10 w-10 overflow-hidden rounded-full" :src="user.photo" alt="">
              <div class="flex flex-col">
                <span class="font-semibold ml-3 text-slate-600">{{ user.username }}</span>
                <span class="font-light text-xs ml-3 text-green-600">En ligne </span>
              </div>
            </div>
            <div class="flex items-center space-x-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-9 bg-slate-50 rounded-full stroke-slate-400 p-2"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-slate-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
              </svg>
            </div>
          </div>
          <message-user id="scroll" :messageUser="messageUser" :id_user="user.id"></message-user>
          <!--  footer du message avec send -->
          <div class="w-full bg-slate-200  px-2 py-3">
            
            <form @submit.prevent="sendMessage(user.id)">
              <div
                class="h-12 relative flex justify-between px-3 items-center border border-transparent bg-slate-50 focus-within:border-slate-300 rounded-full">
                <input v-model="chat.message"
                  class="w-full px-3 h-10 bg-transparent outline-none placeholder:text-slate-400"
                  placeholder="Ècrivez un message..." />
                <div class="flex items-center space-x-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 stroke-slate-300" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 stroke-slate-300" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                <div type="submit"  class="text-xl cursor-pointer ml-4 mr-2">
                  <i class="fa-solid fa-paper-plane"></i>
                </div>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</template>

<script>

import Axios from '@/_Service/caller.service'
import SideBarListe from '@/components/Messages/SideBarListe.vue'
import MessageUser from '@/components/Messages/MessageUser.vue'

export default {
  name: 'Messenger',
  props: {
    auth_user: Array
  },
  components: {
    SideBarListe,
    MessageUser,
  },
  data() {
    return {

      check: true,
      userListe: [],
      messageUser: [],
      user: [],
      chat: {
        message: '',
        id_receive: null
      },
      allUserChat: null,

    }
  },
  mounted() {
  },
  computed: {

  },
  created() {

    this.getListeUser()
    this.allUsersChat()


    window.Echo.channel(`chat.${this.auth_user.id}`)
      .listen("SendMessageEvents", e => {
        this.messageUser.push(e.message)
        setTimeout(this.scrollToEnd, 100)
      });
  },

  methods: {
    async getListeUser() {
      try {
        const res = await Axios.get('user_list')
        this.userListe = res.data;
      } catch (error) {
        console.error(error)
      }
    },

    async sendMessage(id_receive) {
      this.chat.id_receive = id_receive
      if (this.chat.message) {
        try {
          const res = await Axios.post('send_message', this.chat)
          this.chat.message = '';
          this.messageUser.push(res.data.messages)
          setTimeout(this.scrollToEnd, 100)

        } catch (error) {
          console.error(error)
        }
      }else{
        alert('pas de message')
      }

    },

    // recuperation des messages 
    async getMessagesUser(items) {
      let data = this.allUserChat.filter(item => {
        return item.id == items.id
      })
      if (data == '') {
        this.allUserChat.push(items);
      }
      this.check = true
      try {
        const res = await Axios.get('message_to/' + items.id)
        this.messageUser = res.data.messages;
        this.user = res.data.user;
        setTimeout(this.scrollToEnd, 100)

      } catch (error) {
        console.error(error)
      }
    },


    async allUsersChat() {
      // users-message-current
      try {
        const res = await Axios.get('users-message-current')
        this.allUserChat = res.data.Usermessages;
        if(this.allUserChat != ''){
          this.getMessagesUser(this.allUserChat[0])
        }

      } catch (error) {
        console.error(error)
      }
    },


    scrollToEnd() {
      document.getElementById("scroll").scrollTo(0, 99999)
    },
  }
}
</script>