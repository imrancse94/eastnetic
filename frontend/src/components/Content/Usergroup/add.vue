<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <ContentPageHeader header="Usergroup Management" />
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!--card-header-->
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h3 class="card-title">Usergroup Add</h3>
            </div>
            <div class="col text-right">
              <LinkButton
                route="usergroup-index"
                classname="btn btn-sm btn-primary"
                name="Usergroup List"
              />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" @submit.prevent="addPage">
            <div class="row">
              <div class="col-md">
                <InputText
                  title="Name"
                  wrapperclass='form-group'
                  classname='form-control'
                  :errors="errors.name"
                  v-model="usergroupData.name"
                />
                <div class="form-group">
                  <MultiselectComponent
                    label="User List"
                    title="Please select"
                    placeholder="Search users..."
                    :errors="errors.user_id"
                    :data="userList"
                    v-model="usergroupData.user_id"
                  />
                </div>
                
                <div class="form-group">
                  <LinkButton
                    route="usergroup-index"
                    classname="btn btn-sm btn-primary mr-2"
                    name="Back"
                  />
                  <button type="submit" class="btn btn-sm btn-success">
                    Save
                  </button>
                </div>
              </div>
              <div class="col-md"></div>
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
  name: "UserggroupAdd",
  data() {
    return {
      usergroupData:{user_id:[]},
      errors:{},
      userList:[]
    };
  },
  mounted() {
    this.getAllUsers().then((data)=>{
      Object.values(data).map((d)=>{
        console.log(d);
        this.userList.push({id:d.id,name:d.name+" ("+d.email+")"});
      })
    })
  },
  methods: {
    ...mapActions("Usergroup", ["userGroupAdd"]),
    ...mapActions("User",['getAllUsers']),
    addPage() {
      
      //return false;
      this.userGroupAdd(this.usergroupData)
        .then(response => {
          console.log('dddd',response)
          if (
            response.success &&
            response.statuscode == GLOBAL_CONSTANT["USERGROUP_INSERT_SUCCESS"]
          ) {
            this.errors = {};
            this.$toastr.s(response.message,"Success");
            this.$router.push({name:'usergroup-index'});
          } else {
            this.errors = response.data;
          }
        })
        .catch(() => {});
    },
  },
};
</script>
