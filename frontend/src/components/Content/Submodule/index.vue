<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <ContentPageHeader header='SubModule Management'/>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!--card-header-->
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h3 class="card-title">SubModule List</h3>
            </div>
            <div class="col text-right">
              <LinkButton route='submodule-add'  classname='btn btn-sm btn-primary' name='Add SubModule' />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px">ID</th>
                <th class="text-center">Module Name</th>
                <th class="text-center">SubModule Name</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Updated At</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(m,index) in submoduleData.data" :key="index">
                <td class="text-center">{{m.id}}</td>
                <td class="text-center">{{moduleData[m.parent_id]}}</td>
                <td class="text-center">{{m.name}}</td>
                <td class="text-center">{{setDateFormat(m.created_at)}}</td>
                <td class="text-center">{{setDateFormat(m.updated_at)}}</td>
                <td class="text-center">
                  <ActionButton route="submodule-edit" :id="m.id" @action="deleteSubModule"/>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <pagination :data="submoduleData" @paginateTo="subModuleMethod"/>
        
      </div>
    </section>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Helper from "./../../../Helper/moment";

export default {
  mixins: [Helper],
  name: "ModuleList",
  data() {
    return {
      moduleData:[],
      submoduleData: [],
    };
  },
  computed: {
    ...mapState("submodule", ["submodule"]),
  },
  mounted() {
    this.getSubModules(this.$router.currentRoute.query)
        .then((data) =>{
          console.log('submoduleData',data)
          this.submoduleData = data.submodules;
          this.moduleData = data.modules;
          console.log('submoduleData',this.submoduleData)
        });
  },
  methods: {
    ...mapActions("submodule", ["getSubModules","subModuleDelete"]),

    subModuleMethod(){
      this.getSubModules(this.$router.currentRoute.query)
          .then((data) =>{
            this.submoduleData = data.submodules;
            this.moduleData = data.modules;
            console.log('subModuleMethod',this.submoduleData)
          });
    },
    deleteSubModule(id){
      console.log(id);
      this.$swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                this.subModuleDelete(id).then(()=>{
                    this.$swal(
                      'Deleted!',
                      'Module has been deleted.',
                      'success'
                    )
                  this.subModuleMethod();  
                })
                
              }
            });
    }
  },
};
</script>

