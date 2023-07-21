<script setup>
import { RouterView } from 'vue-router'
</script>

<template>
  <router-view v-slot="{ Component, route }">
    <transition name="route" mode="out-in">
      <div :key="route.name">  
        <component :is="Component"></component>
      </div>
    </transition>
  </router-view>

</template>
<style scoped>
/* ROUTER TRANSITIONS */
.route-enter-from {
  opacity: 0;
  /* transform: translateX(100px); */
}
.route-enter-active {
  transition: all 0.3s ease-out;
}
.route-leave-to {
  opacity: 0;
  /* transform: translateX(-100px); */
}
.route-leave-active {
  transition: all 0.3s ease-in;
}
</style>