<template>
  <div :class="wrapperclass">
    <label>{{ title }}</label>
    <select 
      :class="[{'is-invalid ' : errors},  classname ? classname : '']"
      :placeholder="title"
      @change="updateInput()"
      v-model="modelValue"
    >
      <option value="">Please select</option>
      <option v-for="(option, index) in options" :key="index" :value="option.value">
          {{ option.name }}
      </option>                   
      </select>
    <ErrorValidation v-if="errors" :msg="errors" />
  </div>
</template>

<script>
export default {
  data(){
    return {
      modelValue : this.value
    }
  },
  
  methods: {
    updateInput() {
      this.$emit('update', this.modelValue)
    }
  },
  
  props: {
    options:{
      type:Array,
      required:true
    },
    title: {
      type: String,
      required: true,
    },
    value:{},
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
