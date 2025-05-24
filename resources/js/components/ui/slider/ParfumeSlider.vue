<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Autoplay } from 'swiper/modules'; // ✅ import modules

import 'swiper/css';
import 'swiper/css/pagination';


const breakpoints = {
    0: { slidesPerView: 1 },
    640: { slidesPerView: 2 },
    1024: { slidesPerView: 4 }
};
</script>
<template>
    <div class="bg-[#f3efe6] py-24">
        <div class="text-center text-lg md:text-xl lg:text-2xl font-light mb-12">
            EXPERIENCE THE NATURAL ESSENCE OF ATOMIC PARFUMS
        </div>

        <Swiper
            :modules="[Autoplay, Pagination]"
            :slides-per-view="4"
            :space-between="30"
            :loop="true"
            :autoplay="{ delay: 7000 }"
            :pagination="{
                clickable: true,
            }"
            :breakpoints="breakpoints"
            class="px-5"
        >
            <SwiperSlide
                v-for="n in 8"
                :key="n"
                class="text-center"
            >
                <img
                    :src="`/products/${n}.png`"
                    alt="perfume"
                    class="mx-auto w-60 h-60 object-contain"
                />
                <div class="mt-4 text-sm font-medium">LOREM IPSUM DOLOR SIT</div>
                <div class="mt-2 flex justify-center gap-2 items-center text-sm">
                    <span class="font-semibold">₾49.00</span>
                    <span class="line-through text-gray-400">₾60.00</span>
                </div>
            </SwiperSlide>
        </Swiper>
    </div>
</template>
