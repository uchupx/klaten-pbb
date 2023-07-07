<template>
    <!-- component -->
    <aside class="flex flex-col w-64 custom-h-screen static px-5 py-8 overflow-y-auto bg-gray-800 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
        <div class="flex flex-col justify-between flex-1 mt-3">
            <nav class="-mx-3 space-y-6 ">
				<div class="space-y-3 ">
					<template v-for="item in items" :key="'route'+ item.name">
                        <div v-if="!item.meta.hide" @click="item.items.length > 0 ? item.isShow = !item.isShow : null">
                            <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 border-gray-800 border hover:border-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-300" :href="item.items.length > 0 ? '#' : item.path">
                            <component :is="item.meta.icon" class="w-5 h-5"></component>
                            <span class="mx-2 text-sm font-medium">{{item.meta.title}}</span>
                            </a>
                        </div>
                        <div v-if="item.items.length > 0 && item.isShow">
                            <template v-for="child in item.items" :key="'route'+ child.name"> 
                                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 border-gray-800 border hover:border-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-300" :href="child.path">
                                    <span class="mx-2 text-xs font-medium pl-5">{{child.meta.title}}</span>
                                </a>
                            </template>
                        </div>
			        </template>
                </div>
            </nav>
        </div>
    </aside>
</template>

<script>
export default {
    created() {
        this.$router.options.routes.forEach(route => {
            if (route.meta.parent) {
                this.items[route.meta.parent].items.push({
                    name: route.name,
                    path: route.path,
                    meta: route.meta,
                })
            } else {
                this.items[route.name] = {
                    name: route.name,
                    path: route.path,
                    meta: route.meta,
                    isShow: false,
                    items: []
                }
            }

        })
    }
    , data() {
        return {
            items: {}
        }
    }
}
</script>
<style scoped>
.custom-h-screen {
  height: calc(100vh - 59px) !important;
}
</style> 