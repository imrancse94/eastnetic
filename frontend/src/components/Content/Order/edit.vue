<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <ContentPageHeader header="Order Edit" />
    <div
      class="flex flex-row flex-wrap flex-grow w-full md:w-full xl:w-full"
    >
    <form method="post" @submit.prevent="modifyOrder">
      <div class="flex flex-wrap p-6 pt-0">
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2 divide-x">
        <h3 class="text-center p-3 uppercase text-gray-600 font-bold mb-5 border-b-2">Order Info</h3>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-first-name"
              >
                Unique ID
              </label>
              <input
              disabled="disbaled"
              v-model="order.unique_id"
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  mb-3
                  leading-tight
                  focus:outline-none focus:bg-white
                "
                id="grid-first-name"
                type="text"
                placeholder="Jane"
              />
              
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-state"
              >
                Status
              </label>
              <div class="relative">
                <select
                  disabled
                  v-model="order.order_status"
                  class="
                    block
                    appearance-none
                    w-full
                    bg-gray-200
                    border border-gray-500
                    text-gray-700
                    py-3
                    px-4
                    pr-8
                    rounded
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="grid-state"
                >
                  <option disabled>Pleae select</option>
                  <option :value="index" v-for="(o,index) in order_status_list" :key="index" >{{o}}</option>

                </select>
                <div
                  class="
                    pointer-events-none
                    absolute
                    inset-y-0
                    right-0
                    flex
                    items-center
                    px-2
                    text-gray-700
                  "
                >
                  <svg
                    class="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                    />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-first-name"
              >
                Product Name
              </label>
              <input
              disabled
              v-model="product.name"
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  mb-3
                  leading-tight
                  focus:outline-none focus:bg-white
                "
                id="grid-first-name"
                type="text"
                placeholder="Jane"
              />
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-state"
              >
               Current Unite Price
              </label>
              <input
              disabled
              v-model="product.unit_price"
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  mb-3
                  leading-tight
                  focus:outline-none focus:bg-white
                "
                id="grid-first-name"
                type="text"
                placeholder="Jane"
              />
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/4 px-3">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-password"
              >
                Quantity
              </label>
              <input
                v-model="order.qty"
                :class="errors.qty ? 'border-red-500':''"
                class="
                  appearance-none
                  block
                  w-full
                  bg-white
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  focus:outline-none
                "
                id="grid-last-name"
                type="text"
                placeholder="Quantity"
              />
             <p v-if="errors.qty" class="text-red-500 text-xs italic">{{errors.qty}}</p>
            </div>
            <div class="w-full md:w-1/4 px-3">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-password"
              >
                Stock
              </label>
              <input
                disabled
                v-model="product.qty"
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  focus:outline-none
                "
                id="grid-last-name"
                type="text"
                placeholder="Quantity"
              />
            </div>
            <div class="w-full md:w-1/4 px-3">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-password"
              >
                Sold Unit Price
              </label>
              <input
                v-model="order.unit_price"
                disabled="disabled"
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-gray-500
                "
                id="grid-last-name"
                type="text"
                placeholder="Quantity"
              />
             
            </div>
            <div class="w-full md:w-1/4 px-3">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-password"
              >
                Total Price
              </label>
              <input
                disabled
                v-model="getTotalPrice"
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-500
                  rounded
                  py-3
                  px-4
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-gray-500
                "
                id="grid-last-name"
                type="text"
              />
             
            </div>
          </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2">
        <h3 class="text-center uppercase text-gray-600 font-bold p-3 mb-5 border-b-2">Order Edit History</h3>
        <div class="bg-white border-transparent rounded-lg w-full md:w-full xl:w-full">
        <table class="border-collapse w-full">
          <thead>
            <tr>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Order Status
              </th>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Quantity
              </th>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Edited at
              </th>
             
              
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(oh,index) in orderHistoryData"
              :key="index"
              class="
                bg-white
                lg:hover:bg-gray-100
                flex
                lg:table-row
                flex-row
                lg:flex-row
                flex-wrap
                lg:flex-no-wrap
                mb-10
                lg:mb-0
              "
            >
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800 text-center
                  border border-b
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Order Status</span
                >
                 <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold"
                  >{{oh.order_status}}</span>
                 
              </td>
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800
                  border border-b
                  text-center
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Quantity</span
                >
               
                  {{oh.qty}}
                 
              </td>
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800
                  border border-b
                  text-center
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Created at</span
                >
                {{setDateFormat(oh.created_at)}}
              </td>
            </tr>
            <tr
            v-if="orderHistoryData.length == 0"
            >
            <td colspan="3" class="text-center text-gray-500 text-base">No data found</td>
            </tr>
          </tbody>
        </table>
        </div>
        </div>
        <div class="w-full p-2">
          <div class="flex flex-wrap -mx-3 mb-2 justify-center">
            <!-- <div v-if="!$global_contsant.ignore_edit_list.some(v=>order.order_status)" class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
              <button type="button" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">Order Cancel</button>
            </div> -->
            <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
              <router-link :to="{name:'order.index'}" class="w-full bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center block"> Back</router-link>
            </div>
            <div v-if="!$global_contsant.ignore_edit_list.some(v=>order.order_status)" class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
              <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">Save</button>
            </div>
          </div>
        </div>
      </div>
    </form>  
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Helper from "./../../../Helper/moment";
export default {
  name: "OrderEdit",
    mixins: [Helper],
  data() {
    return {
      order:{
        unique_id:null,
        qty:0,
        unit_price:null,
        order_status:null,
      },
      product:{},
      total_price:0,
      order_status_list:this.$global_contsant.order_status_list,
      orderHistoryData:{},
      errors: {qty:""},
      request:{}
    };
  },
  computed:{
    
    getTotalPrice:function(){
      this.errors.qty = "";
      if(!this.order.qty){
        this.errors.qty =  "You cannot give empty";
      }

      if(this.order.qty > this.product.qty){
        this.errors.qty =  "Out of Stock";
      }
      this.total_price = this.order.qty * this.order.unit_price;
      return this.total_price;
    }
  },
  mounted(){
    this.getOrderEditData();
  },
  
  methods: {
    ...mapActions("order", ["getorderById","orderEdit"]),
    getOrderEditData(){
      this.orderData = {};
      this.orderHistoryData = {};
      this.getorderById(this.$router.currentRoute.params.id).then((response) => {
        const data = response.data;
        if(response.success){
          this.order.id = data.order.id;
          this.order.unique_id = data.order.unique_order_id
          this.order.qty = data.order.qty
          this.order.unit_price = data.order.unit_price
          this.order.order_status = data.order.order_status
          this.total_price = data.order.qty*data.order.unit_price
          this.product = data.order.product;
          if(data.order_history){
            this.orderHistoryData = data.order_history;
          }
        }
      });
    },
    modifyOrder(){
      if(!this.errors.qty){
        this.$swal({
          title: "Are you sure?",
          text: "For order edit click confirm.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Confirm",
        }).then((result) => {
          if (result.value) {
            this.orderEdit(this.order).then(data=>{
              if(data.statuscode > 0){
                this.getOrderEditData();
                this.$toastr.s(data.message,"success")
              }
            })
          }
        });
      }
    }
  },
};
</script>
