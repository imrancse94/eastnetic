<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <ContentPageHeader header="Product List" />
    <div
      class="flex flex-row flex-wrap flex-grow mt-2 w-full md:w-full xl:w-full"
    >
      <div class="w-full md:w-full xl:w-full p-6">
        <div class="flex flex-wrap">
          <div class="w-full sm:w-1/3 md:w-1/3 lg:w-1/3 xl:w-1/3 pt-2 text-gray-600 mb-5 sm:text-left md:text-left lg:text-left text-center">
          <router-link :to="{name:'product.add'}" class="w-full block sm:w-1/2 md:w-full lg:w-1/2 xl:w-1/2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
          Add Product
        </router-link>
        </div>
        <div class="md:p-2 w-full sm:w-1/3 md:w-1/3 lg:w-1/3 xl:w-1/3 pt-2 text-gray-600 mb-5 sm:text-left md:text-left lg:text-left text-center">
                <div class="relative">
                  <select @change="priceSort" v-model="price_sort" class="block appearance-none w-full bg-white bg-clip-padding border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="">Sort</option>
                    <option value="asc">Lowest Price</option>
                    <option value="desc">Highest Price</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
        </div>
          <div class="w-full sm:w-1/3 md:w-1/3 lg:w-1/3 xl:w-1/3 pt-2 relative text-gray-600 mb-5 sm:text-right md:text-right lg:text-right text-center">
            <input
            v-model="search.name"
            autocomplete="off"
            class="
              w-full
              sm:w-1/2 md:w-full lg:w-1/2 xl:w-1/2
              border-2 border-gray-300
              bg-white
              h-10
              px-5
              pr-16
              rounded-lg
              text-sm
              focus:outline-none
            "
            type="search"
            name="search"
            placeholder="Search"
          />
          <button @click.prevent="searchByname" type="submit" class="absolute right-0 top-0 mt-5 mr-4">
            <svg
              class="text-gray-600 h-4 w-4 fill-current"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              id="Capa_1"
              x="0px"
              y="0px"
              viewBox="0 0 56.966 56.966"
              style="enable-background: new 0 0 56.966 56.966"
              xml:space="preserve"
              width="512px"
              height="512px"
            >
              <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
              ></path>
            </svg>
          </button>
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
                Id
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
                Name
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
                Image
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
                Stock
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
              v-for="(product, index) in productData.data" :key="index"
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
                  >ID</span
                >
                 {{ product.id }}
              </td>
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
                  >Name</span
                >
                 {{ product.name }}
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
                  >Image</span
                >
                <img class="object-contain h-20 w-20 inline-block" :src="product.image ? product.image:$global_contsant.NO_IMAGE_PATH" alt="">
                 
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
                  >Stock</span
                >
                {{product.qty}}
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
                {{ product.unit_price }}
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
                <router-link :to="{name:'product.edit',params: { id: product.id }}" class="text-blue-400 hover:text-blue-600 underline"
                  >Edit</router-link>
                <a
                  @click.prevent="deleteProduct(product.id)"
                  href="#"
                  class="text-blue-400 hover:text-blue-600 underline pl-6"
                  >Remove</a
                >
              </td>
            </tr>
          </tbody>
        </table>
          <pagination :data="productData" @paginateTo="getPaginateproducts"/>
        </div>

        <!--/table Card-->
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import pagination from "../../pagination.vue";
import Helper from "./../../../Helper/moment";

export default {
  components: { pagination },
  mixins: [Helper],
  name: "ProductList",
  data() {
    return {
      productData: [],
      search:{
        name:''
      },
      price_sort:''
    };
  },
  computed: {},
  mounted() {
    this.productData = [];
    this.getProducts(this.$router.currentRoute.query).then((data) => {
      this.productData = data;
    });
  },
  methods: {
    ...mapActions("product", ["getProducts","productDelete"]),

    getPaginateproducts() {
      this.productData = [];
      this.getProducts(this.$router.currentRoute.query).then((data) => {
        this.productData = data;
      });
    },
    searchByname(){
      var queryparams = Object.assign({}, this.$router.currentRoute.query, {
        name: this.search.name,
      });

      this.$router
        .replace({
          path: this.$router.currentRoute.path,
          query: queryparams,
        })
        .catch(() => {});
        this.getPaginateproducts();
    },
    priceSort(){
      var queryparams = Object.assign({}, this.$router.currentRoute.query, {
        price_sort: this.price_sort,
      });

      this.$router
        .replace({
          path: this.$router.currentRoute.path,
          query: queryparams,
        })
        .catch(() => {});
        this.getPaginateproducts();
    },
    deleteProduct(id) {
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
          this.productDelete(id).then((data) => {
            console.log('data',data)
            var status = 'success';
            var type = 'Deleted!';
            if(data.statuscode < 0){
              status = 'warning';
               type = 'Failed';
            }
            this.$swal(type, data.message, status);
            this.getPaginateproducts();
          });
        }
      });
    },
  },
};
</script>
