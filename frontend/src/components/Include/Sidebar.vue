<template>
 
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
