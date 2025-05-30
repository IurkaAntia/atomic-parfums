
<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';

// Props
const props = defineProps<{
  product: {
    id: number;
    name: string;
    description: string;
    extraDescription?: string;
    price: number;
    sale_price?: number;
    image: string;
    gallery: string[];
    notes: string[];
    sizes: string[];
  };
  inWishlist: boolean;
  isAuthenticated: boolean;
}>();

// Reactive state
// const selectedNote = ref(props.product.notes[0] || '');
// const selectedSize = ref(props.product.sizes[0] || '');
const quantity = ref(1);


// Add to Cart
const cartForm = useForm({
  product_id: props.product.id,
  quantity: quantity.value,
});

const addToCart = () => {
  cartForm.product_id = props.product.id;
  cartForm.quantity = quantity.value;

  cartForm.post(route('cart.add'), {
    preserveScroll: true,
  });
};

// Add to Wishlist
const wishlistForm = useForm({
  product_id: props.product.id,
});

const addToWishlist = () => {
  wishlistForm.post(route('wishlist.add'), {
    preserveScroll: true,
  });
};
</script>

<template>
    <AppLayout>
  <div class="grid items-center grid-cols-1 md:grid-cols-3 gap-8 p-8 min-h-screen">
    <!-- Left: Text Description -->
    <div class="col-span-1">
      <h1 class="text-2xl font-bold mb-4">{{ product.name }}</h1>
      <p class="mb-4 text-gray-700">{{ product.description }}</p>
      <p class="text-gray-500">{{ product.extraDescription }}</p>
    </div>

    <!-- Center: Image and Gallery -->
    <div class="col-span-1 flex flex-col items-center">
      <img :src="product.image" alt="product" class="w-60 h-60 object-cover mb-4" />
      <div class="flex space-x-2">
        <img
          v-for="(img, i) in product.gallery"
          :key="i"
          :src="img"
          class="w-12 h-12 object-cover border border-gray-300 rounded"
        />
      </div>
    </div>

    <!-- Right: Options and Actions -->
    <div class="col-span-1 space-y-4">
      <h1 class="text-2xl font-bold">{{ product.name }}</h1>

      <!-- Notes Dropdown -->
      <!-- <div>
        <label class="text-sm font-semibold">Main Notes</label>
        <select v-model="selectedNote" class="w-full border p-2 rounded mt-1">
          <option v-for="note in product.notes" :key="note">{{ note }}</option>
        </select>
      </div> -->

      <!-- Sizes -->
     <!--  <div class="flex space-x-2">
        <button
          v-for="size in product.sizes"
          :key="size"
          @click="selectedSize = size"
          :class="[
            'px-4 py-2 border rounded',
            selectedSize === size ? 'bg-black text-white' : 'bg-white text-black'
          ]"
        >
          {{ size }}
        </button>
      </div> -->

      <!-- Quantity -->
      <div class="flex items-center space-x-2">
        <span>Quantity:</span>
        <button @click="quantity = Math.max(1, quantity - 1)" class="px-2 border">-</button>
        <span>{{ quantity }}</span>
        <button @click="quantity++" class="px-2 border">+</button>
      </div>

      <!-- Price -->
        <div class="text-2xl font-bold text-black">
          ₾{{ Number(product.sale_price ?? product.price).toFixed(2) }}
          <span
            v-if="product.sale_price"
            class="line-through text-gray-400 ml-2 text-base"
          >
            ₾{{ Number(product.price).toFixed(2) }}
          </span>
        </div>


      <!-- Actions -->
      <div class="flex flex-col space-y-2">
        <button @click="addToCart" class="bg-black text-white py-2 rounded">ADD TO CART</button>
        <button @click="addToWishlist" :disabled="inWishlist"  class="border border-black text-black py-2 rounded">
          {{ inWishlist ? '✓ IN WISHLIST' : '♡ ADD TO WISHLIST' }}
        </button>
      </div>
    </div>
  </div>
  </AppLayout>
</template>
