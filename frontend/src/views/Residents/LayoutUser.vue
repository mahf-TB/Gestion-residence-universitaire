<template>
  <div class="bg-blue-0 ">
    <haut-header></haut-header>
    <Header class="sticky top-0 z-10"></Header>
    <div class=" mt-3 overflow-auto">
      <router-view class="font-Avenir" />
    </div>
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