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
              <h3 class="card-title">Role List</h3>
            </div>
            <div class="col text-right">
              <LinkButton
                route="role-add"
                classname="btn btn-sm btn-primary"
                name="Role Add"
              />
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px">ID</th>
                <th class="text-center">Role Name</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Updated At</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(m, index) in roleData.data" :key="index">
                <td class="text-center">{{ m.id }}</td>
                <td class="text-center">{{ m.title }}</td>
                <td class="text-center">{{ setDateFormat(m.created_at) }}</td>
                <td class="text-center">{{ setDateFormat(m.updated_at) }}</td>
                <td class="text-center">
                  <ActionButton
                    route="role-edit"
                    :id="m.id"
                    @action="deleteRole"
                  />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <pagination :data="roleData" @paginateTo="roleMethod" />
      </div>
    </section>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Helper from "./../../../Helper/moment";

export default {
  mixins: [Helper],
  name: "RoleList",
  data() {
    return {
      moduleData: [],
      submoduleData: [],
      roleData: [],
    };
  },

  mounted() {
    this.getRoles(this.$router.currentRoute.query).then((data) => {
      this.roleData = data.data;
      console.log("roleData", this.roleData);
    });
  },
  methods: {
    ...mapActions("Role", ["getRoles", "roleDelete"]),

    roleMethod() {
      this.getRoles(this.$router.currentRoute.query).then((data) => {
        
        this.roleData = data.data;
        this.submoduleData = data.submodules;
        this.moduleData = data.modules;
      });
    },
    deleteRole(id) {
      console.log(id);
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          this.roleDelete(id).then((response) => {
            this.$toastr.s(response.message, "success");
            this.roleMethod();
          });
        }
      });
    },
  },
};
</script>
