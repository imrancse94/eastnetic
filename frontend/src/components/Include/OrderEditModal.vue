<template>
  <div
    class="
      min-w-screen
      h-screen
      animated
      fadeIn
      faster
      fixed
      left-0
      top-0
      flex
      justify-center
      items-center
      inset-0
      z-50
      outline-none
      focus:outline-none
      bg-no-repeat bg-center bg-cover
    "
    id="modal-id"
  >
    <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div
      class="
        w-full
        md:max-w-lg
        p-5
        relative
        mx-auto
        my-auto
        rounded-xl
        shadow-lg
        bg-white
      "
    >
      <div class="">
        <!--body-->
        <div class="text-center p-5 m-5 md:m-0 flex-auto justify-center">
          <label class="text-gray-700 text-lg">Order</label>
          <div class="w-full">
            <form method="post" action="" class="bg-white px-8 pt-6 pb-8 mb-4">
              <div class="mb-4">
                <label
                  class="block text-left text-gray-700 text-sm font-bold mb-2"
                  for="username"
                >
                  Unit Price
                </label>
                <input
                  disabled
                  v-model="product.unit_price"
                  class="
                    shadow
                    appearance-none
                    border
                    rounded
                    w-full
                    py-2
                    px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                  id="username"
                  type="text"
                  placeholder="Username"
                />
              </div>
              <div class="mb-4">
                <label
                  class="block text-left text-gray-700 text-sm font-bold mb-2"
                  for="username"
                >
                  Quantity
                </label>
                <input
                  v-model="product.qty"
                  disabled
                  class="
                    shadow
                    appearance-none
                    border
                    rounded
                    w-full
                    py-2
                    px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                  id="username"
                  type="text"
                  placeholder="Username"
                />
              </div>
              <div class="mb-4">
                <label
                  class="block text-left text-gray-700 text-sm font-bold mb-2"
                  for="username"
                >
                  Quantity
                </label>
                <input
                  autocomplete="off"
                  v-model="request.qty"
                  class="
                    shadow
                    appearance-none
                    border
                    rounded
                    w-full
                    py-2
                    px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                  :class="errors.qty ? 'border-red-500':''"
                  id="username"
                  type="text"
                  placeholder="Username"
                />
                <p v-if="errors.qty" class="text-red-500 text-xs italic text-left">{{errors.qty}}</p>
              </div>
              <div class="mb-4">
                <label
                  class="block text-left text-gray-700 text-sm font-bold mb-2"
                  for="username"
                >
                  Total
                </label>
                <input
                  v-model="getTotal"
                  disabled
                  class="
                    shadow
                    appearance-none
                    border
                    rounded
                    w-full
                    py-2
                    px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                  id="username"
                  type="text"
                  placeholder="Username"
                />
              </div>
            </form>
          </div>
        </div>
        <!--footer-->
        <div class="p-3 mt-2 text-center space-x-4 md:block">
          <button
            @click.prevent="onClose"
            class="
              mb-2
              md:mb-0
              bg-white
              px-5
              py-2
              text-sm
              shadow-sm
              font-medium
              tracking-wider
              border
              text-gray-600
              rounded-full
              hover:shadow-lg hover:bg-gray-100
            "
          >
            Cancel
          </button>
          <button
          @click.prevent="confirm"
            class="
              mb-2
              md:mb-0
              bg-red-500
              border border-red-500
              px-5
              py-2
              text-sm
              shadow-sm
              font-medium
              tracking-wider
              text-white
              rounded-full
              hover:shadow-lg hover:bg-red-600
            "
          >
            Confirm
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "OrderEditModal",
  data(){
    return{
       product:{},
       request:{
         qty:1,
         product_id:0,
       },
       total:0,
       errors:{
         qty:''
       }
    }
  },
  computed:{
    getTotal:function(){
      this.errors.qty = "";
      if(this.request.qty > this.product.qty){
        this.errors.qty = "Out of stock";
        //this.request.qty = 1;
        return this.total;
      }
     return this.totalPrice()
    }
  },
  mounted() {
    this.product = this.$store.getters["modal/getData"];
    this.totalPrice()
  },
  created() {
    //document.addEventListener("keyup", this.onClose);
  },
  destroyed() {
    //document.removeEventListener("keyup", this.onClose);
  },
  methods: {
    ...mapActions("order", ["orderAdd"]),
   
    totalPrice(){
      return this.total = this.request.qty * this.product.unit_price;
    },
    onClose(event) {
      // Escape key
      if (event.keyCode === 27) {
        //this.handleClose();
      }

      this.$store.dispatch("modal/closeModal");
    },
    confirm(){
      this.errors.qty = "";

      if(!this.request.qty){
        this.errors.qty = "You cannot give empty";
        return false;
      }

      if(this.request.qty == 0){
        this.errors.qty = "Zero is not allowed";
        return false;
      }

      if(this.request.qty > this.product.qty){
        this.errors.qty = "Out of stock";
        //this.request.qty = 1;
        return false;
      }
      
      this.$swal({
        title: "Are you sure?",
        text: "For order click confirm.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm",
      }).then((result) => {
        if (result.value) {
            this.request.product_id = this.product.id;
            this.request.qty = parseInt(this.request.qty);
            console.log(this.request);
            this.orderAdd(this.request).then(data=>{
              console.log(data);
                this.$store.dispatch("modal/closeModal");
                this.$swal({
                  title: "Success",
                  text: data.message,
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "Ok",
                })
            })
        }
      })

      
    }
  },
};
</script>