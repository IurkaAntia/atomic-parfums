<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="bg-[#ebe6db]">
        <div class="flex flex-col justify-between p-10">
            <div class="grid grid-cols-2 gap-8">
                <!-- Helpful Links -->
                <div class="flex flex-col gap-4">
                    <p class="font-bold">HELPFUL LINKS</p>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex flex-col gap-1">
                            <Link href="#" class="duration-200 hover:text-gray-400 hover:transition">SHIPPING POLICY </Link>
                            <Link href="#" class="duration-200 hover:text-gray-400 hover:transition">PRIVACY POLICY </Link>
                            <Link href="#" class="duration-200 hover:text-gray-400 hover:transition">TERMS OF SERVICE </Link>
                        </div>
                        <div class="flex flex-col gap-1">
                            <Link href="#" class="duration-200 hover:text-gray-400 hover:transition">FAQ</Link>
                            <Link href="#" class="duration-200 hover:text-gray-400 hover:transition">CONTACT US</Link>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Signup -->
                <div class="flex flex-col gap-4">
                    <div class="flex items-start gap-2">
                        <i class="mt-1">📩</i>
                        <p class="font-bold">NEWSLETTER: BE THE FIRST TO KNOW ABOUT OUR NEW FRAGRANCES, EXCLUSIVE OFFERS AND EVENTS</p>
                    </div>
                    <div class="flex h-10 w-full flex-row items-center border-b border-b-gray-400 px-2 focus-within:border-b-gray-900">
                        <input type="text" placeholder="Enter your email" class="h-10 w-full border-none focus:outline-none" />
                        <i class="ml-2">📧</i>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
    </footer>
</template>

<style scoped></style>
