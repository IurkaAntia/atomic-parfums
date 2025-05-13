<script setup lang="ts">
// import AppLogoIcon from '@/components/AppLogoIcon.vue';
// import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>
<template>
    <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-8">
        <div class="w-full max-w-lg min-w-1/4">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center">
                    <!--                    <Link :href="route('home')" class="flex flex-col items-center gap-2 font-medium">-->
                    <!--                        <div class="mb-1 flex h-32 w-32 items-center justify-center rounded-md">-->
                    <!--                        </div>-->
                    <!--                        <span class="sr-only">{{ title }}</span>-->
                    <!--                    </Link>-->
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-medium">{{ title }}</h1>
                        <p class="text-muted-foreground text-center text-sm">{{ description }}</p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
