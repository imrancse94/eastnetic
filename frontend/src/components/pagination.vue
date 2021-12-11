<template>
  <div class="card-footer clearfix pull-right">
    <VuePagination :data="data" @paginateTo="paginateTo"/>
  </div>
</template>

<script>
import VuePagination from 'vue-laravel-table-pagination';

export default {
  name: "pagination",
  components:{
    VuePagination
  },
  props: {
    data: {},
  },

  methods: {
    paginateTo(page) {
      this.$emit('paginateTo',page)
    }
  },
};
</script>
