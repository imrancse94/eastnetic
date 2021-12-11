<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <ContentPageHeader header="User Management" />
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!--card-header-->
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h3 class="card-title">User Add</h3>
            </div>
            <div class="col text-right">
              <LinkButton
                route="user-index"
                classname="btn btn-sm btn-primary"
                name="User List"
              />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" @submit.prevent="addUser">
            <div class="row">
              <div class="col-6">
                <InputText
                  title="Name"
                  wrapperclass='form-group'
                  classname='form-control'
                  :errors="errors.name"
                  v-model="userData.name"
                />

                <InputEmail
                  title="Email"
                  wrapperclass='form-group'
                  classname='form-control'
                  :errors="errors.email"
                  v-model="userData.email"
                />

                

                <div class="form-group">
                  <LinkButton
                    route="page-index"
                    classname="btn btn-sm btn-primary mr-2"
                    name="Back"
                  />
                  <button type="submit" class="btn btn-sm btn-success">
                    Save
                  </button>
                </div>
              </div>
              <div class="col-6">
                <InputPassword
                  title="Password"
                  wrapperclass='form-group'
                  classname='form-control'
                  :errors="errors.password"
                  v-model="userData.password"
                />

                <InputPassword
                  title="Confirm Password"
                  wrapperclass='form-group'
                  classname='form-control'
                  :errors="errors.c_password"
                  v-model="userData.c_password"
                />
                
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
  name: "UserAdd",
  data() {
    return {
      userData:{},
      errors: {},
    };
  },
  
  methods: {
    ...mapActions("User", ["userAdd"]),

    addUser() {
      this.userAdd(this.userData)
        .then((response) => {
          if (
            response.success &&
            response.statuscode == GLOBAL_CONSTANT["USER_INSERT_SUCCESS"]
          ) {
            this.errors = {};
            this.$router.push({name:"user-index"});
            this.$toastr.s(response.message, "Success");
            
          } else {
            this.errors = response.data;
          }
        })
        .catch(() => {});
    },
  },
};
</script>
