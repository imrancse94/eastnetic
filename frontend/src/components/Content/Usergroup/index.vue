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
              <h3 class="card-title">Usergroup List</h3>
            </div>
            <div class="col text-right">
              <LinkButton
                route="usergroup-add"
                classname="btn btn-sm btn-primary"
                name="Usergroup Add"
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
              <tr v-for="(m, index) in usergroupData.data" :key="index">
                <td class="text-center">{{ m.id }}</td>
                <td class="text-center">{{ m.name }}</td>
                <td class="text-center">{{ setDateFormat(m.created_at) }}</td>
                <td class="text-center">{{ setDateFormat(m.updated_at) }}</td>
                <td class="text-center">
                  <ActionButton
                    route="usergroup-edit"
                    :id="m.id"
                    @action="deleteUsergroup"
                  />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <pagination :data="usergroupData" @paginateTo="usergroupMethod" />
      </div>
    </section>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Helper from "./../../../Helper/moment";

export default {
  mixins: [Helper],
  name: "UserGrpupList",
  data() {
    return {
      usergroupData: [],
    };
  },
  
  mounted() {
    this.getUserGroups(this.$router.currentRoute.query).then((data) => {
      this.usergroupData = data;
      console.log("usergroupData", this.usergroupData);
    });
  },
  methods: {
    ...mapActions("Usergroup", ["getUserGroups", "deleteUsergroupById"]),
    usergroupMethod() {
      this.getUserGroups(this.$router.currentRoute.query).then((data) => {
        this.usergroupData = data;
        console.log("usergroupMethod", this.usergroupData);
      });
    },
    deleteUsergroup(id) {
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
          this.deleteUsergroupById(id).then((response) => {
          this.$toastr.s(response.message, "success");
          this.usergroupMethod();
          });
        }
      });
    },
  },
};
</script>
