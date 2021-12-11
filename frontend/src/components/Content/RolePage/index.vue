<template>
  <div class="content-wrapper">
    <ContentPageHeader header="Role Page Association" />
    <form @submit.prevent="roleAssign" method="post">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Role name</label>
                  <select
                    @change.prevent="getPageInfoData(role_id)"
                    class="form-control"
                    v-model="role_id"
                  >
                    <option value="0">Please select</option>
                    <option
                      v-for="(role, id) in roleList"
                      :key="id"
                      :value="id"
                      >{{ role }}</option
                    >
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body" v-if="Object.keys(rolePageData).length > 0">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10px">ID</th>
                      <th class="text-center">Module</th>
                      <th class="text-center">Submodule</th>
                      <th class="text-center">Pages</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(m, index) in rolePageData" :key="index">
                      <td class="text-center">{{ m.id }}</td>
                      <td class="text-left">{{ m.name }}</td>
                      <td class="text-left" colspan="3">
                        <table class="table">
                          <tr v-for="subm in m.submenu" :key="subm.id">
                            <td>{{ subm.name }}</td>
                            <td>
                              <table class="table table-hover">
                                <tr
                                  v-for="ssubm in subm.submenu"
                                  :key="ssubm.id"
                                >
                                  <td>{{ ssubm.name }}</td>
                                  <td class="text-center">
                                    <div class="tools action-btns">
                                      <input
                                        v-model="page_ids"
                                        type="checkbox"
                                        :value="ssubm.id"
                                      />
                                    </div>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-11"></div>
              <div class="col-md-1 text-right">
                <SubmitButton label="Save" classname="btn btn-success" />
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Helper from "./../../../Helper/moment";

export default {
  mixins: [Helper],
  name: "RolePageAssoc",
  data() {
    return {
      rolePageData: [],
      roleList: [],
      role_selected_ids: [],
      role_id: 0,
      page_ids: [],
    };
  },
  computed: {
    ...mapState("RolePage", ["rolelist", "rolepageinfo"]),
  },
  mounted() {
    this.getRolePage().then(({ data }) => {
      this.roleList = data.roleList;
    });
  },
  methods: {
    ...mapActions("RolePage", ["getRolePage", "getRolePageInfoByRoleId"]),

    getPageInfoData(role_id) {
      this.rolePageData = [];
      if (role_id > 0) {
        this.getRolePageInfoByRoleId(role_id).then(({ data }) => {
          this.rolePageData = data.all_data;
          this.page_ids = data.selected_ids;
          //console.log("getRolePageInfoByRoleId", this.rolePageData);
        });
      }
    },
    roleAssign() {
      console.log(this.page_ids, this.role_id);
    },

    isSelected(id, selected_ids) {
      //return true;
      var exists = selected_ids.some(function(field) {
        return field === id;
      });

      return exists ? this.page_ids.push(id) : "";
    },
  },
};
</script>
