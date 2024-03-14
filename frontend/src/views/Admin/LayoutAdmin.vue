<template>
  <div>
    <Header />
    <router-view class="font-Avenir"/>
  </div>
  </template>
  
  <script>
  import Header from '../../components/AdminComponents/Header.vue'
  export default{
    name:'LayoutAdmin',
    components:{
      Header
    },
  }
  </script>