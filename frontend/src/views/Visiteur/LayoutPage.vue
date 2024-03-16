<template>
  <div class="bg-white h-full">
   <Header></Header>
    <div class="pt-14">
      <router-view class="font-Avenir" />
    </div>
  </div>
</template>

<script>
import Header from '../../components/ResidentComponents/Header.vue'
export default {
  name: 'LayoutPage',
  components: {
    Header
  },
}
</script>