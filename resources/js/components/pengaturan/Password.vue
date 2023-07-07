<script lang="js">
export default {
  
}
</script>
<template>
  <div class="flex gap-3 flex-col">
    <div class="flex items-center">
      <span class="mr-3 w-48">Password Lama</span>
      <input type="password" class="border px-3 py-2 rounded-xl">
    </div>
    <div class="flex items-center">
      <span class="mr-3 w-48">Password Baru</span>
      <input type="password" class="border px-3 py-2 rounded-xl">
    </div>
    <div class="flex items-center">
      <span class="mr-3 w-48">Konfirmasi Password</span>
      <input type="password" class="border px-3 py-2 rounded-xl">
    </div>
    <div class="flex items-center gap-3 flex-row-reverse">
      <button type="button" class="bg-blue-400 hover:bg-blue-500 px-4 py-3 rounded-xl text-white">Simpan</button>
      <button type="button" class="bg-gray-400 hover:bg-gray-500 px-4 py-3 rounded-xl text-white">Reset</button>
    </div>
  </div>
</template>
<style scoped>
</style>
