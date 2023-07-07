<template>
  <div class="flex flex-col rounded-xl p-5 mt-5 bg-white h-custom gap-3">
    <!-- <span>Tagihan Per NOP</span> -->
    <span>Input NOP</span>
    <div class="flex flex-col w-full gap-2">
      <div class="flex flex-row gap-3 items-center">
        <div class="w-16">NOP</div>
        <input
          type="text"
          name=""
          placeholder="NOP"
          class="px-3 py-2 mb-2 bg-white border border-gray-200 rounded shadow-sm"
          id=""
        >
      </div>
      <div class="flex flex-row gap-3 items-center">
        <div class="w-16">Tahun</div>
        <input
          type="text"
          name=""
          placeholder="Tahun"
          class="px-3 py-2 mb-2 bg-white border border-gray-200 rounded shadow-sm"
          id=""
        >
      </div>
    </div>

    <div class="h-auto border rounded-md p-3">
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Kabupaten/Kota</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">NOP</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Tahun Pajak</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Nama Wajib Pajak</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Alamat</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Kecamatan</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Kelurahan</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Rt/Rw</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Luas Bumi</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Luas Bangunan</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Tanggal Jatuh Tempo</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Pokok</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Denda</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Jumlah Bayar</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Tanggal Bayar</div>
        <div class="">: </div>
      </div>
      <div class="flex flex-row gap-3 text-sm">
        <div class="w-32 text">Status Pembayaran</div>
        <div class="">: </div>
      </div>
    </div>
  </div>
</template>
<script>
import Card from "../../components/Card";

export default {
  components: {
    Card
  }
}
</script>

<style scoped>
.h-custom {
  min-height: calc(100% - 10rem);
}
</style>