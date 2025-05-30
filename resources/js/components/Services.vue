<script setup lang="ts">
   import { usePage } from '@inertiajs/vue3';
   import { SharedData } from '@/types';

   const page = usePage<SharedData>();
   const services = page.props.services;
</script>


<template>
    <div class="grid grid-cols-5 py-16">
        <div v-for="service in services" :key="service.icon" class="flex flex-col justify-start items-center p-4">
            <img :src="`/img/services/${service.icon}`" alt="service icon" class="w-12">  
            <p class="text-center ">
               {{ service.description.toUpperCase()}}
            </p>
        </div>
    </div>
</template>
