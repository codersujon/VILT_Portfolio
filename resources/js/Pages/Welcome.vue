<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import FrontendLayout from '@/Layouts/Frontend.vue';
    import Hero from '@/Components/Frontend/Hero.vue';
    import Promote from '@/Components/Frontend/Promote.vue';
    import About from '@/Components/Frontend/About.vue';
    import Skills from '@/Components/Frontend/Skills.vue';
    import Portfolio from '@/Components/Frontend/Portfolio.vue';
    import Services from '@/Components/Frontend/Services.vue';
    import ContactMe from '@/Components/Frontend/ContactMe.vue';
    
    
    import { defineProps } from 'vue';
    const props = defineProps({
        skills: Object,
        projects: Object
    });

</script>

<template>
    <Head title="CoderS" />
    <FrontendLayout>
        <!-- Hero Primary -->
         <Hero />
        <!-- promote tail-100 -->
         <Promote />
        <!-- About Secondary-->
         <About />
        <!-- Skills Tail-100-->
         <Skills :skills="skills"/>
        <!-- Portfolio Primary-->
         <Portfolio :skills="skills" :projects="projects"/>
        <!-- Services Secondary-->
         <Services />
        <!-- Contact Primary -->
         <ContactMe />
    </FrontendLayout>
</template>
