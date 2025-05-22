<script setup lang="ts">
import { Button } from '@/components/ui/button';
import ParfumeSlider from '@/components/ui/slider/ParfumeSlider.vue';
import Slider from '@/components/ui/slider/Slider.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';

function logout() {
    router.post(route('logout'));
}
</script>

<template>
    <Head title="Home" />
    <AppLayout>
        <div class="flex flex-col">
            <Slider />
            <ParfumeSlider />
            <div></div>
            <div></div>
            <Button :onclick="logout"> Logout</Button>
        </div>
    </AppLayout>
</template>
