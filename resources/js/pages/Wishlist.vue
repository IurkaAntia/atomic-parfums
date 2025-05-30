<script setup lang="ts">
import { ref, computed } from 'vue';
import CardItem from '@/components/ui/CardItem.vue';     
import { usePage } from '@inertiajs/vue3';
import { SharedData } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';
const page = usePage<SharedData>();
const wishlistItem = page.props.wishlist || [];

console.log(wishlistItem);


function updateWishlitItem({ wishlist_item_id } ) {
  console.log('Update', wishlist_item_id, 'to quantity')
  // TODO: Call your API via Inertia or Axios to upd
}
function removeWishlistItem({wishlist_item_id}) {
  console.log('Remove', wishlist_item_id)
  // TODO: Call your API via Inertia or Axios to remove from cart
}   
</script>
<template>
    <AppLayout>
    <CardItem
      v-for="item in wishlistItem"
      :key="item.id"
      :item="item"
      mode="wishlist"
      @update="updateWishlitItem"
      @remove="removeWishlistItem"

    />
    </AppLayout>

</template>