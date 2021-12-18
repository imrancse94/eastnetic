<template>
  <div id="app">
    <Loader v-if="$store.getters['loading/getLoaderStatus']" />
    <router-view></router-view>
  </div>
</template>

<script>
  import { mapState } from "vuex";
  import Loader from "./components/Include/Loader.vue";
  
  export default{

    components: {
    Loader
  },
    mounted(){
     
    },
    computed: {
    ...mapState("module", ["status"]),
    
  },
    methods:{
      
    }
  }
 
</script>

