<script setup>
let navShown = false;

function toggleMenu() {
    const nav = document.getElementById('nav')
    if(!navShown) {
        nav.classList.remove('translate-x-full')
        navShown = true;
    } else {
        nav.classList.add('translate-x-full')
        navShown = false;
    }
}
</script>

<template>
  <div class="fixed translate-x-full h-screen duration-300 ease-in-out w-screen justify-center items-center flex flex-col text-3xl font-['Times_New_Roman'] lg:hidden bg-white" id="nav">
        <router-link to="/about">About</router-link>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/projects.php')">Projects</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/journal.php')">Journal</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/contact.html')" class="mb-6">Contact</a>
        <div class="w-12 h-12 flex justify-center items-center" @click="toggleMenu()">
            <div class="w-12 fixed h-2 bg-black rotate-45"></div>
            <div class="w-12 fixed h-2 bg-black -rotate-45"></div>
        </div>
  </div>
  <header class="flex h-[8vh] justify-between items-center p-2 lg:hidden">
      <router-link to="/" class="w-44"><img src="../assets/svgs/ak_mainlogotitle.svg" class="h-full" alt="ak_mainlogotitle"></router-link>
      <div class="w-12 flex justify-between items-end py-2 flex-col h-full max-h-12" @click="toggleMenu()">
          <div class="h-1/6 w-1/3 bg-black"></div>
          <div class="h-1/6 w-2/3 bg-black"></div>
          <div class="h-1/6 w-full bg-black"></div>
      </div>
  </header>
</template>