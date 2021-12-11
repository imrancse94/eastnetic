<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <ContentPageHeader header="Role Management" />

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!--card-header-->
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h3 class="card-title">Role Edit</h3>
            </div>
            <div class="col text-right">
              <LinkButton
                route="role-index"
                classname="btn btn-sm btn-primary"
                name="Role List"
              />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" @submit.prevent="editRole">
            <div class="row">
              <div class="col-6">
                <InputText
                    title="Name"
                    wrapperclass='form-group'
                    classname='form-control'
                    :errors="errors.title"
                    v-model="roleData.title"
                />

                <div class="form-group">
                  <LinkButton
                    route="role-index"
                    classname="btn btn-sm btn-primary mr-2"
                    name="Back"
                  />
                  <button type="submit" class="btn btn-sm btn-success">
                    Save
                  </button>
                </div>
              </div>
              <div class="col-6">
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import {mapActions } from "vuex";
import Helper from "./../../../Helper/moment";
import GLOBAL_CONSTANT from "./../../../constant";

export default {
  mixins: [Helper],
  name: "roleEdit",
  data() {
    return {
      errors: {},
      roleData: {},
    };
  },
  
  mounted() {
    this.getRoleById(this.$router.currentRoute.params).then((data) => {
      this.roleData = data.data;
    });
  },
  methods: {
    ...mapActions("Role", ["getRoleById", "roleEdit"]),

    editRole() {
      this.roleEdit(this.roleData)
        .then((response) => {
          if (
            response.success &&
            response.statuscode == GLOBAL_CONSTANT["ROLE_UPDATED_SUCCESS"]
          ) {
            this.errors = {};
            this.$router.push({name:"role-index"});
            this.$toastr.s(response.message, "Success");
          } else {
            this.errors = response.data;
            this.$toastr.e(response.message, "Failed");
          }
        })
        .catch(() => {});
    },
  },
};
</script>
