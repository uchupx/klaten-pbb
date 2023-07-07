<script lang="js">
import Card from "../components/Card";
import Password from "../components/pengaturan/Password";
import Import from "../components/pengaturan/Import";
import ImportKetetapan from "../components/pengaturan/ImportKetetapan";
import { ArrowUpOnSquareStackIcon, KeyIcon, ArrowDownOnSquareStackIcon } from "@heroicons/vue/20/solid"

export default {
  data() {
    return {
      menus: {
        'password': {
          title: 'Ubah Password',
          icon: KeyIcon,
          body: Password
        },
        'import': {
          title: 'Import Data SPPT',
          icon: ArrowUpOnSquareStackIcon,
          body: Import
        },
        // 'export': {
        //   title: 'Export Data SPPT',
        //   icon: ArrowDownOnSquareStackIcon,
        //   body: Import
        // },
        'import_ketetapan': {
          title: 'Import Data Ketetapan',
          icon: ArrowUpOnSquareStackIcon,
          body: ImportKetetapan
        },
      },
      selectedMenu: "password"
    }
  },
  components: {
    Card,
    Password,
    Import,
    ImportKetetapan,
    ArrowUpOnSquareStackIcon, KeyIcon, ArrowDownOnSquareStackIcon
  }
}
</script>

<template>
  <div>
    <span class="py-2 px-5 w-full rounded-xl bg-red-600 bold text-white shadow-sm">Pengaturan</span>
    <div class="flex flex-col md:flex-row rounded-xl space-x-0 md:space-x-8 space-y-12  md:space-y-0 mt-5 h-custom">
      <template v-for="(menu, key) in menus" :key="key">
        <card>
          <template v-slot:card>
            <div class="font-medium text-lg flex items-center border-transparent border-b hover:border-gray-200 cursor-pointer" @click="selectedMenu = key">
              <component :is="menu.icon" class="w-5 h-5 mr-3"></component>
              <span class="text-gray-700">{{ menu.title }}</span>
            </div>
          </template>
        </card>
      </template>

      <!-- <card>
        <template v-slot:card>
          <div class="font-medium text-lg flex items-center border-transparent border-b hover:border-gray-200 cursor-pointer">
            <ArrowDownOnSquareStackIcon class="w-5 h-5 mr-3"></ArrowDownOnSquareStackIcon>
            <span class="text-gray-700">Export Data SPPT</span>
          </div>
        </template>
      </card>

      <card>
        <template v-slot:card>
          <div class="font-medium text-lg flex items-center border-transparent border-b hover:border-gray-200 cursor-pointer">
            <KeyIcon class="w-5 h-5 mr-3"></KeyIcon>
            <span class="text-gray-700">Ubah Password</span>
          </div>
        </template>
      </card> -->
    </div>

    <div class="bg-white w-full rounded-xl shadow-md mt-6 p-6 '">
      <component :is="menus[selectedMenu].body"></component> 
    </div>
  </div>
</template>

<style scoped>
.h-custom {
  min-height: calc(100% - 10rem);
}
</style>