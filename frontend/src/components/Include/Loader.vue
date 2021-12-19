<template>
  <div style="background-color:rgba(16, 16, 16, 1)" class="main-loader flex fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden opacity-75 flex-col items-center justify-center">
	<div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-0"></div>
	<svg class="animate-spin h-3 w-3 mr-0 ..." viewBox="0 0 15 15">
    <!-- ... -->
  </svg>
  <h2 class="text-center text-white text-xl font-semibold mt-0">
      Loading...
  </h2>
</div>
</template>
<script>
export default {
  name: "loader",
  props: ["visible"]
};
</script>
