<template>
  <button :class="classname" name="Delete" icon="fas fa-trash" type="submit">
    {{ label }}
  </button>
</template>

<script>
export default {
  name: "SubmitButton",
  props: ["id", "classname", "label"],
  methods: {
    action(id) {
      this.$emit("action", id);
    },
  },
};
</script>
