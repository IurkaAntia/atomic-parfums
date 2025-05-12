<script setup lang="ts">

import { Head, Link, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import Input from '@/components/ui/input/Input.vue';
import AuthSimpleLayout from '@/layouts/auth/AuthSimpleLayout.vue';
import Checkbox from '@/components/ui/checkbox/Checkbox.vue';
import AppLayout from '@/layouts/AppLayout.vue';


defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AppLayout>

    <AuthSimpleLayout title="LOGIN INTO YOUR ACC">

        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email">Email address</Label>
                    <Input
                        class="h-14 "
                        id="email"
                        type="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        v-model="form.email"
                        placeholder="email@example.com"
                    />

                </div>

                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <Input
                        class="h-14"
                        id="password"
                        type="password"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        v-model="form.password"
                        placeholder="Password"
                    />

                </div>

                <div class="flex items-center justify-between">
                    <Label for="remember" class="flex items-center space-x-3">
                        <Checkbox class="rounded-none"></Checkbox>
                        <span>Remember me</span>
                    </Label>
                </div>

                <Button type="submit" class="mt-4 w-full rounded-none" :tabindex="4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Log in
                </Button>

                <div class="flex justify-center text-gray-400">
                    <Link :href="route('password.request')">
                        Forgot your password?
                    </Link>
                </div>

                <Button class=" w-full rounded-none" onclick="route('register')">

                    Create an account
                </Button>
            </div>

        </form>
    </AuthSimpleLayout>
    </AppLayout>
</template>
