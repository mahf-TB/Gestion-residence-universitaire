<template>
  <div class="bg-blue-0 ">
    <Header></Header>
    <div class="container pt-3">
      <router-view class="font-Avenir" />
    </div>
    <footer class="relative bg-blueGray-200 pt-8 pb-6">
      <div class="container mx-auto px-4">
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-blueGray-500 font-semibold py-1">
              Copyright © <span id="get-current-year">2021</span><a href="https://www.creative-tim.com/product/notus-js"
                class="text-blueGray-500 hover:text-gray-800" target="_blank"> BabaCode by </a>
                <a href="https://www.facebook.com/mahefa.bienvenu.1/"
                  class="text-blueGray-500 hover:text-blueGray-800 mx-2">Creative Team</a>.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import Header from '../../components/AdminComponents/Header.vue'
export default {
  name: 'LayoutAdmin',
  components: {
    Header
  },
}
</script>