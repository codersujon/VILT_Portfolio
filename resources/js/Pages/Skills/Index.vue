<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Skills " />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Skills
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('skills.create')" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">
                        New  Skill
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
