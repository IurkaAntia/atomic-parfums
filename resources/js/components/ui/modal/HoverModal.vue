<!-- components/HoverModal.vue -->
<template>
    <div
        class="relative inline-block "
        @mouseenter="isOpen = true"
        @mouseleave="isOpen = false"
    >
        <!-- Trigger slot (e.g., icon) -->
        <slot name="trigger"></slot>

        <!-- Transitioned Modal -->
        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-2"


        >
            <div
                v-if="isOpen"
                class="absolute top-full left-1/2 -translate-x-1/2 p-3 bg-white border-none shadow-md z-50"

            >
                <slot />
            </div>
        </transition>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

let isOpen = ref(false);
</script>
