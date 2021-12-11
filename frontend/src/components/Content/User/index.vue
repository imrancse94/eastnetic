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
              <h3 class="card-title">User List</h3>
            </div>
            <div class="col text-right">
              <LinkButton
                route="user-add"
                classname="btn btn-sm btn-primary"
                name="User Add"
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
                <th class="text-center">Name</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Updated At</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(m, index) in userlist.data" :key="index">
                <td class="text-center">{{ m.id }}</td>
                <td class="text-center">{{ m.name }}</td>
                <td class="text-center">{{ setDateFormat(m.created_at) }}</td>
                <td class="text-center">{{ setDateFormat(m.updated_at) }}</td>
                <td class="text-center">
                  <ActionButton
                    route="user-edit"
                    :id="m.id"
                    @action="deleteUser"
                  />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <pagination :data="userlist" @paginateTo="UserMethod" />
      </div>
    </section>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Helper from "./../../../Helper/moment";

export default {
  mixins: [Helper],
  name: "UserList",
  data() {
    return {
      userlist: [],
    };
  },
  
  mounted() {
    this.getUserList(this.$router.currentRoute.query).then((data) => {
      this.userlist = data;
      console.log("userlist", data);
    });
  },
  methods: {
    ...mapActions("User", ["getUserList","userDelete"]),

    UserMethod() {
      this.getUserList(this.$router.currentRoute.query).then((data) => {
        this.userlist = data;
        console.log("UserMethod", this.userlist);
      });
    },
    deleteUser(id) {
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
          this.userDelete(id).then(() => {
            this.$swal("Deleted!", "User has been deleted.", "success");
            this.UserMethod();
          });
        }
      });
    },
  },
};
</script>
