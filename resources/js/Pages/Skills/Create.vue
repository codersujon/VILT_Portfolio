<script setup>

    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, useForm } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3'
    import Swal from 'sweetalert2';

    /**
     * useForm from @inertiajs/vue3
     */
    const form = useForm({
        name: "",
        image: "",
    });

    /**
     * Store Skill Using Async and await and try catch method
     */
    const storeSkill = async () =>{
        try {
            await router.post(route('skills.store'), form, {

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

    <Head title="New Skill " />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                New Skill
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
                <form @submit.prevent="storeSkill()" class="p-10 shadow  bg-white rounded">
                    <!-- Name -->
                    <div class="mb-5">
                        <InputLabel 
                            for="name" 
                            value="Name" 
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

                    <!-- Image -->
                    <div class="mb-5">
                        <InputLabel 
                            for="image" 
                            value="Image" 
                        />
                        <TextInput 
                            id="image" 
                            type="file" 
                            class="mt-1 block w-full" 
                            @input="form.image = $event.target.files[0]"  
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>


                    <!-- Store Btn -->
                    <div class="mt-4 flex items-center">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class=" hover:bg-green-600">
                            Store
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
