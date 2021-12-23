<template>
  <div
    class="
      bg-gray-800
      shadow-xl
      h-16
      fixed
      bottom-0
      mt-12
      md:relative md:h-screen
      z-10
      w-full
      md:w-48
    "
  >
    <div
      class="
        md:mt-12 md:w-48 md:fixed md:left-0 md:top-0
        content-center
        md:content-start
        text-left
        justify-between
      "
    >
      <ul
        class="
          list-reset
          flex flex-row
          md:flex-col
          py-0
          md:py-3
          px-1
          md:px-2
          text-center
          md:text-left
        "
      >
        <li class="mr-3 flex-1">
          <router-link
            :to="{name:'dashboard.index'}"
            class="
              block
              py-1
              md:py-3
              pl-1
              align-middle
              text-white
              no-underline
              hover:text-white
              border-b-2 border-gray-800
              hover:border-pink-500
            "
          >
            <i class="fas fa-tasks pr-0 md:pr-3"></i
            ><span
              
              class="
                pb-1
                md:pb-0
                text-xs
                md:text-base
                text-gray-600
                md:text-gray-400
                block
                md:inline-block
              "
              >Dashboard</span
            >
          </router-link>
        </li>
        <li class="mr-3 flex-1">
          <router-link
            :to="{name:'product.index'}"
            class="
              block
              py-1
              md:py-3
              pl-1
              align-middle
              no-underline
              hover:text-white
              border-b-2 border-gray-800
              hover:border-purple-500
            "
          >
            <i class="fa fa-envelope pr-0 md:pr-3"></i
            ><span
              class="
                pb-1
                md:pb-0
                text-xs
                md:text-base
                text-gray-600
                md:text-gray-400
                block
                md:inline-block
              "
              >Product</span
            >
          </router-link>
        </li>
        <li class="mr-3 flex-1">
          <router-link
            :to="{name:'order.index'}"
            class="
              block
              py-1
              md:py-3
              pl-1
              align-middle
              text-gray-600
              md:text-gray-400
              no-underline
              hover:text-white
              border-b-2 border-gray-800
              hover:border-purple-500
            "
          >
            <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i
            ><span
            
              class="
                pb-1
                md:pb-0
                text-xs
                md:text-base
                block
                md:inline-block
              "
              >Orders</span
            >
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      
    }
  },
  computed: {
    change(){
      
    }
  },
  methods: {
   
  },
  mounted() {
     console.log('11111',this.$router);
  },
};
</script>
