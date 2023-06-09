<template>
<div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">
  <!-- Login component -->
  <div class="flex shadow-md">
    <!-- Login form -->
    <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
      <div class="w-72">
        <!-- Heading -->
        <h1 class="text-xl font-semibold">Selamat Datang</h1>
        <small class="text-gray-400">Pemerintah Kabupaten Klaten BPKAD Kabupaten Klaten</small>

        <!-- Form -->
        <form class="mt-4">
          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Email</label>
            <input type="email" placeholder="Enter your email" class=" p-2 block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
          </div>

          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Password</label>
            <input type="password" placeholder="*****" class=" p-2 block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
          </div>

          <div class="mb-3">
            <button class="mb-1.5 block w-full text-center text-white bg-yellow-500 hover:bg-yellow-700 px-2 py-3 rounded-md">Sign in</button>
          </div>
        </form>

    
      </div>
    </div>

    <!-- Login banner -->
    <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
      <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="https://i.imgur.com/9l1A4OS.jpeg">
    </div>

  </div>

  <!-- Credit -->
  <div class="mt-3 w-full">
      <p class="text-center text-gray-600 text-small italic">Catatan, Aplikasi ini hanya bisa di akses oleh Petugas PBB, Lurah dan Kelapa Desa<br>

      </p>
  </div>
</div>
</template>