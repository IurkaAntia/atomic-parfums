<script setup lang="ts">
import { ref, computed } from 'vue';
import CardItem from '@/components/ui/CardItem.vue';     
import { usePage } from '@inertiajs/vue3';
import { SharedData } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';
const page = usePage<SharedData>();
const cartItems = page.props.cart || [];

console.log(cartItems);


function updateCartItem({ cart_item_id, quantity }) {
  console.log('Update', cart_item_id, 'to quantity', quantity)
  // TODO: Call your API via Inertia or Axios to update the cart
}

function removeCartItem(cart_item_id) {
  console.log('Remove', cart_item_id)
  // TODO: Call your API via Inertia or Axios to remove from cart
}   
</script>
<template>
    <AppLayout>
    <CardItem
      v-for="item in cartItems"
      :key="item.id"
      :item="item"
      mode="cart"
      @update="updateCartItem"
      @remove="removeCartItem"
    />
    </AppLayout>

</template>