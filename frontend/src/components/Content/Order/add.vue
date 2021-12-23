<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <ContentPageHeader header="Order Add" />
    <div class="flex flex-row flex-wrap flex-grow mt-2 w-full md:w-full xl:w-full">
      <div v-for="i in [1,2,3,5,6,7]" :key="i" class="w-full md:w-1/3 p-6">
          <div class="w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
          </div>
      </div>
      
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Helper from "./../../../Helper/moment";
import GLOBAL_CONSTANT from "./../../../constant";

export default {
  mixins: [Helper],
  name: "ModuleAdd",
  data() {
    return {
      module: {
        id:'',
        name:'',
        icon:'',
        sequence:'',
      },
      errors:{}
    };
  },
  computed: {
    
  },
  methods: {

    ...mapActions("module", ["moduleAdd"]),
    
    addModule(){
      this.moduleAdd(this.module).then(response =>{
        if(response.success && response.statuscode == GLOBAL_CONSTANT['MODULE_INSERT_SUCCESS']){
             this.errors = {}; 
             this.$toast.success({
                        title:'Saved',
                        message:'Module Saved successfully.'
                      });
             this.$router.push({name:"module-index"});
          }else{
            
            this.errors = response.data;

          }
      }).catch(() =>{});
    }
  },
};
</script>

