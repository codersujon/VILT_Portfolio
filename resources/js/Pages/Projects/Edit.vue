<script setup>
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, useForm } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3'
    import Swal from 'sweetalert2';

     // Props
     const props = defineProps({
        skills: Array,
        project: Object,
        errors: Array
    });

    const form = useForm({
        name: props.project?.name,
        skill_id: props.project?.skill_id,
        project_url: props.project?.project_url,
        image: null,
    });
    

    /**
     * Update Project
     */

     const updateProject = async () =>{
        try {
            await router.post(`/projects/${props.project.id}`, {
                _method: 'put',
                name: form.name,
                image: form.image,
                skill_id: form.skill_id,
                project_url: form.project_url

                }).then(page =>{
                        
                        if(page.props.flash.success){

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
                        }else{
                            console.log('No success message found');
                        }
                });
            }catch(error){
                console.log(error);
        }
     }

</script>
<template>
    <Head title="Edit Project " />
    
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Edit Project
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
                <form @submit.prevent="updateProject()" class="p-10 shadow  bg-white rounded">
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
                            <option :value="skill.id" v-for="skill in props.skills" :key="skill.id">{{ skill.name }}</option>
                        </select>

                        <InputError 
                            class="mt-2" 
                            :message="props.errors.skill_id" 
                        />
                        
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
                            :message="props.errors.name" 
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
                            :message="props.errors.project_url" 
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
                        <InputError class="mt-2" :message="props.errors.image" />
                    </div>


                      <!-- Store Btn -->
                      <div class="mt-4 flex items-center">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class=" hover:bg-green-600">
                            Update Project
                        </PrimaryButton>
                    </div>

                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
