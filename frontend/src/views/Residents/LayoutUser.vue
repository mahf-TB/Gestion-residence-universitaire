<template>
  <div>
    <div>
    <Header />
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