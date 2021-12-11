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
              <h3 class="card-title">Usergroup Edit</h3>
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
          <form role="form" @submit.prevent="editPage">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Page ID</label>
                  <input
                    :disabled="true"
                    type="text"
                    :class="errors.id ? 'is-invalid' : ''"
                    v-model="pageData.id"
                    class="form-control"
                    placeholder="Page ID"
                  />
                  <ErrorValidation :msg="errors.id" />
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Page Name</label>
                  <input
                    type="text"
                    :class="errors.name ? 'is-invalid' : ''"
                    v-model="pageData.name"
                    class="form-control"
                    placeholder="Page Name"
                  />
                  <ErrorValidation :msg="errors.name" />
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Page Icon</label>
                  <input
                    type="text"
                    :class="errors.icon ? 'is-invalid' : ''"
                    v-model="pageData.icon"
                    class="form-control"
                    placeholder="Page Icon"
                  />
                  <ErrorValidation :msg="errors.icon" />
                </div>

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
                <div class="form-group">
                  <label for="exampleInputEmail1">Module Name</label>
                  <select
                    type="text"
                    :class="errors.module_id ? 'is-invalid' : ''"
                    v-model="pageData.module_id"
                    class="form-control"
                    placeholder="Module Name"
                  >
                    <option value="">Please select</option>
                    <option
                      v-for="(value, index) in modulelist.modulelist"
                      :key="index"
                      :value="index"
                      >{{ value }}</option
                    >
                  </select>
                  <ErrorValidation :msg="errors.module_id" />
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Sequence</label>
                  <input
                    type="text"
                    :class="errors.sequence ? 'is-invalid' : ''"
                    v-model="pageData.sequence"
                    class="form-control"
                    placeholder="Sequence"
                  />
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
  name: "PageEdit",
  data() {
    return {
      errors: {},
      modulelist: this.$store.getters["module/getModule"],
      pageData: {},
    };
  },
  computed: {
    //...mapState("Page", ["pageData"]),
  },
  mounted() {
    var module_id = this.$router.currentRoute.params.id;
    this.getPageById(this.$router.currentRoute.params).then((data) => {
      this.pageData = data;
    });
  },
  methods: {
    ...mapActions("Page", ["getPageById", "PageEdit"]),

    editPage() {
      this.PageEdit(this.pageData)
        .then((response) => {
          if (
            response.success &&
            response.statuscode == GLOBAL_CONSTANT["Page_UPDATED_SUCCESS"]
          ) {
            this.errors = {};
            this.$toast.success({
              title: "Saved",
              message: "Sub Module Changes Saved successfully.",
            });
          } else {
            this.errors = response.data;
          }
        })
        .catch(() => {});
    },
  },
};
</script>
