<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';

// Define a reactive map for quantities
const qty = reactive<{ [key: number]: number }>({});

const cartForm = useForm({
    product_id: null as number | null,
    quantity: 1,
});

const addToCart = (productId: number, qty: number = 1) => {
    cartForm.product_id = productId;
    cartForm.quantity = qty;

    cartForm.post(route('cart.add'), {
        preserveScroll: true,
    });
};

const props = defineProps<{
    product: {
        id: number;
        name: string;
        description: string;
        price: number;
    };
    inWishlist: boolean;
    isAuthenticated: boolean;
}>();

const form = useForm({ product_id: props.product.id });

const addToWishlist = () => {
    form.post('/wishlist/add', {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout>
        <div class="mx-auto max-w-xl p-4">
            <h1 class="text-2xl font-bold">{{ product.name }}</h1>
            <p class="mb-4 text-gray-600">{{ product.description }}</p>
            <p class="mb-6 text-lg font-semibold">${{ product.price }}</p>

            <button
                v-if="isAuthenticated"
                @click="addToWishlist"
                :disabled="inWishlist"
                class="rounded bg-blue-600 px-4 py-2 text-white disabled:opacity-50"
            >
                {{ inWishlist ? 'In Wishlist' : 'Add to Wishlist' }}
            </button>

            <p v-else class="text-sm text-gray-500">Log in to add to wishlist</p>

            <input v-model.number="qty[product.id]" type="number" min="1" class="mr-2 w-16 rounded border p-1" />
            <button @click.prevent="addToCart(product.id, qty[product.id] || 1)">Add to Cart</button>
        </div>
    </AppLayout>
</template>
