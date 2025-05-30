<script setup lang="ts">
import HeaderBanner from '@/components/ui/HeaderBanner.vue';
import Location from '@/components/ui/Location.vue';
import HoverModal from '@/components/ui/modal/HoverModal.vue';
import SidebarModal from '@/components/ui/modal/SidebarModal.vue';
import { BreadcrumbItem, SharedData } from '@/types';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const page = usePage<SharedData>();

const user = computed(() => page.props.auth?.user);
const wishlist = computed(() => page.props.wishlist);
const cart = computed(() => page.props.cart);
const form = useForm<any>();

const logout = () => {
    form.post(route('logout'));
};
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
    <HeaderBanner />
    <header class="sticky top-0 z-50 bg-[#f1ede5] p-5">
        <div class="grid grid-cols-2 items-center lg:grid-cols-3">
            <!-- Breadcrumbs -->
            <div class="hidden justify-center space-x-10 lg:flex">
                <div v-for="nav in navs" :key="nav.href">
                    <div class="px-2 text-sm font-light duration-200 hover:text-gray-400 hover:transition">
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
            <div class="flex items-center justify-end space-x-3 text-xl sm:space-x-4">
                <!-- Language Switcher -->
                <HoverModal>
                    <template #trigger>
                        <div class="flex h-full items-center justify-center">
                            <span class="px-2 text-center text-sm">EN</span>
                        </div>
                    </template>
                    <div class="flex flex-col gap-2 text-center text-sm text-gray-800">
                        <a href="/register" class="cursor-pointer duration-200 hover:text-gray-400 hover:transition">GE</a>
                    </div>
                </HoverModal>

                <!-- Search Icon -->
                <div class="flex h-full items-center justify-center">
                    <i class="dl-icon-search hover:cursor-pointer"></i>
                </div>

                <!-- User Icon -->
                <HoverModal>
                    <template #trigger>
                        <div class="flex h-full items-center justify-center">
                            <i class="dl-icon-user text-xl hover:cursor-pointer"></i>
                        </div>
                    </template>

                    <div class="flex flex-col gap-2 py-2 text-center text-sm text-gray-800">
                        <template v-if="user">
                            <p>{{ user.name }}</p>
                            <a :onclick="logout" class="cursor-pointer duration-200 hover:text-gray-400 hover:transition">LOGOUT</a>
                        </template>
                        <template v-else>
                            <a href="/login" class="cursor-pointer duration-200 hover:text-gray-400 hover:transition">LOGIN</a>
                            <a href="/register" class="cursor-pointer duration-200 hover:text-gray-400 hover:transition">REGISTER</a>
                        </template>
                    </div>
                </HoverModal>

                <!-- Cart Icon -->
                <SidebarModal title="Your Cart" :items="cart || []" :count="Array.isArray(cart) ? cart.length : ''" icon="dl-icon-cart" type="cart" />

                <!-- Wishlist Icon -->
                <SidebarModal
                    title="Your Wishlist"
                    :items="wishlist || []"
                    :count="Array.isArray(wishlist) ? wishlist.length : ''"
                    icon="dl-icon-heart"
                    type="wishlist"
                />
                <!-- Mobile Menu Icon -->
                <div class="flex items-center justify-center lg:hidden">
                    <i class="dl-icon-menu hover:cursor-pointer"></i>
                </div>
            </div>
        </div>
    </header>
    <Location />
</template>
