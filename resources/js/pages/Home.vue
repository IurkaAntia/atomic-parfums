<script setup lang="ts">


import { Head,router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
function logout() {
    router.post(route('logout'));
}

</script>

<template>
    <AppLayout>
        <Head title="Home"/>

        <div class="flex ">
            <h1>
                hello
            <Button :onclick="logout">
                Logout
            </Button>
        </h1>
    </div>
    </AppLayout>
</template>
