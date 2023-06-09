<template>
  <div class="flex flex-wrap">
    <template v-if="!isLogin">
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="custom-container px-10 py-5 bg-gray-200">
      <router-view></router-view>
    </div>
    </template>
    <template v-else>
      <router-view></router-view>
    </template>
  </div>
</template>

<script>
import { watch } from "vue";
import Navbar from "./Navbar";
import Sidebar from "./Sidebar";
export default {
  name: "App",
  data () {
    return {
      isLogin: false
    }
  },
  components: {
    Navbar,
    Sidebar,
  },
  watch: {
    $route(to, from) {
      this.$store.dispatch("titles/setPageTitle", to.meta.title);
      if (to.name == "login") {
        this.isLogin = true
      } else {
        this.isLogin = false
      }
    },
  },
};
</script>

<style lang="css" scoped>
  .custom-container {
    width: calc(100% - 16rem);
  }
</style>
