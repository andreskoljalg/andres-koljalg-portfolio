<script setup>
import MobileHeader from '../components/MobileHeader.vue'
</script>

<template>
    <MobileHeader />
    <div class="hidden fixed lg:block px-12 xl:px-24 py-8 w-fit">
        <router-link to="/"><h1 class="font-['Hanson'] text-3xl">BACK</h1></router-link>
    </div>
    <div class="min-h-screen w-screen flex items-center">
        <div class="flex flex-col-reverse lg:gap-10 p-4 px-2 lg:px-12 xl:px-24 lg:flex-row">
            <div class="flex flex-col w-full lg:w-8/12 text-lg 2xl:text-2xl justify-center gap-[5vw] lg:gap-4 font-['Times_New_Roman']">
                <img src="../assets/svgs/ak_mainlogotitle.svg" class="w-2/3 sm:w-1/2 mt-4 lg:m-0" alt="ak_mainlogotitle">
                <p>... is a photographer/designer/creative director born&raised in Odessa, Ukraine now living in Estonia.</p>
                <p>I've spent most of the past 5 years of my life behind the lens, shooting people, action sports and cars
                    I launched my own skateboarding magazine with my photos, articles, color managing and design,
                    which is the only one in the Baltics. On the personal level, I am all about smiles.</p> 
                <p>
                    On my free time you can find me behind a steering wheel of old-school cars,
                    on a skateboard or behind the lens. Im also really passionate about music. For me, a day doesn't go
                    by without digging through the deepest part of the internet for some "hidden" gems. If you skate, 
                    have a cool car or spin records, we definetly have something to talk about!
                </p>
            </div>
            <div class="w-full lg:w-4/12 flex items-center justify-center">
                <img src="../assets/images/kg.png" alt="kg">
            </div>
        </div>
    </div>
</template>