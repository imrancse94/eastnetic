<template>
  <div>
    {{ isIdle }}

    <Header />
    <div class="flex flex-col md:flex-row">
      <Sidebar />
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </div>
    
  </div>
</template>

<script>
import Header from "./Include/Header.vue";
import Footer from "./Include/Footer.vue";
import Sidebar from "./Include/Sidebar.vue";

export default {
  name: "Admin",
  components: {
    Header,
    Sidebar,
    Footer,
  },

  mounted() {},
  computed: {
    isIdle() {
      if (this.$store.getters["auth/isAuthenticated"]) {
        if (this.$store.state.idleVue.isIdle) {
          console.log("Yes logout");
          this.$store.dispatch("auth/setLogout");
          this.$router.push({ name: "Login" });
        }
      }
      //return this.$store.state.idleVue.isIdle;
    },
  },
};
</script>



