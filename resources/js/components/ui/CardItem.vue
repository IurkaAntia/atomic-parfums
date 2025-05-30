<template>
  <div class="flex items-start gap-4 border-b py-4">
    <!-- Product Image -->
    <img
      :src="`/products/${item.product.image}`"
      alt="Product image"
      class="w-24 h-24 object-cover rounded shadow"
    />

    <!-- Info -->
    <div class="flex-1">
      <h2 class="text-lg font-semibold">
        {{ item.product.name.trim() }}
      </h2>
      <p class="text-sm text-gray-500">{{ item.product.description }}</p>

      <div v-if="mode=='cart'" class="mt-2">
        <span v-if="item.product.sale_price">
          <span class="text-red-500 line-through mr-2">${{ item.product.price }}</span>
          <span class="text-green-600 font-bold">${{ item.product.sale_price }}</span>
        </span>
        <span v-else class="text-gray-800 font-bold">${{ item.product.price }}</span>
      </div>

      <!-- Only show quantity input in cart mode -->
      <div v-if="mode === 'cart'" class="mt-2 flex items-center gap-2">
        <label class="text-sm text-gray-700">Qty:</label>
        <input
          type="number"
          v-model.number="localQuantity"
          min="1"
          class="w-16 border rounded p-1 text-center"
          @change="emitUpdate"
        />
      </div>
    </div>

    <!-- Total + Remove -->
    <div class="text-right">
      <p v-if="mode === 'cart'" class="font-semibold">${{ totalPrice }}</p>
      <button
        @click="removeItem"
        class="text-sm text-red-600 hover:underline mt-2"
      >
        Remove from {{ mode === 'cart' ? 'Cart' : 'Wishlist' }}
      </button>
    </div>
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue'

const props = defineProps({
  item: Object,
  mode: {
    type: String,
    default: 'cart', // or 'wishlist'
  },
})

const emit = defineEmits(['update', 'remove'])

const localQuantity = ref(props.item.quantity)

watch(() => props.item.quantity, (newQty) => {
  localQuantity.value = newQty
})

const totalPrice = computed(() => {
  const price = props.item.product.sale_price || props.item.product.price
  return (price * localQuantity.value).toFixed(2)
})

function emitUpdate() {
  emit('update', {
    id: props.item.id,
    quantity: localQuantity.value,
  })
}

function removeItem() {
  emit('remove', props.item.id)
}
</script>
