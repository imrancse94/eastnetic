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
              <h3 class="card-title">Module Add</h3>
            </div>
            <div class="col text-right">
              <LinkButton route='module-index' classname='btn btn-sm btn-primary' name='Module List' />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
           <form role="form" @submit.prevent="addModule">
            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Module Name</label>
                    <input type="text" :class="errors.name ? 'is-invalid':''" v-model="module.name" class="form-control" placeholder="Module Name" />
                    <ErrorValidation :msg="errors.name" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sequence</label>
                    <input type="text" :class="errors.sequence ? 'is-invalid':''" v-model="module.sequence" class="form-control" placeholder="Sequence" />
                    <ErrorValidation :msg="errors.sequence" />
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Module Icon</label>
                    <input type="text" :class="errors.icon ? 'is-invalid':''" v-model="module.icon" class="form-control" placeholder="Module Icon" />
                    <ErrorValidation :msg="errors.icon" />
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                    <LinkButton route='module-index'  classname='btn btn-sm btn-primary mr-2' name='Back' />
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
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
import { mapActions } from "vuex";
import Helper from "./../../../Helper/moment";
import GLOBAL_CONSTANT from "./../../../constant";

export default {
  mixins: [Helper],
  name: "ModuleAdd",
  data() {
    return {
      module: {
        id:'',
        name:'',
        icon:'',
        sequence:'',
      },
      errors:{}
    };
  },
  computed: {
    
  },
  methods: {

    ...mapActions("module", ["moduleAdd"]),
    
    addModule(){
      this.moduleAdd(this.module).then(response =>{
        if(response.success && response.statuscode == GLOBAL_CONSTANT['MODULE_INSERT_SUCCESS']){
             this.errors = {}; 
             this.$toast.success({
                        title:'Saved',
                        message:'Module Saved successfully.'
                      });
             this.$router.push({name:"module-index"});
          }else{
            
            this.errors = response.data;

          }
      }).catch(() =>{});
    }
  },
};
</script>

