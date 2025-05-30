<script setup lang="ts">
import AppFooter from '@/components/AppFooter.vue';
import AppHeader from '@/components/AppHeader.vue';
import Services from '@/components/Services.vue';
</script>

<template>
    <AppHeader />
    <slot />
    <Services/>
    <AppFooter />
</template>
