<script setup lang="ts">
import ParfumeContent from '@/components/ui/content/ParfumeContent.vue';
import ParfumeSlider from '@/components/ui/slider/ParfumeSlider.vue';
import Slider from '@/components/ui/slider/Slider.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

// const { props } = usePage<SharedData>();
// console.log(props.products);
// console.log(products);
</script>

<template>
    <Head title="Home" />
    <AppLayout>
        <div class="flex flex-col">
            <Slider />
            <ParfumeSlider />
            <ParfumeContent />
        </div>
    </AppLayout>
</template>
