<template>
  <div class="bg-blue-0 ">
    <haut-header></haut-header>
    <Header class="sticky top-0 z-10"></Header>
    <div class="container mt-3 overflow-auto">
      <router-view class="font-Avenir" />
    </div>
    <footer class="relative bg-blueGray-200 pt-8 pb-6">
      <div class="container mx-auto px-4">
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-blueGray-500 font-semibold py-1">
              Copyright © <span id="get-current-year">2021</span><a href="https://www.creative-tim.com/product/notus-js"
                class="text-blueGray-500 hover:text-gray-800" target="_blank"> Notus JS by</a>
                <a href="https://www.creative-tim.com?ref=njs-profile"
                  class="text-blueGray-500 hover:text-blueGray-800">Creative Tim</a>.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import HautHeader from '../../components/HautHeader.vue'
import Header from '../../components/ResidentComponents/Header.vue'
export default {
  name: 'LayoutUser',
  components: {
    Header, HautHeader
  },
}
</script>
    HautHeader