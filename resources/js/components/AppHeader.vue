<script setup lang="ts">
import { BreadcrumbItem } from '@/types';
import { Link } from '@inertiajs/vue3';

const navs: BreadcrumbItem[] = [
    {
        title: 'THE HOUSE',
        href: '/home',
    },
    {
        title: 'PARFUMS',
        href: '/products',
    },
    {
        title: 'SAMPLES',
        href: '/products',
    },
    {
        title: 'JOURNAL',
        href: '/products',
    },
];
</script>
<template>
    <header class="sticky top-0 z-50 bg-[#f0ece4] p-5">
        <div class="grid grid-cols-2 items-center lg:grid-cols-3">
            <!-- Breadcrumbs -->
            <div class="hidden justify-center space-x-10 lg:flex">
                <div v-for="nav in navs" :key="nav.href">
                    <div class="text-sm font-light duration-200 hover:text-gray-400 hover:transition">
                        <Link :href="nav.href">{{ nav.title }}</Link>
                    </div>
                </div>
            </div>

            <!-- Logo -->
            <div class="col-span-1 flex justify-start lg:justify-center">
                <div class="h-24 w-32 sm:h-32 sm:w-40">
                    <Link :href="route('home')">
                        <img src="/img/logo.svg" alt="logo" class="h-full w-full object-contain" />
                    </Link>
                </div>
            </div>

            <!-- Icons -->
            <div class="col-span-1 flex items-center justify-end space-x-3 text-xl sm:space-x-4">
                <i class="dl-icon-search hover:cursor-pointer"></i>
                <i class="dl-icon-user hover:cursor-pointer"></i>
                <div class="relative">
                    <i class="dl-icon-cart hover:cursor-pointer"></i>
                    <span class="absolute -top-2 -right-2 flex h-4 w-4 items-center justify-center rounded-full bg-gray-800 text-xs text-white"
                        >2</span
                    >
                </div>
                <div class="relative">
                    <i class="dl-icon-heart hover:cursor-pointer"></i>
                    <span class="absolute -top-2 -right-2 flex h-4 w-4 items-center justify-center rounded-full bg-gray-800 text-xs text-white"
                        >2</span
                    >
                </div>
                <div class="lg:hidden">
                    <i class="dl-icon-menu hover:cursor-pointer"></i>
                </div>
            </div>
        </div>
    </header>
</template>
