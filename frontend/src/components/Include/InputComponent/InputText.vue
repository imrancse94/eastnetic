<template>
  <div :class="wrapperclass">
    <label>{{ title }}</label>
    <input
      autocomplete="off"
      type="text"
      :value="value"
      :class="[{'is-invalid ' : errors},  classname ? classname : '']"
      :placeholder="title"
      @input="updateInput($event.target.value)"
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
  mounted() {
    //console.log('this.model.modelValue',)
    //this.modelValue = this.value
  },
  methods: {
    updateInput(val) {
      this.$emit('input', val)
    }
  },
  
  props: {
    title: {
      type: String,
      required: true,
    },
    value:{
      type:String
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
