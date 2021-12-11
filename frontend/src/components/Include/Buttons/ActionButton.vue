<template>
  <div class="tools action-btns">
    <IconButton 
      icon='fas fa-edit' 
      :route='route' 
      :id='id' 
      name='Edit' 
      classname='text-primary' 
    />
    
    <Button classname="text-danger" name="Delete" icon="fas fa-trash" @action="action(id)" />
    
  </div>
</template>

<script>
export default {
  name: "ActionButton",
  props: ['id','route'],
  methods:{
    action(id){
      this.$emit('action',id);
    }
  }
};
</script>
