<script setup lang="ts">
    import { ref } from 'vue';
    import { computed } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import  Button  from '@/components/ui/button/Button.vue';
    import { router } from '@inertiajs/vue3';

    const goToPage = (page: string) => {
        router.visit(route(page));
    };


    const props = defineProps({
        title: { type: String, required: true },
        items: { type: Array, default: () => [] },
        icon: { type: String, default: 'dl-icon-cart' },
        count: { type: Number, default: 0 },
        type: { type: String, default: 'cart' }
    });


    const isOpen = ref(false);
    const isSubmitted = ref(false);

    const removeItem = (itemId: number) => {
        if (isSubmitted.value) return;
        isSubmitted.value = true;

        const form = useForm({});
        const routeName = props.type === 'wishlist' ? 'wishlist.remove' : 'cart.remove';

        form.delete(route(routeName, itemId), {
            preserveState: true,
            preserveScroll: true,
            onFinish: () => {
                isSubmitted.value = false;
            },
            onSuccess: () => {
                form.reset();
            },
        });
    };


    const total = computed(() => {
        if (props.type !== 'cart') return 0;
        
        return props.items.reduce((sum, item) => {
            if (!item.product) return sum;

            const price = item.product.sale_price ?? item.product.price;
            const quantity = item.quantity ?? 1;
            return sum + price * quantity;
        }, 0);
    });


    const openSidebar = () => {
        isOpen.value = true;
    };

    const closeSidebar = () => {
        isOpen.value = false;
    };
</script>

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
            <div class="flex justify-end items-center mb-4">

                <!-- <button @click="closeSidebar" class="text-xl hover:text-gray-500">&times;</button> -->
                <i
                            class="dl-icon-close transform cursor-pointer text-black transition-transform duration-300 hover:rotate-90 hover:text-gray-700"
                            @click="closeSidebar"
                        ></i>
            </div>


            <div class="overflow-y-auto max-h-[50vh] pr-2 space-y-3">
                <ul>
                    <li
                        v-for="item in items"
                        :key="item.id"
                        class="text-sm flex justify-between items-center py-2"
                    >
                        <div class="flex flex-row">
                            <img :src="`/products/${item.product.image}`" alt="Product Image" class="w-20 h-20 object-cover rounded-full mr-2" />
                            <div class="flex flex-col">
                                <span v-if="item.product">{{ item.product.name }}</span>
                                <span v-else>{{ item.name }}</span>
                                <span v-if="item.quantity" class="text-md font-bold">
                                    {{ item.quantity }} X ₾{{ item.product.sale_price ? item.product.sale_price : item.product.price }}
                                </span>
                            </div>
                        </div>
                        <button
                            @click="removeItem(item.id)"
                            class="dl-icon-close text-gray-400 hover:text-gray-500 transition text-lg"
                            aria-label="Remove"
                        ></button>
                    </li>
                </ul>
            </div>
            <div>
                <div v-if="type === 'cart'" class="mt-4 pt-4 flex justify-between items-center">
                    <span class="text-lg text-gray-800 ">Subtotal:</span>
                    <span class="text-lg text-gray-800">₾{{ total }}</span>
                </div>
                <div v-if="type === 'cart'" class=" flex flex-col mt-10 space-y-4 items-center">
                    <Button @click="" class="w-full">
                        CHECKOUT
                    </Button>
                   <Button @click="goToPage('cart.index')" class="w-full">
                        VIEW CART
                    </Button>
                </div>
                <div v-if="type === 'wishlist'" class=" flex flex-col mt-10 space-y-4 items-center">
                    <Button @click="goToPage('wishlist.index')" class="w-full">
                        VIEW WISHLIST
                    </Button>

                </div>
            </div>

        </div>
    </div>
</template>


