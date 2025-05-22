<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="bg-[#ebe6db]">
        <div class="flex flex-row justify-between p-10 md:flex-col">
            <div class="grid gap-8 md:grid-cols-2">
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
                            <Link href="#" class="hover:transition0000 duration-200 hover:text-gray-400">CONTACT US </Link>
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
                        <i class="dl-icon-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-rows-3 p-8 px-10 md:grid-cols-3 md:justify-center">
            <div class="flex items-center">
                <ul class="flex flex-row gap-4">
                    <li>
                        <img class="h-10 w-10" src="../../../public/img/payment/american_express.svg" alt="american_express" />
                    </li>
                    <li>
                        <img class="h-10 w-10" src="../../../public/img/payment/mastercard.svg" alt="mastercard" />
                    </li>
                    <li>
                        <img class="h-10 w-10" src="../../../public/img/payment/apple-pay.svg" alt="apple_pay" />
                    </li>
                    <li>
                        <img class="h-10 w-10" src="../../../public/img/payment/visa.svg" alt="visa" />
                    </li>
                    <li>
                        <img class="h-10 w-10" src="../../../public/img/payment/paypal.svg" alt="paypal" />
                    </li>
                </ul>
            </div>
            <div class="flex flex-row items-center md:justify-center lg:flex-col">
                <p class="text-sm text-gray-500">
                    Copyright © 2025 Created By
                    <a href="https://github.com/IurkaAntia/atomic-parfums" _blank class="duration-200 hover:text-gray-400 hover:transition">
                        Iuri Antia.
                    </a>
                </p>
            </div>
            <div class="flex items-center gap-2 py-2 md:justify-end">
                <i class="fa fa-facebook"> </i>
                <i class="fa fa-instagram"> </i>
                <i class="fa fa-pinterest"> </i>
                
            </div>
        </div>
    </footer>
</template>
<style scoped></style>
