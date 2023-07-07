<script setup> name:"Card"

</script>

<template>
  <div class="bg-gray-200 rounded-xl">
      <div class="px-4 py-3 rounded-xl bg-white shadow-xl md:w-auto">
          <slot name="card"></slot>
      </div>
  </div>
</template>

