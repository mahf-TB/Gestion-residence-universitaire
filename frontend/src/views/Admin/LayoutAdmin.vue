<template>
  <div class="bg-white h-full">
    <Header></Header>
    <div class="container pt-14">
      <router-view class="font-Avenir" />
    </div>
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