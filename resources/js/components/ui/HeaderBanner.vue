<script setup lang="ts">
import { ref } from 'vue';

const showBanner = ref(true);
</script>

<template>
    <div v-if="showBanner" class="relative w-full bg-[#605e5b]">
        <p class="py-1 text-center text-[12px] text-gray-100">ENJOY 2 COMPLIMENTARY SAMPLES WITH YOUR PURCHASE OF A 90ML
            FRAGRANCE | FREE SHIPPING</p>
        <i
            class="dl-icon-close absolute top-1 right-2 transform cursor-pointer text-white transition-transform duration-300 hover:rotate-90 hover:text-gray-200"
            @click="showBanner = false"
        ></i>
    </div>
</template>

<style scoped>

</style>
