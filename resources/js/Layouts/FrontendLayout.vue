<template>
    <slot />

    <Footer />
</template>

<script setup>
import Footer from '@/Layouts/Partials/Footer.vue'
</script>

<style>
body {
    @apply flex flex-col min-h-screen bg-gray-900;
}
</style>
