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
      <!-- <button type="button" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white">Input Pembayaran SPPT</button> -->
      <button type="button" @click="showModal = !showModal" class="py-2 px-4 rounded-lg bg-blue-400 hover:bg-blue-500 text-white">Input SPPT</button>
    </div>
    <div class="bg-white rounded-xl py-3 px-5 text-gray-700 font-light gap-2 flex items-center flex-wrap overflow-auto">
      <table class="table table-fixed w-full">
        <tr class="border-b">
          <th class="w-10">#</th>
          <th class="w-10">No <input type="text" class="border w-full rounded py-1 px-4"> </th>
          <th class="w-10">Nama <input type="text" class="border w-full rounded py-1 px-4"></th>
          <th class="w-10">Tagihan</th>
          <th class="w-10">Pembayaran</th>
          <th class="w-10">Status</th>
          <th class="w-10">Aksi</th>
        </tr>
        <template v-if="!isLoading && list.length > 0" >
          <tr class="border-b" v-for="item in list" :key="item.nop">
            <td class="w-10 font-light">{{ item.id }}</td>
            <td class="w-10 font-light">{{ item.nop ? item.nop.nop : "-" }}</td>
            <td class="w-10 font-light">{{ item.nop ? item.nop.nama_wp : "-" }}</td>
            <td class="w-10 font-light">{{ item.jumlah_dibayar ? item.jumlah_dibayar : "-" }}</td>
            <td class="w-10 font-light">{{ item.kode_bayar ? item.kode_bayar : "-" }}</td>
            <td class="w-10 font-light">{{ "-" }}</td>
            <td class="w-10 py-2">
              <button type="button" class="p-1 bg-blue-400 rounded-sm text-white" @click="showEdit(item)"><pencil-icon class="h-3"></pencil-icon></button>             
              <button type="button" class="p-1 bg-blue-400 rounded-sm text-white ml-2"><BanknotesIcon class="h-3"></BanknotesIcon></button>
              <button type="button" class="p-1 bg-red-400 rounded-sm text-white ml-2" @click="deleteData(item)"><trash-icon class="h-3"></trash-icon></button>
          </td>
          </tr>
        </template>
      </table>
      <template v-if="!isLoading && list.length == 0">
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
      <!-- <pagination></pagination> -->
    </div>
    <template v-if="showModal">
      <modal :isShow="showModal" @openClose="openClose"  :data="selectedData"></modal>
    </template>
  </div>
</template>
<script>
import Pagination from "../../components/Pagination.vue"
import Modal from "../../components/sppt/Modal.vue"
import { TrashIcon, PencilIcon, BanknotesIcon } from "@heroicons/vue/24/solid"
import Axios from 'axios'


export default {
  data () {
    return {
      showModal: false,
      isLoading: false,
      list: [],
      selectedData: null
    }
  },
  methods: {
    openClose(doFetchList) {
      this.showModal = !this.showModal
      this.selectedData = null
      if (doFetchList) {
        return this.fetchList()
      }
    },
    fetchList() {
      console.log("doFetchList")
      this.isLoading = true
      return axios.get("/api/sppt").then(response => {
        this.isLoading = false
        this.list = response.data.data
      })
        .catch(err => {
        this.isLoading = false
        console.log(err)
      })
    },
    showEdit(data) {
      this.selectedData = data
      this.showModal = true
    },
    deleteData(data) {
      return Axios.delete('/api/sppt/' + data.id).then(res => {
          this.fetchList()
        }).catch(err => {
          this.err = err
        })
    },
  },
  components: {
    Pagination,
    Modal, 
    TrashIcon, 
    PencilIcon,
    BanknotesIcon
  },
  mounted() {
    this.fetchList()
  }
}
</script>
<style scoped>
</style>