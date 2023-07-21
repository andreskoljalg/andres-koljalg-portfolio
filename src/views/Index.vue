<script setup>
import MobileHeader from '../components/MobileHeader.vue';
</script>

<template>
    <MobileHeader />
    <div class="h-[92vh] p-12 w-screen flex flex-col items-center justify-center lg:hidden">
        <img src="../assets/images/title_image_rotated.png" class="w-[50vh] mb-8" alt="title_image_rotated">
        <a href="javascript:delay('/contact.html')" class="font-['Times_New_Roman'] text-2xl w-fit">hello@andreskoljalg.com</a>
    </div>
    <div class="justify-center gap-20 h-screen items-center p-12 hidden lg:flex">
        <div class="w-fit" id="slide">
            <img src="../assets/svgs/ak_mainlogotitle.svg" alt="ak_mainlogotitle" id="slide">
            <div class="flex gap-2 justify-between text-3xl xl:text-4xl font-['Times_New_Roman']">
                <a href="javascript:delay('/about.html')">About</a>
                <p class="w-fit">&#8226</p>
                <a href="javascript:delay('/projects.php')">Projects</a>
                <p class="w-fit">&#8226</p>
                <a href="javascript:delay('/journal.php')">Journal</a>
                <p class="w-fit">&#8226</p>
                <a href="javascript:delay('/contact.html')">Contact</a>
            </div>
        </div>
        <div>
            <img src="../assets/images/title_image.png" alt="title_image">
        </div>
    </div>
</template>