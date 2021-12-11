<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            This is Dashboard
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "dashboard",
  mounted(){
  },
  created(){
    if(this.$store.state.isNotPermitted){
       this.$toast.e('You don\'t have permission on this page.')
     }
  }
};
</script>
