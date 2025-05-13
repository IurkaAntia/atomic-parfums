<template>
    <div class="relative flex items-center justify-center">
        <!-- Trigger -->
        <i :class="icon" class="cursor-pointer" @click="openSidebar"></i>
        <span
            v-if="count > 0"
            class="absolute -top-2 -right-2 flex h-4 w-4 items-center justify-center rounded-full bg-gray-800 text-xs text-white"
        >
      {{ count }}
    </span>

        <!-- Dimmed Background -->
        <div
            v-show="isOpen"
            @click="closeSidebar"
            class="fixed inset-0 z-40 bg-black/10 backdrop-brightness-50 transition-opacity duration-500"
        ></div>

        <!-- Sidebar Panel -->
        <div
            class="fixed top-0 right-0 z-50 h-full w-80 max-w-sm bg-white shadow-xl p-6 transition-transform duration-500 ease-in-out"
            :class="isOpen ? 'translate-x-0' : 'translate-x-full'"
        >
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">{{ title }}</h2>
                <button @click="closeSidebar" class="text-xl hover:text-gray-500">&times;</button>
            </div>

            <ul class="space-y-3">
                <li
                    v-for="item in items"
                    :key="item.id"
                    class="text-sm"
                >
                    {{ item.name }} <span v-if="item.qty">— Qty: {{ item.qty }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    title: { type: String, required: true },
    items: { type: Array, default: () => [] },
    icon: { type: String, default: 'dl-icon-cart' },
    count: { type: Number, default: 0 }
});

const isOpen = ref(false);

const openSidebar = () => {
    isOpen.value = true;
};

const closeSidebar = () => {
    isOpen.value = false;
};
</script>
