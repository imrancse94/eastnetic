<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <ContentPageHeader header="Add Product" />
    <form method="post" @submit.prevent="addNewProduct" action="">
      <div class="flex flex-row flex-wrap flex-grow mt-2 w-full md:w-full xl:w-full">
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 sm:p-6 p-3">
          <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Product Name
                </label>
                <input v-model="product.name" :class="errors.name ? 'border-red-500':''" class="appearance-none block w-full bg-white bg-clip-padding text-gray-700 border  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Name">
                <p v-if="errors.name" class="text-red-500 text-xs italic">{{errors.name[0]}}</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Status
                </label>
                <div class="relative">
                  <select v-model="product.status" class="block appearance-none w-full bg-white bg-clip-padding border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
                <p v-if="errors.status" class="text-red-500 text-xs italic">{{errors.status[0]}}</p>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Stock
                </label>
                <input v-model="product.qty" :class="errors.qty ? 'border-red-500':''" class="appearance-none block w-full bg-white bg-clip-padding text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Stock">
                <p v-if="errors.qty" class="text-red-500 text-xs italic">{{errors.qty[0]}}</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Unit Price
                </label>
                <input v-model="product.unit_price" :class="errors.unit_price ? 'border-red-500':''" class="appearance-none block w-full bg-white bg-clip-padding text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Unit Price">
                <p v-if="errors.unit_price" class="text-red-500 text-xs italic">{{errors.unit_price[0]}}</p>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  Description
                </label>
                <textarea
                  v-model="product.description"
                  :class="errors.description ? 'border-red-500':''"
                  class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid 
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  "
                  id="exampleFormControlTextarea13"
                  rows="3"
                  placeholder="Description"
                ></textarea>
                <p v-if="errors.description" class="text-red-500 text-xs italic">{{errors.description[0]}}</p>
              </div>
            </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 sm:p-6 p-3">
          <div class="w-full">
              <div class="rounded-lg overflow-hidden w-66 sm:w-full mx-auto">
                <img class="object-contain h-64 w-full " :src="product.image">
              </div>
          </div>
          <div class="w-full">
            <div class="flex justify-center">
    <div class="mt-3">
      <input 
      :class="errors.name ? 'border-red-500':'border-gray-300'"
      class="form-control
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding
      border border-solid 
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" @change="fileupload" id="formFile">
    <p v-if="errors.image" class="text-red-500 text-xs italic">{{errors.image[0]}}</p>
    </div>
  </div>
          </div>
        </div>

        <div class="w-full p-4">
          <div class="flex flex-wrap -mx-3 mb-2 justify-center">
              <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                  <router-link :to="{name:'product.index'}" class="block text-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" >Back</router-link>
              </div>
              <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                <button class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Save</button>
              </div>
            </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Helper from "./../../../Helper/moment";
import {getBase64} from "./../../../Helper";
import GLOBAL_CONSTANT from "./../../../constant";

export default {
  mixins: [Helper],
  name: "ProductAdd",
  data() {
    return {
      product: {
        status:1,
        name:'',
        unit_price:'',
        qty:'',
        image:'',
      },
      errors:{}
    };
  },
  computed: {
    
  },
  mounted(){
    console.log('this.product',this.$global_contsant.PRODUCT_ADD_SUCCESS)
  },
  methods: {

    ...mapActions("product", ["productAdd"]),
    
    fileupload(e){
      getBase64(e.target.files[0]).then(data=>{
        this.product.image = data;
      })
      
    },
    addNewProduct(){
      
      this.productAdd(this.product).then(response =>{
        console.log('responsewwww',response)
        if(response.success && response.statuscode == this.$global_contsant.PRODUCT_ADD_SUCCESS){
             this.errors = {}; 
             this.$router.push({name:"product.index"});
             this.$toastr.s(response.message,"success")
             
          }else{
            
            this.errors = response.data;

            console.log('this.errors',this.errors)

          }
      }).catch(() =>{});
    }
  },
};
</script>

