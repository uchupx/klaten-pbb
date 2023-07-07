<template>
  <div class=" w-full p-5 rounded-xl">
    <span class="py-2 px-5 w-full rounded-xl bg-yellow-300 bold text-gray-800 shadow-sm">List NOP Bayar</span>
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
      <button type="button" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white">Export Excel</button>
      <!-- <button type="button" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white"  @click="showModal = true">Update Ketetapan</button>
      <button type="button" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white"  @click="showModal = true">Input Ketetapan</button> -->
    </div>
    <div class="bg-white rounded-xl py-3 px-5 text-gray-700 font-light gap-2 flex items-center justify-center flex-wrap overflow-auto">
      <table class="table table-fixed w-full text-xs">
        <tr class="border-b">
          <th class="w-5">#</th>
          <th class="w-10">Blok</th>
          <th class="w-10">Jumlah SPPT</th>
          <th class="w-10">Jumlah Ketetapan</th>
        </tr>
        <template v-if="list.length > 0" >
          <tr class="border-b" v-for="item in list" :key="item.nop">
            <td class="w-5 py-2 text-center">{{ item.id }}</td>
            <td class="w-10 py-2"> {{item.blok ? item.blok : "-" }} </td>
            <td class="w-10 py-2"> {{item.jumlah_sppt ? item.jumlah_sppt : "-" }} </td>
            <td class="w-10 py-2"> {{item.jumlah_ketetapan ? item.jumlah_ketetapan : "-" }} </td>
          </tr>
        </template>
      </table>
      <template v-if="list.length == 0">
        <div class="">
          <span class="text-center">Data tidak ditemukan</span>
        </div>
      </template>
      <div class="absolute bg-green-400 shadow-lg rounded-xl p-3" v-if="isLoading">
        <div class="flex flex-row gap-2 items-center">
          <div style="border-top-color:transparent" class="w-8 h-8 border-4 border-white rounded-full animate-spin"></div>
          <span class="text-white font-light text-sm">Mohon tunggu</span>
        </div>
      </div>
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
import Modal from "../../components/ketetapan/Modal.vue"
export default {
  data () {
    return {
      showModal: false,
      isLoading: false,
      list: []
    }
  },
  components: {
    Pagination,
    Modal
  },
  methods: {
    fetchList() {
      this.isLoading = true
      return axios.get("/api/ketetapan").then(response => {
        this.isLoading = false
        this.list = response.data.data
      })
        .catch(err => {
        this.isLoading = false
        console.log(err)
      })
    }
  },
  mounted() {
    this.fetchList()
  }
}
</script>
<style scoped>
</style>