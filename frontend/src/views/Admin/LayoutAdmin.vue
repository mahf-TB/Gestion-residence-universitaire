<template>
  <div class="bg-blue-0 h-screen ">
    <Header></Header>
    <div class="container pt-3">
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