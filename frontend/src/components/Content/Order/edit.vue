<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <ContentPageHeader header='Module Management'/>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!--card-header-->
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h3 class="card-title">Module Edit</h3>
            </div>
            <div class="col text-right">
              <LinkButton route='module-index' classname='btn btn-sm btn-primary' name='Module List' />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
           <form role="form" @submit.prevent="editModule">
            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Module ID</label>
                    <input :disabled="true" type="text" :class="errors.id ? 'is-invalid':''" v-model="moduleGetData.id" class="form-control" placeholder="Module ID" />
                    <ErrorValidation :msg="errors.id" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Module Name</label>
                    <input type="text" :class="errors.name ? 'is-invalid':''" v-model="moduleGetData.name" class="form-control" placeholder="Module Name" />
                    <ErrorValidation :msg="errors.name" />
                  </div>
                  <div class="form-group">
                    <router-link
                      :to="{name:'module-index'}"
                      class="btn btn-sm btn-primary mr-2"
                    >Back</router-link>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Module Icon</label>
                    <input type="text" :class="errors.icon ? 'is-invalid':''" v-model="moduleGetData.icon" class="form-control" placeholder="Module Icon" />
                    <ErrorValidation :msg="errors.icon" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Sequence</label>
                    <input type="text" :class="errors.sequence ? 'is-invalid':''" v-model="moduleGetData.sequence" class="form-control" placeholder="Sequence" />
                    <ErrorValidation :msg="errors.sequence" />
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Helper from "./../../../Helper/moment";
import GLOBAL_CONSTANT from "./../../../constant";

export default {
  mixins: [Helper],
  name: "ModuleEdit",
  data() {
    return {
      errors:{}
    };
  },
  computed: {
     ...mapState("module", ["moduleGetData"]),
  },
  mounted() {
    var module_id = this.$router.currentRoute.params.id;
    this.getModuleById(module_id);
  },
  methods: {

    ...mapActions("module", ["getModuleById","moduleEdit"]),
    
    editModule(){
      
      this.moduleEdit(this.moduleGetData).then(response =>{
        
        if(response.success && response.statuscode == GLOBAL_CONSTANT['MODULE_UPDATED_SUCCESS']){
             this.errors = {}; 
             this.$toastr.s(response.message,'Success');

          }else{
            this.$toastr.e(response.message,'Error');
            this.errors = response.data;

          }
      }).catch(() =>{});
    }
  },
};
</script>

