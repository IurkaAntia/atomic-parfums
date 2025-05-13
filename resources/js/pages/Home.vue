<script setup lang="ts">
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';

function logout() {
    router.post(route('logout'));
}
</script>

<template>
    <AppLayout>
        <Head title="Home" />

        <div class="flex">
            <h1>
                hello
                <Button :onclick="logout"> Logout</Button>
            </h1>
        </div>
    </AppLayout>
</template>
