<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Autoplay } from 'swiper/modules';
import { usePage, useForm, Link,router } from '@inertiajs/vue3';
import 'swiper/css';
import 'swiper/css/pagination';
import { SharedData } from '@/types';

const { props } = usePage<SharedData>();
const products = props.products;

const breakpoints = {
    0: { slidesPerView: 1 },
    640: { slidesPerView: 2 },
    1024: { slidesPerView: 4 }
};

const addToWishlist = (productId: number) => {
    const form = useForm({ product_id: productId });
    form.post(route('wishlist.add'), {
        preserveScroll: true,
        onSuccess: () => {
            router.reload({ only: ['wishlist'] });
        },
    });
    // form.post(route('wishlist.add'), {
    //     preserveScroll: true,
    // });
};
</script>

<template>
    <div class="bg-[#f3efe6] py-24">
        <div class="text-center text-lg md:text-xl lg:text-2xl font-light mb-12">
            EXPERIENCE THE NATURAL ESSENCE OF ATOMIC PARFUMS
        </div>

        <Swiper
            :modules="[Autoplay, Pagination]"
            :slides-per-view="4"
            :space-between="30"
            :loop="true"
            :autoplay="{ delay: 7000 }"
            :pagination="{ clickable: true }"
            :breakpoints="breakpoints"
            class="px-5"
        >
            <SwiperSlide
                v-for="product in products"
                :key="product.id"
                class="text-center"
            >
                <div class="relative group">
                    <!-- 🧭 Make image and name clickable -->
                    <Link :href="route('products.show', product.id)">
                        <img
                            :src="`/products/${product.image}`"
                            alt="perfume"
                            class="mx-auto w-60 h-60 object-contain transition-transform group-hover:scale-105"
                        />
                        <div class="mt-4 text-sm font-medium">
                            {{ product.name }}
                        </div>
                    </Link>

                    <div
                        class="absolute top-2 right-5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                    >
                        <button
                            class=" p-2  "
                            aria-label="Add to Wishlist"
                            @click.prevent="addToWishlist(product.id)"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 text-red-500"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mt-2 flex justify-center gap-2 items-center text-sm">
                    <span v-if="product.sale_price" class="font-semibold">₾{{ product.sale_price }}</span>
                    <span v-if="product.sale_price" class="line-through text-gray-400">₾{{ product.price }}</span>
                    <span v-else class="font-semibold">₾{{ product.price }}</span>
                </div>
            </SwiperSlide>
        </Swiper>
    </div>
</template>
