<template>
  <div class=" px-3 py-10 flex justify-center h-screen">
    <div class="w-full max-w-xs m-auto">
  <form @submit.prevent="signup" action="#" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2 text-left" for="Name">
        Name
      </label>
      <input :class="errors.name ? 'border-red-500':''" v-model="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username"  placeholder="Name">
      <p v-if="errors.name" class="text-red-500 text-xs italic text-left">{{errors.name}}</p>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2 text-left" for="Email">
        Email
      </label>
      <input :class="errors.email ? 'border-red-500':''" v-model="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username"  placeholder="Email">
      <p v-if="errors.email" class="text-red-500 text-xs italic text-left">{{errors.email}}</p>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2 text-left" for="password">
        Password
      </label>
      <input :class="errors.password ? 'border-red-500':''" v-model="password" type="password" class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" placeholder="Password">
      <p v-if="errors.password" class="text-red-500 text-xs italic text-left">{{errors.password}}</p>
    </div>
    <div class="flex items-center justify-center">
       <div class="w-full md:w-1/2">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Sign Up
        </button>
        </div>
        <div class="w-full md:w-1/2">
          <router-link :to="{name:'Login'}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Log in
          </router-link>
        </div>
      
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;webdevs assignment.
  </p>
</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name:"",
      email: "",
      password: "",
      errors:{}
    };
  },
  methods: {
    signup() {
      let name = this.name;
      let email = this.email;
      let password = this.password;
      let self = this;
      this.errors = {};
      this.$store.dispatch("loading/startLoading");
      this.$store
        .dispatch("auth/signup", {name, email, password })
        .then((response) => {
            if (response.success) {
            self.$store.dispatch("loading/stopLoading");
            this.$toastr.s("Successfully registered", "Success");
          } else {
            this.has_error = true;
            this.errors = response.data;
          }

          console.log(this.errors)
        });
    },
  },
  mounted(){
    
  }
};
</script>

