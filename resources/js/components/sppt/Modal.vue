<script>
import { XMarkIcon } from "@heroicons/vue/24/outline"
import Axios from 'axios'

export default {
  data() {
    return {
      form: {
        nop: "",
        jenis_op: "",
        tahun: "",
        jumlah_dibayar: 0,
        kode_bayar: "",
        kode_wilayah: "",
        denda: 0,
      },
      id: null,
      err: ""
    }
  },
  props: {
    isShow: Boolean,
    data: Object,
  },
  methods: {
    submit() {
      if (this.id) {
        return Axios.put('/api/sppt/' +this.id, this.form).then(res => {
          this.id = null
          this.$emit("openClose", true)
        }).catch(err => {
          this.err = err
        })
      } else {
        return Axios.post('/api/sppt', this.form).then(res => {
          this.$emit("openClose", true)
        }).catch(err => {
          this.err = err
        })
      }
    },
    isNotValid() {
      return this.form.nop ==  "" || this.form.jenis_op ==  "" || this.form.tahun ==  "" 
    }
  },
  mounted () {
  if (this.data) {
      this.form = {
        nop: this.data.nop.nop,
        jenis_op:this.data.jenis_op,
        tahun:this.data.tahun,
        jumlah_dibayar:this.data.jumlah_dibayar,
        kode_bayar:this.data.kode_bayar,
        kode_wilayah:this.data.kode_wilayah,
        denda:this.data.denda,
      }
      this.id = this.data.id
    }
  }
}
</script>
<template>
  <!-- component -->
    <div class="modal z-50 fixed bg-black w-screen h-screen flex items-center top-0 left-0">
      <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border bg-white border-gray-300 shadow-xl">
        <div
          class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
        >
          <p class="font-semibold text-gray-800">Input SPPT</p>
          <XMarkIcon class="w-3 h-3 cursor-pointer" @click="$emit('openClose')"></XMarkIcon>
        </div>
        <div class="flex flex-col px-6 py-5 bg-gray-50">
        <div class="border border-red-500 p-4 text-red-600 rounded-lg mb-2" v-if="err">{{ err }}</div>
          <p class="mb-2 font-semibold text-gray-700">NOP</p>
          <input
            type="text"
            name=""
            v-model="form.nop"
            placeholder="NOP"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">Jenis OP</p>
          <input
            type="text"
            name=""
            v-model="form.jenis_op"
            placeholder="Nama"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <!-- <p class="mb-2 font-semibold text-gray-700">Alamat</p>
          <textarea
            type="text"
            name=""
            placeholder="Alamat..."
            class="w-full p-5 bg-white border border-gray-200 rounded shadow-sm appearance-none"
            id=""
          >
          </textarea>
          <p class="my-2 font-semibold text-gray-700">Alamat Objek</p>
          <textarea
            type="text"
            name=""
            placeholder="Alamat..."
            class="w-full p-5 bg-white border border-gray-200 rounded shadow-sm appearance-none"
            id=""
          >
          </textarea>
          <hr /> -->
<!-- nop
jenis_op
tahun
jumlah_dibayar
jumlah_bayar
kode_bayar
kode_wilayah
denda -->
          <div class="flex items-center mt-5 mb-3 space-x-4">
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Jumlah Dibayar</p>
              <input
                type="number"
                name=""
                v-model="form.jumlah_dibayar"
                placeholder="Rp ...."
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Denda</p>
              <input
                type="text"
                name=""
                v-model="form.denda"
                placeholder="Tahun"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
          </div>
          <div class="flex items-center mt-5 mb-3 space-x-4">
            <div class="w-1/3">
              <p class="my-2 font-semibold text-gray-700">Kode Bayar</p>
              <input
                type="text"
                name=""
                v-model="form.kode_bayar"
                placeholder="Total"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            <div class="w-1/3">
              <p class="my-2 font-semibold text-gray-700">Kode Wilayah</p>
              <input
                type="text"
                name=""
                v-model="form.kode_wilayah"
                placeholder="NOP"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            <div class="w-1/3">
              <p class="my-2 font-semibold text-gray-700">Tahun</p>
              <input
                type="text"
                name=""
                v-model="form.tahun"
                placeholder="NOP"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
          </div>
        </div>
        <div
          class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
          <button type="button" class="font-semibold text-white bg-gray-400 hover:text-gray-300 hover:bg-gray-600 px-4 py-2 rounded-xl" @click="$emit('openClose')">Cancel</button>
          <button type="button" class="px-4 py-2 text-white font-semibold bg-blue-400 rounded-xl hover:bg-blue-500" @click="submit()" :disable="isNotValid">
            Save
          </button>
        </div>
      </div>
    </div>
</template>