<template>
<!-- component -->
<!-- Tailwind Play: https://play.tailwindcss.com/qIqvl7e7Ww  -->


<div class="flex pt-36 items-center justify-start bg-white">
  <div class="mx-auto w-full max-w-lg mb-8">
    <h1 class="text-4xl text-[#2b6b88] font-medium">Nous contacter?</h1>
    <p class="text-gray-500">Vous pouvez directement nous joindre au <span class="text-gray-700">0329772929</span> ou au <span class="text-gray-700">0331718939</span> </p> 
    <p class="px-auto text-gray-500">ou alors</p>
    <p class="mt-3 text-gray-500">Envoyez-nous un mail au lodgecite.univ@gmail.com ou laissez un message ici : </p>

    <form action="https://api.web3forms.com/submit" class="mt-10">
    
    <!-- This is a working contact form. 
         Get your free access key from: https://web3forms.com/  -->

      <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE" /> 
      <div class="grid gap-6 sm:grid-cols-2">
        <div class="relative z-0">
          <input type="text" name="name" class="peer block w-full appearance-none border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
          <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Votre nom</label>
        </div>
        <div class="relative z-0">
          <input type="text" name="email" class="peer block w-full appearance-none border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
          <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Votre email</label>
        </div>
        <div class="relative z-0 col-span-2">
          <textarea name="message" rows="5" class="peer block w-full appearance-none border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" "></textarea>
          <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Votre message</label>
        </div>
      </div>
      <button type="submit" class="mt-5 rounded-md bg-blue-2 px-10 py-2 text-white">Envoyer Message</button>
    </form>
  </div>
</div>
</template>
  
  <script>
  
  export default {
    name: 'Contact',
    components: {
  
    }
  }
  </script>