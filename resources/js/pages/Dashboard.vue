<template>
  <div class="flex flex-col md:flex-row rounded-xl space-x-0 md:space-x-8 space-y-12  md:space-y-0 justify-center items-center mt-5 bg-white h-custom">
    <card></card>
    <card></card>
    <card></card>
    <card></card>
  </div>
</template>
<script>
  import Card from "../components/Card";

export default {
  components: {
    Card
  }
}
</script>

<style scoped>
  .h-custom {
    min-height: calc(100% - 10rem);
  }
</style>