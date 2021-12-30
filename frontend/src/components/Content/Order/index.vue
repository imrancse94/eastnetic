<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <ContentPageHeader header="Order List" />
    <div
      class="flex flex-row flex-wrap flex-grow mt-2 w-full md:w-full xl:w-full"
    >
      <div class="w-full md:w-full xl:w-full p-6">
        <div class="flex flex-wrap">
          <div
            class="
              w-full
              sm:w-1/2
              md:w-1/2
              lg:w-1/2
              xl:w-1/2
              pt-2
              text-gray-600
              mb-5
              sm:text-left
              md:text-left
              lg:text-left
              text-center
            "
          >
            <router-link
              v-if="this.$store.getters['auth/getPermissions'].includes('order.add')"
              :to="{ name: 'order.add' }"
              class="
                w-full
                block
                sm:w-1/4
                md:w-1/2
                lg:w-1/4
                xl:w-1/4
                bg-blue-500
                hover:bg-blue-700
                text-white
                font-bold
                py-2
                px-4
                rounded
                text-center
              "
            >
              Add Order
            </router-link>
          </div>
          <div
            class="
              w-full
              sm:w-1/2
              md:w-1/2
              lg:w-1/2
              xl:w-1/2
              pt-2
              relative
              text-gray-600
              mb-5
              sm:text-right
              md:text-right
              lg:text-right
              text-center
            "
          >
            
          </div>
        </div>

        <!--Table Card-->
        <div
          class="
            bg-white
            border-transparent
            rounded-lg
            shadow-xl
            w-full
            md:w-full
            xl:w-full
          "
        >
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
                  Order Id
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
                  Unit Price
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
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(order, index) in orderData.data"
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
                    >Order ID</span
                  >
                  {{ order.unique_order_id }}
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
                    >Order Status</span
                  >
                  <span
                    class="rounded bg-green-400 py-1 px-3 text-xs font-bold"
                    >{{ order.order_status }}</span
                  >
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
                  {{ order.qty }}
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
                    >Unit Price</span
                  >
                  {{ order.unit_price }}
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
                    >Actions</span
                  >
                  <router-link
                    :to="{ name: 'order.edit', params: { id: order.id } }"
                    class="text-blue-400 hover:text-blue-600 underline"
                    >Edit</router-link
                  >
                  <a
                    href="#"
                    class="text-blue-400 hover:text-blue-600 underline pl-6"
                    >Remove</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
          <pagination :data="orderData" @paginateTo="getOrderData" />
        </div>
      </div>
    </div>
    <OrderEditModal v-if="$store.getters['modal/isModalOpen']" />
  </div>
</template>

<script>
import { mapActions } from "vuex";
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
  computed: {},
  mounted() {
    this.getOrderData();
  },
  methods: {
    ...mapActions("order", ["getOrders"]),

    editModalOpen(order) {
      this.$store.dispatch("modal/openModal", order);
    },
    getOrderData() {
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
