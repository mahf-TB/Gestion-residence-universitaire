<template>
  <div class="bg-white h-full">
   <Header class="sticky"></Header>
    <div class="">
      <router-view class="font-Avenir" />
    </div>
      <FooterVue></FooterVue>
  </div>
</template>

<script>
import FooterVue from '@/components/VisiteurComponents/Footer.vue'
import Header from '@/components/VisiteurComponents/Header.vue'
export default {
  name: 'LayoutPage',
  components: {
    Header, FooterVue
  },
}
</script>