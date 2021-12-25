<template>
  <div
    class="
      px-5
      py-5
      bg-white
      border-t
      flex flex-col
      xs:flex-row
      items-center
      xs:justify-between
    "
  >
    <span class="text-xs xs:text-sm text-gray-900">
      Showing {{data.from}} to {{data.to}} of {{data.total}} Entries
    </span>
    <div class="inline-flex mt-2 xs:mt-0">
      <button
        :disabled="!data.prev_page_url"
        @click.prevent="paginateTo(data.current_page - 1)"
        class="
          text-sm
          bg-gray-300
          hover:bg-gray-400
          text-gray-800
          font-semibold
          py-2
          px-4
          rounded-l
        "
      >
        Prev
      </button>
      <button
        v-for="index in data.last_page"
        :key="index"
        @click.prevent="paginateTo(index)"
        class=" text-sm border-l-2 border-r-2 border-gray-400
          hover:bg-gray-400
          text-gray-800
          font-semibold
          py-2
          px-4
        "
        :class="index === data.current_page ? 'bg-gray-400' : 'bg-gray-300'"
      >
       {{ index }}
      </button>
      
      <button
        :disabled="!data.next_page_url"
        @click.prevent="paginateTo(data.current_page + 1)"
        class="
          text-sm
          bg-gray-300
          hover:bg-gray-400
          text-gray-800
          font-semibold
          py-2
          px-4
          rounded-r
        "
      >
        Next
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "VueTablePagination", // vue component name
  props: {
    data: {
      default() {
        return {};
      },
    },
  },
  mounted(){
    
  },
  methods: {
    paginateTo(page) {
      if (this.$router.currentRoute.query.page != page) {
        this.paginateFunction(page);
      }
    },

    paginateFunction(page) {
      var queryparams = Object.assign({}, this.$router.currentRoute.query, {
        page: page,
      });

      this.$router
        .replace({
          path: this.$router.currentRoute.path,
          query: queryparams,
        })
        .catch(() => {});

      this.$emit("paginateTo", page);
    },
  },
};
</script>
