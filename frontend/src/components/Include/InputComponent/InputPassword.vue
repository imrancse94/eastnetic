<template>
  <div :class="wrapperclass">
    <label>{{ title }}</label>
    <input
      autocomplete="off"
      type="password"
      :class="[{'is-invalid ' : errors},  classname ? classname : '']"
      :placeholder="title"
      @input="updateInput"
      v-model="modelValue"
    />
    <ErrorValidation v-if="errors" :msg="errors" />
  </div>
</template>

<script>
export default {
  data(){
    return {
      modelValue : ""
    }
  },
  methods: {
    updateInput() {
      this.$emit('input', this.modelValue)
    }
  },
  
  props: {
    title: {
      type: String,
      required: true,
    },
    
    errors: {
      type: String,
    },
    classname:{
      type: String,
      required: true,
    },
    wrapperclass:{
      type: String,
    }
  },
};
</script>
