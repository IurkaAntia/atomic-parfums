<script setup lang="ts">
import AppFooter from '@/components/AppFooter.vue';
import AppHeader from '@/components/AppHeader.vue';
// import type { BreadcrumbItemType } from '@/types';

// interface Props {
//     breadcrumbs?: BreadcrumbItemType[];
// }
</script>

<template>
    <div></div>
    <div>
        <AppHeader />
        <slot />
        <AppFooter />
    </div>
</template>
