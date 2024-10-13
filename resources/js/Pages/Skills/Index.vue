<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    /**
     * Define Props
     */
    defineProps({
        skills: Object,
    });

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
                    <Link :href="route('skills.create')" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                        New  Skill
                    </Link>
                </div>
                <!-- Table -->
                 
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="skills.data" v-for="(skill, i) in skills.data" :key="skill.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ i+1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ skill.name }}
                                </td>
                                <td class="px-6 py-4">
                                    <img :src="skill.image" :alt="skill.name" class="w-16 h-16 rounded-full">
                                </td>
                                <td class="px-6 py-4">

                                    <Link :href="route('skills.edit', skill.id)" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</Link>

                                    <Link :href="route('skills.destroy', skill.id)" method="delete" as="button" class="mx-2 focus:outline-none text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</Link>

                                </td>
                            </tr>
                            <tr v-else>
                                <td colspan="4">
                                    <p class="text-center text-blue-600 py-2 text-xl">No List Found</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
