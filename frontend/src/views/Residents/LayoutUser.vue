<template>
  <div class="bg-white h-full">
    <Header class="sticky top-0 z-10"></Header>
    <div class="container mt-3 overflow-auto">
      <router-view class="font-Avenir" />
    </div>
  </div>
</template>

<script>
import Header from '../../components/ResidentComponents/Header.vue'
export default {
  name: 'LayoutUser',
  components: {
    Header
  },
}
</script>