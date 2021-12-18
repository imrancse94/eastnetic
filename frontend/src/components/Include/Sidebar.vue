<template>
 <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Tasks</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                            <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Messages</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                            <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Analytics</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                            <i class="fa fa-wallet pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Payments</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      sidebarList: [],
      children: [],
      current_route: this.$route.name,
      route_parent_name_assoc:{},
      route_submodule_name_assoc:{},
      profile:{
        name:""
      }
    };
  },
  computed: {
    currentRoute: () => {
      return "admin.dashboard";
    },
  },
  methods: {
    accordiaon(elem) {
      var element = event.target;
      var targetElement = $(element)
        .parents("li.main-tree")
        .first();
      

      targetElement.find("ul.nav-treeview").slideToggle();
      targetElement.toggleClass("menu-is-opening menu-open");
    },

  },
  mounted() {
    this.profile = this.$store.getters["auth/loginResult"];
    const sidebarlist = this.$store.getters["auth/getSidebarList"];
    if (sidebarlist) {
      for (var i in sidebarlist) {
        var has_route = false;
        if (sidebarlist[i].submenu) {
          for (var j in sidebarlist[i].submenu) {
            if (
              this.$router.resolve({
                name: sidebarlist[i].submenu[j].permission_name,
              }).resolved.matched.length > 0
            ) {
              has_route = true;
              break;
            }
          }
        }
        this.sidebarList.push(sidebarlist[i]);
      }
    }

  
    for(var j in this.sidebarList){
      var page_name = this.sidebarList[j].page_name;
      for(var k in this.sidebarList[j].submenu){
        if(this.sidebarList[j].submenu[k].is_index == 1){
         this.route_parent_name_assoc[this.sidebarList[j].submenu[k].permission_name] = page_name;
        }

        for(var l in this.sidebarList[j].submenu[k].submenu){
          //console.log('$route.name',this.sidebarList[j].submenu[k].submenu[l].permission_name)
          this.route_parent_name_assoc[this.sidebarList[j].submenu[k].submenu[l].permission_name] = page_name;
        }
      }
      
    }
  },

};
</script>
