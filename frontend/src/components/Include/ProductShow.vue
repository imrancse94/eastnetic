<template>
  <div
    class="
      w-full
      bg-white
      rounded-lg
      border border-gray-200
      shadow-md
      dark:bg-gray-800 dark:border-gray-700
    "
  >
    <a href="#">
      <img
        class="object-contain rounded-t-lg w-full"
        :src="product.image ? product.image:$global_contsant.NO_IMAGE_PATH"
        alt="No Image"
      />
    </a>
    <div class="p-5">
      <a href="#">
        <h5
          class="
            mb-2
            text-2xl
            font-bold
            tracking-tight
            text-gray-900
            dark:text-white">
          {{product.name}}
        </h5>
      </a>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        {{product.description}}
      </p>
      <a
        href="#"
        @click.prevent="ordernow(product)"
        class=" content-center
          inline-flex
          items-center
          py-2
          px-3
          text-sm
          font-medium
          text-center text-white
          bg-green-700
          rounded-lg
          hover:bg-green-800
          focus:ring-4 focus:ring-blue-300
          dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
        "
      >
        Order now
        
      </a>
    </div>
    
  </div>
</template>

<script>
export default {
  name: "ProductShow",
  props: {
    product: {
      default() {
        return {};
      },
    },
  },
  methods:{
      ordernow(product){
          this.corefunction(product);
      },
      corefunction(product){
          this.$store.dispatch('modal/openModal',product);
          this.$emit("ordernow", product);
      }
  }
};
</script>
