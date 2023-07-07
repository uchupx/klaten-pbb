<script lang="js">
import { ArrowUpOnSquareIcon, CloudArrowUpIcon, DocumentIcon } from "@heroicons/vue/20/solid"
import axios from "axios"
import router from "vue-router"

export default {
  components: {
    ArrowUpOnSquareIcon,
    CloudArrowUpIcon,
    DocumentIcon
  },
  data() {
    return {
      isLoading:  false,
      fileUpload: {
        name: null,
        byte: null,
      }
    }
  },
  methods: {
    previewFiles(event) {
      console.log(event.target.files);
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
            // console.log(reader.result)
        this.fileUpload = {
          name: file.name,
          byte: reader.result
        }
            // console.log(this.image)
      };
      // this.fileUpload = event.target.files
    },
    reset() {
      this.fileUpload = {
        name: null,
        byte: null,
      }
    },
    uploadFile() {
      this.isLoading = true
      const file = this.dataURLtoFile(this.fileUpload.byte, this.fileUpload.name)
      const data = new FormData();
      data.append('file', file);
      return axios.post("/api/ketetapan/import", data).then(response => {
        this.isLoading = false
        this.$router.push({ path: response.data.redirect })
      }).catch(err => {
        this.isLoading = false
        console.log(err)
      });
    },
    dataURLtoFile (dataurl, filename){
      const arr = dataurl.split(',')
      const mime = arr[0].match(/:(.*?);/)[1]
      const bstr = atob(arr[1])
      let n = bstr.length
      const u8arr = new Uint8Array(n)
      while (n) {
        u8arr[n - 1] = bstr.charCodeAt(n - 1)
        n -= 1 // to make eslint happy
      }
      return new File([u8arr], filename, { type: mime })
    }
  }
}
</script>

<template>
  <div>
   <!-- component -->

    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto">
      <div class="flex items-center justify-center w-full">
            <div v-if="isLoading" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 bg-gray-100 dark:border-gray-600 ">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <!-- <DocumentIcon class="w-10 h-10 mb-3 text-gray-400"></DocumentIcon> -->
                    <div style="border-top-color:transparent" class="w-8 h-8 border-4 border-blue-200 rounded-full animate-spin"></div>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Memproses</span></p>
                    <!-- <p class="text-xs text-gray-500 dark:text-gray-400">xlsx, xls (maksimal 10MB)</p> -->                 
                </div>
            </div>
            <label v-else-if="!fileUpload.name" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <CloudArrowUpIcon class="w-10 h-10 mb-3 text-gray-400"></CloudArrowUpIcon>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Tekan untuk upload</span></p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">xlsx, xls (maksimal 10MB)</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" @change="previewFiles" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
            </label>
            <div v-else class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 bg-gray-100 dark:border-gray-600 ">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <DocumentIcon class="w-10 h-10 mb-3 text-gray-400"></DocumentIcon>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">{{ fileUpload.name }}</span></p>
                    <!-- <p class="text-xs text-gray-500 dark:text-gray-400">xlsx, xls (maksimal 10MB)</p> -->                 
                </div>
            </div>
        </div> 

      <div class="flex gap-2 flex-row-reverse mt-5 text-center w-full">
        <button type="button" class="text-white px-4 py-3 rounded-xl flex" :class="fileUpload.name && !isLoading ? 'bg-blue-400' : 'bg-blue-300 cursor-default'" :disabled="!fileUpload.name || isLoading"  @click="uploadFile" > Simpan</button>
        <button type="button" class="text-white px-4 py-3 rounded-xl flex" :class="fileUpload.name  && !isLoading? 'bg-red-400' : 'bg-red-300 cursor-default'" :disabled="!fileUpload.name || isLoading" @click="reset">Batal</button>
      </div>
    </div>
  </div>
</template>