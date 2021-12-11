<template>
    <router-link :to="currentRoute" :class="classname">{{name}}</router-link>
</template>

<script>
export default {
    name:'LinkButton',
    props:['route','classname','name','id'],
    data(){
        return {
            currentRoute:{}
        };
    },
    mounted(){
        if(this.id){
           this.currentRoute = {
               name : this.route,
               params: { id: this.id }
           }  
        }else{
           this.currentRoute = {
               name : this.route
           }   
        }
    }
}
</script>
