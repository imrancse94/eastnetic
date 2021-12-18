<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <ContentPageHeader header="Order List" />
    <div class="flex flex-row flex-wrap flex-grow mt-2">
      <div class="w-full md:w-full xl:w-full p-6">
        <!--Table Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
          <table class="min-w-full leading-normal">
            <thead>
              <tr>
                <th class="bg-gradient-to-b from-gray-300 to-gray-100 px-5 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">
                  Order Id
                </th>
                <th class="bg-gradient-to-b from-gray-300 to-gray-100 px-5 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">
                  Order Status
                </th>
                <th class="bg-gradient-to-b from-gray-300 to-gray-100 px-5 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">
                  Quantity
                </th>
                <th class="bg-gradient-to-b from-gray-300 to-gray-100 px-5 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">
                  Unit Price
                </th>
                <th class="bg-gradient-to-b from-gray-300 to-gray-100 px-5 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(order,index) in orderData.data" :key="index">
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                  <p class="text-gray-900 whitespace-no-wrap">{{order.unique_order_id}}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                  <p class="text-gray-900 whitespace-no-wrap">{{order.order_status}}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                  <p class="text-gray-900 whitespace-no-wrap">{{order.qty}}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                  <p class="text-gray-900 whitespace-no-wrap">{{order.unit_price}}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                  <span
                    class="
                      relative
                      inline-block
                      px-3
                      py-1
                      font-semibold
                      text-green-900
                      leading-tight
                    "
                  >
                    <span
                      aria-hidden
                      class="
                        absolute
                        inset-0
                        bg-green-200
                        opacity-50
                        rounded-full
                      "
                    ></span>
                    <span class="relative">Activo</span>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- <pagination :data="" @paginateTo=""/> -->
        </div>

        <!--/table Card-->
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions } from "vuex";
import pagination from "../../pagination.vue";
import Helper from "./../../../Helper/moment";

export default {
  components: { pagination },
  mixins: [Helper],
  name: "OrderList",
  data() {
    return {
      orderData: [],
    };
  },
  computed: {
    
  },
  mounted() {
    this.orderData = [];
    this.getOrders(this.$router.currentRoute.query).then((data) => {
      this.orderData = data;
    });

    //console.log('this.orderData',this.orderData)
  },
  methods: {
    ...mapActions("order", ["getOrders"]),

    moduleMethod() {
      this.orderData = [];
      this.getOrders(this.$router.currentRoute.query).then((data) => {
        this.orderData = data;
      });
    },

    deleteModule(id) {
      console.log(id);
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          this.moduleDelete(id).then(() => {
            this.$swal("Deleted!", "Module has been deleted.", "success");
            this.moduleMethod();
          });
        }
      });
    },
  },
};
</script>

