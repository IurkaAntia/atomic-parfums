<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import { Autoplay, Pagination } from 'swiper/modules';
</script>

<template>
    <Swiper
        :modules="[Autoplay, Pagination]"
        :slides-per-view="1"
        :loop="true"
        :autoplay="{ delay: 5000 }"
        :pagination="{
            clickable: true,
        }"
        class="w-full"
    >
        <SwiperSlide>
            <img src="/slider/1.jpg" alt="Slide 1" class="w-full h-[60vh] object-cover" />
        </SwiperSlide>
        <SwiperSlide>
            <img src="/slider/2.jpg" alt="Slide 2" class="w-full h-[60vh] object-cover" />
        </SwiperSlide>
        <SwiperSlide>
            <img src="/slider/3.jpg" alt="Slide 3" class="w-full h-[60vh] object-cover" />
        </SwiperSlide>
    </Swiper>
</template>

<style scoped>

</style>
