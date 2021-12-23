<template>
  <nav
    class="
      bg-gray-800
      pt-2
      md:pt-1
      pb-1
      px-1
      mt-0
      h-auto
      fixed
      w-full
      z-20
      top-0
    "
  >
    <div class="flex flex-wrap items-center">
      <div
        class="
          flex flex-shrink
          md:w-1/3
          justify-center
          md:justify-start
          text-white
        "
      >
        <a href="#">
          <span class="text-xl pl-2"><i class="em em-grinning"></i></span>
        </a>
      </div>

      <div
        class="
          flex flex-1
          md:w-1/3
          justify-center
          md:justify-start
          text-white
          px-2
        "
      ></div>

      <div
        class="
          flex
          w-full
          pt-2
          content-center
          justify-between
          md:w-1/3 md:justify-end
        "
      >
        <div class="relative inline-block pr-2 w-full text-right">
          <button
            @click.prevent="toggleDD"
            ref="profile_section"
            class="drop-button text-white focus:outline-none"
          >
            <span class="pr-2"><i class="em em-robot_face"></i></span> {{$store.getters['auth/getuser'].name}}
            <svg
              class="h-3 fill-current inline"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </button>
          <div
            class="
              origin-top-right
              absolute
              right-0
              mt-2
              w-56
              shadow-lg
              bg-white
              ring-1 ring-black ring-opacity-5
              focus:outline-none
              text-left
            "
            :class="isShowProfileDropdown ? '':'invisible'"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="menu-button"
            tabindex="-1"
          >
            <div class="py-1" role="none">
              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
              <a
                href="#"
                @click.prevent="logout"
                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300"
                role="menuitem"
                tabindex="-1"
                id="menu-item-2"
                >Log out</a
              >
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      isShowProfileDropdown: false,
    };
  },
  methods: {
    toggleDD() {
      this.isShowProfileDropdown = !this.isShowProfileDropdown;
    },
    logout() {
      this.$store.dispatch("auth/setLogout");
      this.$router.push({name:"Login"});
    },
    close(e) {
      if (!this.$refs.profile_section.contains(e.target)) {
        this.isShowProfileDropdown = false;
      }
    },
  },
  mounted() {
    document.addEventListener("click", this.close);
    
  },
  beforeDestroy() {
    document.removeEventListener("click", this.close);
  },
};
</script>