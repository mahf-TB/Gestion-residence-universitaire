<template>
  <div class="">
    <div class=" h-full bg-blue-0  flex flex-col rounded-xl  shadow-xl">
      <!-- body -->
      <div class="h-[700px] flex">
        <!-- sidebar liste discussion personne -->
        <div class="h-full w-96  bg-slate-50 border-r flex flex-col  rounded-l-xl ">
          <div class="h-14  border-b px-2 rounded-t-xl  flex items-center justify-between space-x-4">
            <div class="px-2 py-3 border-b-4 border-blue-500">Discusions</div>

            <div class="flex items-center justify-end text-blue-2">
              <div class="px-2 py-4 "><i class="fa-solid  fa-users"></i></div>
              <div class="px-2 py-4 "><i class="fa-regular fa-pen-to-square"></i></div>
            </div>
          </div>
          <div class="h-full overflow-scroll">
            <div
              class="px-2 py-3  flex items-center   cursor-pointer border-l-4 border-l-transparent hover:bg-slate-100">
              <img
                src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHVzZXJzfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500"
                class="h-12 w-12 border-2 border-white rounded-full" alt="">
              <div class="ml-4">
                <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0">Yaroslav Zubkp
                </p>
                <p class="text-xs text-slate-400 -mt-0.5 font-semibold m-0" x-text="user.email">is is long ipsum
                  avaliable...</p>
              </div>
            </div>

            <div
              class="px-2 py-3     flex items-center   cursor-pointer border-l-4 border-l-transparent hover:bg-slate-100">
              <img
                src="https://images.unsplash.com/photo-1499887142886-791eca5918cd?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fHVzZXJzfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500 "
                class="h-12 w-12 border-2 border-white rounded-full" alt="">
              <div class="ml-4">
                <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0"> Alison Alison
                </p>
                <p class="text-xs text-slate-400 -mt-0.5 font-semibold m-0" x-text="user.email">Hello</p>
              </div>
            </div>

            <div
              class="px-2 py-3      flex items-center bg-white cursor-pointer border-l-4 border-l-blue-500 border-t border-b">
              <img
                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dXNlcnN8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500 "
                class="h-12 w-12 border-2 border-white rounded-full" alt="">
              <div class="ml-4 overflow-hidden">
                <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0"> Mircel Jones</p>
                <p class="text-xs text-slate-400 -mt-0.5 font-semibold my-0" x-text="user.email">Hey, we are own...</p>
              </div>
            </div>

            <div
              class="px-2 py-3   flex items-center   cursor-pointer border-l-4 border-l-transparent hover:bg-slate-100">
              <img
                src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnN8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500"
                class="h-12 w-12 border-2 border-white rounded-full" alt="">
              <div class="ml-4">
                <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0">Uran Poland</p>
                <p class="text-xs text-slate-400 -mt-0.5 font-semibold m-0" x-text="user.email">We own hidden
                  lake..</p>
              </div>
            </div>

            <div
              class="px-2 py-3     flex items-center   cursor-pointer border-l-4 border-l-transparent hover:bg-slate-100">
              <img
                src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHVzZXJzfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500"
                class="h-12 w-12 border-2 border-white rounded-full" alt="">
              <div class="ml-4">
                <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0">Yaroslav Zubkp
                </p>
                <p class="text-xs text-slate-400 -mt-0.5 font-semibold m-0" x-text="user.email">is is long ipsum
                  avaliable...</p>
              </div>
            </div>

            <div
              class="px-2 py-3    flex items-center   cursor-pointer border-l-4 border-l-transparent hover:bg-slate-100">
              <img
                src="https://images.unsplash.com/photo-1499887142886-791eca5918cd?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fHVzZXJzfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500 "
                class="h-12 w-12 border-2 border-white rounded-full" alt="">
              <div class="ml-4">
                <p x-text="user.name" class="text-md font-semibold text-slate-600 m-0 p-0"> Alison Alison
                </p>
                <p class="text-xs text-slate-400 -mt-0.5 font-semibold m-0" x-text="user.email">Hello Bro</p>
              </div>
            </div>



            <!-- else -->


          </div>
        </div>
        <div class="w-full h-full flex flex-col">
          <!-- header de contenu du message -->
          <div class="h-16 border-b flex bg-slate-50 justify-between items-center rounded-tr-xl w-full px-5 py-2 shadow-sm">
            <div class="flex items-center">
              <img class="h-10 w-10 overflow-hidden rounded-full"
                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dXNlcnN8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500"
                alt="">
              <p class="font-semibold ml-3 text-slate-600">Mircel Jones</p>
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
          <!--  contenu du message -->
          <div class="h-full  px-10 bg-slate-200 py-4 overflow-scroll">
            <!-- message container -->
            <div class="text-center ">
              <span class="text-xs text-blue-1 font-medium px-3 -mt-3">Wednesday, Feburary
                5</span>
            </div>
            <!-- messages -->
            <div class="w-full flex flex-start overflow-y-auto">
              <div class="w-1/2">
                <div class="flex items-center">
                  <img class="h-5 w-5 overflow-hidden rounded-full"
                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dXNlcnN8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500"
                    alt="">
                  <p class="font-semibold mx-3 my-0 text-sm text-slate-600"><span class="text-slate-400 text-xs ">3:21
                      PM</span></p>
                </div>

                <div class="mt-1 w-full bg-slate-50 py-2 px-3 rounded-b-xl rounded-tr-xl">
                  <p class=" text-sm text-slate-500">
                    Hey all, <br>
                    There are many variation of passages of Lorem ipsum avaliable, but the jority have alternation in
                    some
                    form , by injected humor, or randomise words which don't look even slightly believable.
                  </p>
                </div>
              </div>
            </div>
            
            <!-- me -->
            <div class="w-full flex justify-end mt-3">
              <div class="w-1/2 ">
                <div class="flex items-center justify-end">
                  <p class="font-semibold mx-3 my-0  text-sm text-slate-600"><span class="text-slate-400 text-xs">3:25
                      PM</span>
                  </p>
                  <img class="h-5 w-5 overflow-hidden rounded-full"
                    src="https://source.unsplash.com/random/500x500/?face" alt="">
                </div>
                <div class="mt-1 w-full bg-blue-500 py-2 px-3 rounded-b-xl rounded-tl-xl">
                  <p class=" text-sm text-white">
                    Hey, <br>
                    we are own hidden lake forest which is netural lake are generaly found in mountain.
                  </p>
                </div>
              </div>
            </div>
            
          </div>

          <!--  footer du message avec send -->
          <div class="w-full bg-slate-200  px-2 py-3">
            <div
              class="h-12 relative flex justify-between px-3 items-center border border-transparent bg-slate-50 focus-within:border-slate-300 rounded-full">
              <input class="w-full px-3 h-10 bg-transparent outline-none placeholder:text-slate-400"
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
              <div class="text-xl cursor-pointer ml-4 mr-2">
                <i class="fa-solid fa-paper-plane"></i>
              </div>
            </div>
            <!-- <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
            <svg class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
        </button> -->

          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  name: 'Messenger',
  components: {

  },
  data() {
    return {
      search: false
    }
  }
}
</script>