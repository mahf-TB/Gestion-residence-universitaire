<template>
  <div class="bg-white h-full">
    <Header></Header>
    <div class="container mt-3">
    <router-view class="font-Avenir"/>
  </div>
  </div>
</template>

<script>
import Header from '../../components/ResidentComponents/Header.vue'
export default{
  name:'LayoutUser',
  components:{
    Header
  },
}
</script>