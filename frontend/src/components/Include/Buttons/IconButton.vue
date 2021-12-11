<template>
    <router-link :title="name" :to="{name:route,params: { id: id }}" :class="classname">
        <i :class="icon"></i>
    </router-link>
</template>

<script>
export default {
    name:'IconButton',
    props:['route','classname','name','id','icon']
}
</script>
