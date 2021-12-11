<template>
  <div :class="{ 'visible': visible }" class="loading" id="full-page-loader">
    <div class='uil-ring-css' style='transform:scale(0.79);'>
        <div></div>
        <h3>Please wait.....</h3>
    </div>
  </div>

</template>
<script>
export default {
  name: "loader",
  props: ["visible"]
};
</script>
