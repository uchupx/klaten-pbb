<template>
  <div class=" w-full p-5 rounded-xl">
    <span class="py-2 px-5 w-full rounded-xl bg-yellow-300 bold text-gray-800 shadow-sm">Daftar Nop</span>
    <div class="flex flex-row flex-wrap mt-3 py-5 px-5 shadow-sm bg-white rounded-lg text-gray-700 bold items-center">

      <!-- Kolom Pertama -->
      <div class="w-1/2 flex flex-row">
        <div class="mr-4">Kecamatan</div>
        <div class="mr-10">: <span class="py-1 px-2 rounded bg-yellow-300">Wedi</span></div>
        <div class="mr-4">Kelurahan</div>
        <div class="mr-4">: <span class="py-1 px-2 rounded bg-yellow-300">Jiwowetan</span></div>
      </div>
      <!-- Kolom Kedua -->


      <!-- Kolom Kedua -->
      <div class="w-1/2 flex flex-row-reverse items-center">
        <div class="">
          <input type="text" class="border w-full rounded py-1 px-4">
        </div>
        <div class="mr-4">Tahun</div>
      </div>


    </div>

    <div class="flex flex-row-reverse my-3 gap-2">
      <button type="button" class="py-2 px-4 rounded-lg bg-red-400 hover:bg-red-500 text-white">Pembatalan Input SPPT</button>
      <button type="button" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white">Input Pembayaran SPPT</button>
      <button type="button" @click="showModal = !showModal" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white">Input SPPT</button>
    </div>
    <div class="bg-white rounded-xl py-3 px-5 text-gray-700 font-light gap-2 flex items-center flex-wrap overflow-auto">
      <table class="table table-fixed w-full">
        <tr class="border-b">
          <th class="w-10">#</th>
          <th class="w-56">No <input type="text" class="border w-full rounded py-1 px-4"> </th>
          <th class="w-56">Nama <input type="text" class="border w-full rounded py-1 px-4"></th>
          <th class="w-56">Tagihan</th>
          <th class="w-56">Pembayaran</th>
          <th class="w-56">Status</th>
        </tr>
        <tr class="border-b">
          <td class="w-10 py-2 text-center">1</td>
          <td class="w-56 py-2">Maria Anders</td>
          <td class="w-56 py-2">Germany</td>
          <td class="w-56 py-2">Germany</td>
          <td class="w-56 py-2">Germany</td>
          <td class="w-56 py-2">Germany</td>
        </tr>
        <tr class="border-b">
          <td class="w-10 py-2 text-center">2</td>
          <td class="w-56 py-2">Francisco Chang</td>
          <td class="w-56 py-2">Mexico</td>
          <td class="w-56 py-2">Mexico</td>
          <td class="w-56 py-2">Mexico</td>
          <td class="w-56 py-2">Mexico</td>
        </tr>
      </table> 
    </div>
    <div class="bg-white p-3 inline-block mt-6 rounded-2xl float-right">
      <pagination></pagination>
    </div>
    <template v-if="showModal">
      <modal :isShow="showModal" @openClose="showModal = !showModal"></modal>
    </template>
  </div>
</template>
<script>
import Pagination from "../../components/Pagination.vue"
import Modal from "../../components/sppt/Modal.vue"
export default {
  data () {
    return {
      showModal: false,
    }
  },
  components: {
    Pagination,
    Modal
  }
}
</script>
<style scoped>
</style>