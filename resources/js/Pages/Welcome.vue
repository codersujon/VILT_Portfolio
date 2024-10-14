<script setup>
import { Head, Link } from '@inertiajs/vue3';
import FrontendLayout from '@/Layouts/Frontend.vue';
import Hero from '@/Components/Frontend/Hero.vue';
import Promote from '@/Components/Frontend/Promote.vue';
import About from '@/Components/Frontend/About.vue';
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
        <!-- Portfolio Primary-->
        <!-- Services Secondary-->
        <!-- Contact Primary -->
    </FrontendLayout>
</template>
