<script setup>
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, useForm } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3'
    import Swal from 'sweetalert2';

    const form = useForm({
        name: "",
        skill_id: "",
        project_url: "",
        image: null,
    });
    
    // Props
    defineProps({
        skills: Array
    });

    /**
     * Store Project
     */

     const storeProject = async () =>{
       try {
        await router.post(route('projects.store'), form, {
            onSuccess: page =>{
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    title: page.props.flash.success
                });
                }
        });
       } catch (error) {
            console.log(error);
       }
     }

</script>
<template>
    <Head title="New Project " />
    
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                New Project
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
                <form @submit.prevent="storeProject()" class="p-10 shadow  bg-white rounded">
                    <!-- Select Skills -->
                    <div class="mb-5">
                        <InputLabel 
                            for="skill_id" 
                            value="Skill" 
                        />
                        <select 
                            id="skill_id" 
                            name="skill_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            v-model="form.skill_id"
                        >
                            <option :value="skill.id" v-for="skill in skills" :key="skill.id">{{ skill.name }}</option>
                        </select>
                    </div>
                     <!-- Project Name -->
                     <div class="mb-5">
                        <InputLabel 
                            for="name" 
                            value="Project Name" 
                        />
                        <TextInput 
                            id="name" 
                            type="text" 
                            class="mt-1 block w-full" 
                            v-model="form.name"/>
                        <InputError 
                            class="mt-2" 
                            :message="form.errors.name" 
                        />
                    </div>

                    <!-- Project URL -->
                    <div class="mb-5">
                        <InputLabel 
                            for="project_url" 
                            value="URL" 
                        />
                        <TextInput 
                            id="project_url" 
                            type="text" 
                            class="mt-1 block w-full" 
                            v-model="form.project_url"/>
                        <InputError 
                            class="mt-2" 
                            :message="form.errors.project_url" 
                        />
                    </div>

                    <!-- Image -->
                    <div class="mb-5">
                        <InputLabel 
                            for="image" 
                            value="Image" 
                        />
                        <TextInput 
                            id="image" 
                            type="file" 
                            class="mt-1 block w-full rounded-none" 
                            @input="form.image = $event.target.files[0]"  
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>


                      <!-- Store Btn -->
                      <div class="mt-4 flex items-center">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class=" hover:bg-green-600">
                            Store Project
                        </PrimaryButton>
                    </div>

                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
