<script>
import { XMarkIcon } from "@heroicons/vue/24/outline"
import Axios from 'axios'

export default {
  data() {
    return {
      form: {
        nop: "",
        nama_wp: "",
        alamat_wp: "",
        rt_rw: "",
        blok: "",
        luas_bumi: 0,
        luas_bangunan: 0,
      },
      id: null,
      err: ""
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
          nama_wp: this.data.nama_wp,
          alamat_wp: this.data.alamat_wp,
          rt_rw: this.data.rt_rw,
          blok: this.data.blok,
          luas_bumi: this.data.luas_bumi,
          luas_bangunan: this.data.luas_bangunan,
        }
        this.id = this.data.id
      }
    },
  methods: {
    submit() {
      if (this.id) {
        return Axios.put('/api/nop/' + this.id, this.form).then(res => {
          this.id = null
          this.$emit("openClose", true)
        }).catch(err => {
          this.err = err
        })
      } else {
        return Axios.post('/api/nop', this.form).then(res => {
          this.$emit("openClose", true)
        }).catch(err => {
          this.err = err
        })
      }
    },
    isNotValid() {
      return this.form.nop ==  "" || this.form.nama_wp ==  "" || this.form.blok ==  ""
    }
  }
}
</script>
<template>
  <!-- component -->
    <div class="modal z-50 fixed bg-black w-screen h-screen flex items-center top-0 left-0">
      <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border bg-white border-gray-300 shadow-xl overflow-auto">
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
          <p class="mb-2 font-semibold text-gray-700">Nama</p>
          <input
            type="text"
            name=""
            v-model="form.nama_wp"
            placeholder="Nama"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">Alamat</p>
          <textarea
            type="text"
            name=""
            v-model="form.alamat_wp"
            placeholder="Alamat..."
            class="w-full p-5 bg-white border border-gray-200 rounded shadow-sm appearance-none"
            id=""
          >
          </textarea>
  
          
          <div class="flex items-center mt-5 mb-3 space-x-4">
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">RT RW</p>
              <input
                type="text"
                name=""
                v-model="form.rt_rw"
                placeholder="rt 02/10"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Blok</p>
              <input
                type="text"
                name=""
                v-model="form.blok"
                placeholder="blok"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            
          </div>
          <div class="flex items-center mt-5 mb-3 space-x-4">
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Luas Bumi</p>
              <input
                type="number"
                name=""
                v-model="form.luas_bumi"
                placeholder="0 m2"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Luas Bangunan</p>
              <input
                type="number"
                name=""
                v-model="form.luas_bangunan"
                placeholder="0 m2"
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