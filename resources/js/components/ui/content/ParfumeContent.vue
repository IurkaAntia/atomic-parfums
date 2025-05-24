<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="">
    <!-- Image Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      <!-- Image with Text Overlay -->
      <div class="relative flex justify-center px-10">
        <img class="object-cover rounded-lg shadow-md" src="/slider/4.jpg" alt="Image 4">
        <div class="absolute inset-0 flex items-center justify-center bg-opacity-50 rounded-lg">
          <p class="text-white text-lg font-semibold">Image 1</p>
        </div>
      </div>

      <div class="relative flex justify-center px-10">
        <img class="object-cover rounded-lg shadow-md" src="/slider/5.jpg" alt="Image 5">
        <div class="absolute inset-0 flex items-center justify-center bg-opacity-50 rounded-lg">
          <p class="text-white text-lg font-semibold">Image 2</p>
        </div>
      </div>

      <div class="relative flex justify-center px-10">
        <img class="object-cover rounded-lg shadow-md" src="/slider/6.jpg" alt="Image 6">
        <div class="absolute inset-0 flex items-center justify-center bg-opacity-50 rounded-lg">
          <p class="text-white text-lg font-semibold">Image 3</p>
        </div>
      </div>
    </div>

    <!-- View All Link -->
    <div class="flex justify-center m-12">
      <a
        href="#"
        class="text-gray-900 border-b-1 border-gray-200 hover:border-gray-700 pb-1 transition duration-300 ease-in-out"
      >
        View All
      </a>
    </div>
  </div>
</template>

<style scoped>

</style>
