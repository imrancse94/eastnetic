<template>
  <div class="bg-gray-800 mt-12">
    <div class="bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
      <h3 class="font-bold pl-2">{{ header }}</h3>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContentPageHeader",
  props: ["header"],
};
</script>
