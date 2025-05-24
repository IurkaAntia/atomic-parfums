<script setup lang="ts">

import { computed } from 'vue';

const formattedLoc = computed(() =>
    window.location.pathname.replaceAll('/', ' ').trim().toUpperCase()
);
</script>

<template>
    <div v-if="formattedLoc !== 'HOME' " class="min-w-sm max-w-lg">
        <div class="md:px-2 lg:px-27 grid grid-cols-2 justify-center ">
            <div class="flex justify-center">
                <a href="/home" class="text-gray-500 text-sm">HOME</a>
                <span class=" text-gray-500 text-sm"><span class="px-1">/</span> {{ formattedLoc }}</span>
            </div>
        </div>
    </div>


</template>
