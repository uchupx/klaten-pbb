<template>
  <div class="bg-gray-200 rounded-xl h-56">
      <div class="flex flex-col p-8 rounded-xl bg-white shadow-xl transform translate-x-5 translate-y-4 w-96 md:w-auto h-56">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Ice_logo.svg/138px-Ice_logo.svg.png?20191213230535" class="w-8">
          <div class="mt-3 font-semibold text-lg">Ice Mobile 10GB</div>
          <div class="text-sm font-light">Up to 100Mbit/s</div>
          <div class="my-4">
              <span class="font-bold text-base">299,-</span>
              <span class="font-light text-sm">/month</span>
          </div>
          <button class="bg-gray-300 px-4 py-3 rounded-full  border  shadow-xl mt-4">
              Add subscription
          </button>
      </div>
  </div>
</template>

<script>
export default {
  name:"Card"
}
</script>