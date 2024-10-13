<script setup>
    const Year = new Date().getFullYear();

</script>
<template>
    <footer class="bg-light-secondary dark:bg-dark-secondary py-12">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row space-y-6 lg:space-y-0 items-center justify-between">
                <div class="flex space-x-6 items-center justify-center">
                    <img src="../../../../public/img/logo.png" alt="" class="h-8 w-auto">
                </div>
                <p class="text-paragraph opacity-80 text-[15px]">&copy;{{ Year }} CoderSujon.com All right reserved.</p>
            </div>
        </div>
    </footer>
</template>

