<template>
  <div class="main-content w-full bg-white">
    <ContentPageHeader header="Order Edit" />
    <div
      class="flex flex-row flex-wrap flex-grow w-full md:w-full xl:w-full"
    >
    <div class="flex flex-wrap p-2">
        
    </div>
      <div class="flex flex-wrap p-6">
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2">
        <h3 class="text-center p-3 uppercase text-gray-600 font-bold mb-5 border-b-2">Order Info</h3>
          <form method="post" action="">
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-first-name"
              >
                First Name
              </label>
              <input
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-red-500
                  rounded
                  py-3
                  px-4
                  mb-3
                  leading-tight
                  focus:outline-none focus:bg-white
                "
                id="grid-first-name"
                type="text"
                placeholder="Jane"
              />
              <p class="text-red-500 text-xs italic">
                Please fill out this field.
              </p>
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-last-name"
              >
                Last Name
              </label>
              <input
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-200
                  rounded
                  py-3
                  px-4
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-gray-500
                "
                id="grid-last-name"
                type="text"
                placeholder="Doe"
              />
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-password"
              >
                Password
              </label>
              <input
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-200
                  rounded
                  py-3
                  px-4
                  mb-3
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-gray-500
                "
                id="grid-password"
                type="password"
                placeholder="******************"
              />
              <p class="text-gray-600 text-xs italic">
                Make it as long and as crazy as you'd like
              </p>
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-city"
              >
                City
              </label>
              <input
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-200
                  rounded
                  py-3
                  px-4
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-gray-500
                "
                id="grid-city"
                type="text"
                placeholder="Albuquerque"
              />
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-state"
              >
                State
              </label>
              <div class="relative">
                <select
                  class="
                    block
                    appearance-none
                    w-full
                    bg-gray-200
                    border border-gray-200
                    text-gray-700
                    py-3
                    px-4
                    pr-8
                    rounded
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="grid-state"
                >
                  <option>New Mexico</option>
                  <option>Missouri</option>
                  <option>Texas</option>
                </select>
                <div
                  class="
                    pointer-events-none
                    absolute
                    inset-y-0
                    right-0
                    flex
                    items-center
                    px-2
                    text-gray-700
                  "
                >
                  <svg
                    class="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                    />
                  </svg>
                </div>
              </div>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <label
                class="
                  block
                  uppercase
                  tracking-wide
                  text-gray-700 text-xs
                  font-bold
                  mb-2
                "
                for="grid-zip"
              >
                Zip
              </label>
              <input
                class="
                  appearance-none
                  block
                  w-full
                  bg-gray-200
                  text-gray-700
                  border border-gray-200
                  rounded
                  py-3
                  px-4
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-gray-500
                "
                id="grid-zip"
                type="text"
                placeholder="90210"
              />
            </div>
          </div>
        </form>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 p-2">
        <h3 class="text-center uppercase text-gray-600 font-bold p-3 mb-5 border-b-2">Order History</h3>
           <div
          class="
            bg-white
            border-transparent
            rounded-lg
            w-full
            md:w-full
            xl:w-full
          "
        >
        <table class="border-collapse w-full">
          <thead>
            <tr>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Order Id
              </th>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Order Status
              </th>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Quantity
              </th>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Unit Price
              </th>
              <th
                class="
                  p-3
                  font-bold
                  uppercase
                  bg-gradient-to-b
                  from-gray-300
                  to-gray-100
                  bg-gray-200
                  text-gray-600
                  border border-gray-300
                  hidden
                  lg:table-cell
                "
              >
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
             
              class="
                bg-white
                lg:hover:bg-gray-100
                flex
                lg:table-row
                flex-row
                lg:flex-row
                flex-wrap
                lg:flex-no-wrap
                mb-10
                lg:mb-0
              "
            >
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800 text-center
                  border border-b
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Order ID</span
                >
                 AAAA
              </td>
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800 text-center
                  border border-b
                  text-center
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Order Status</span
                >
                <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold"
                  >BBBB</span>
                 
              </td>
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800 text-center
                  border border-b
                  text-center
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Quantity</span
                >
                CCC
              </td>
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800 text-center
                  border border-b
                  text-center
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Unit Price</span
                >
                DDDD
              </td>
              <td
                class="
                  w-full
                  lg:w-auto
                  p-3
                  text-gray-800 text-center
                  border border-b
                  text-center
                  block
                  lg:table-cell
                  relative
                  lg:static
                "
              >
                <span
                  class="
                    lg:hidden
                    absolute
                    top-0
                    left-0
                    bg-blue-200
                    px-2
                    py-1
                    text-xs
                    font-bold
                    uppercase
                  "
                  >Actions</span
                >
                <a href="#" class="text-blue-400 hover:text-blue-600 underline"
                  >Edit</a
                >
                <a
                  href="#"
                  class="text-blue-400 hover:text-blue-600 underline pl-6"
                  >Remove</a
                >
              </td>
            </tr>
          </tbody>
        </table>
          
        </div>
        </div>
      </div>
    </div>
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
        id: "",
        name: "",
        icon: "",
        sequence: "",
      },
      errors: {},
    };
  },
  computed: {},
  methods: {
    ...mapActions("module", ["moduleAdd"]),

    addModule() {
      this.moduleAdd(this.module)
        .then((response) => {
          if (
            response.success &&
            response.statuscode == GLOBAL_CONSTANT["MODULE_INSERT_SUCCESS"]
          ) {
            this.errors = {};
            this.$toast.success({
              title: "Saved",
              message: "Module Saved successfully.",
            });
            this.$router.push({ name: "module-index" });
          } else {
            this.errors = response.data;
          }
        })
        .catch(() => {});
    },
  },
};
</script>
