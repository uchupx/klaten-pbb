<script>
  import {XMarkIcon} from "@heroicons/vue/24/outline"
import Axios from 'axios'

export default {
  data() { 
    return {
      form: {
        nop: "",
        tahun_pajak: "",
        njop_bumi: "",
        njop_bangunan: "",
        njop_sppt: "",
        total: 0,
      },
      id: null,
      err: ""
    }
  },
  methods: {
    submit() {
      if (this.id) {
        return Axios.put('/api/ketetapan/' + this.id, this.form).then(res => {
          this.id = null
          this.$emit("openClose", true)
        }).catch(err => {
          this.err = err
        })
      } else {
        return Axios.post('/api/ketetapan', this.form).then(res => {
          this.$emit("openClose", true)
        }).catch(err => {
          this.err = err
        })
      }
    },
    isNotValid() {
      return this.form.nop ==  "" || this.form.tahun_pajak ==  "" || this.form.njop_bumi ==  "" || this.form.njop_bangunan ==  "" || this.form.njop_sppt ==  "" || this.form.total ==  0
    }
  },
  props: {
    isShow: Boolean,
    data: Object,
  },
  mounted () {
  if (this.data) {
      this.form = {
        nop: this.data.nop,
        tahun_pajak: this.data.tahun_pajak,
        njop_bumi: this.data.njop_bumi,
        njop_bangunan: this.data.njop_bangunan,
        njop_sppt: this.data.njop_sppt,
        total: this.data.jumlah_ketetapan,
      }
      this.id = this.data.id
    }
  },
  }
</script>
<template>
  <!-- component -->
    <div class="modal z-50 fixed bg-black w-screen h-screen flex items-center top-0 left-0">
      <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border bg-white border-gray-300 shadow-xl">
        <div
          class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
        >
          <p class="font-semibold text-gray-800">Input Ketatapan</p>
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
          <p class="mb-2 font-semibold text-gray-700">Tahun Pajak</p>
          <input
            type="number"
            name=""
            v-model="form.tahun_pajak"
            placeholder="0 m2"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">NJOP Bumi</p>
          <input
            type="number"
            name=""
            v-model="form.njop_bumi"
            placeholder="0 m2"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">NJOP Bangunan</p>
          <input
            type="number"
            name=""
            v-model="form.njop_bangunan"
            placeholder="0 m2"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">NJOP SPPT</p>
          <input
            type="number"
            name=""
            v-model="form.njop_sppt"
            placeholder="0"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">Jumlah Ketatapan</p>
          <input
            type="number"
            name=""
            v-model="form.total"
            placeholder="0"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
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