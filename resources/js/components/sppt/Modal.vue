<script setup>
  import {XMarkIcon} from "@heroicons/vue/24/outline"
  const prop = defineProps({
    isShow: Boolean,
  })
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
          <p class="mb-2 font-semibold text-gray-700">NOP</p>
          <input
            type="text"
            name=""
            placeholder="NOP"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">Nama</p>
          <input
            type="text"
            name=""
            placeholder="Nama"
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          >
          <p class="mb-2 font-semibold text-gray-700">Alamat</p>
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
          <hr />

          <div class="flex items-center mt-5 mb-3 space-x-4">
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Total</p>
              <input
                type="number"
                name=""
                placeholder="Total"
                class="p-5 bg-white border border-gray-200 rounded shadow-sm h-36 w-full"
                id=""
              >
            </div>
            <div class="w-1/2">
              <p class="my-2 font-semibold text-gray-700">Total</p>
              <input
                type="date"
                name=""
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
          <button class="px-4 py-2 text-white font-semibold bg-blue-400 rounded-xl hover:bg-blue-500">
            Save
          </button>
        </div>
      </div>
    </div>
</template>