<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>
<template>
    <Head title="New Skill " />
    
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                New Skill
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <form @submit.prevent="">
                         
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
