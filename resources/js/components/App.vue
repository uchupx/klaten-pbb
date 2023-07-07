<template>
  <div class="flex flex-wrap">
    <template v-if="!isLogin && !isNotFound">
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="custom-container px-10 py-5 bg-gray-200 overflow-y-auto">
      <router-view></router-view>
    </div>
    </template>
    <template v-else-if="isNotFound">
      <NotFound></NotFound>
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
import NotFound from "../pages/NotFound";
export default {
  name: "App",
  data () {
    return {
      isLogin: false,
      isNotFound: false,
    }
  },
  components: {
    Navbar,
    Sidebar,
    NotFound
  },
  watch: {
    $route(to, from) {
      this.$store.dispatch("titles/setPageTitle", to.meta.title);

      if (to.name) {
        if (to.name == "login") {
          this.isLogin = true
        } else {
          this.isLogin = false
        }
      } else {
        this.isNotFound = true
      }
    },
  },
};
</script>

<style lang="css" scoped>
.custom-container {
  width: calc(100% - 16rem);
  height: calc(100vh - 59px) !important;
}
</style>
<style>
.modal {
  background: rgba(0, 0, 0, 0.5);
}
</style>
