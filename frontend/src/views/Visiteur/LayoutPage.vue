<template>
  <div class="bg-white h-full">
    <haut-header></haut-header>
   <Header class="sticky top-0 z-50"></Header>
    <div class="">
      <router-view class="font-Avenir" />
    </div>
      <FooterVue></FooterVue>
  </div>
</template>

<script>
import FooterVue from '@/components/VisiteurComponents/Footer.vue'
import Header from '@/components/VisiteurComponents/Header.vue'
import HautHeader from '../../components/HautHeader.vue'
export default {
  name: 'LayoutPage',
  components: {
    Header, FooterVue,
    HautHeader
  },
}
</script>