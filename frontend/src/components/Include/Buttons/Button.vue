<template>
  <!-- <router-link :to="{name:route}" :class="classname">{{name}}</router-link> -->
  <a href="#" :title="name" :class="classname" @click.prevent="action(id)">
    <i :class="icon"></i>
  </a>
</template>

<script>
export default {
  name: "Button",
  props: ["classname", "name", "icon", "id"],
  methods: {
    action(id) {
      this.$emit("action", id);
    },
  },
};
</script>
