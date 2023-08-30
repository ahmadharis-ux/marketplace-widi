<script setup>
import Header from "@/Components/Frontend/Customer/Header.vue";
import Footer from "@/Components/Frontend/Customer/Footer.vue";

const props = defineProps({
    carts: {
        type: Object,
        default: () => ({}),
    },
    auth: {
        typeof: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <div class="bg-slate-200 dark:bg-slate-900">
        <Header :carts="carts" :auth="auth"></Header>
        <main class="min-h-screen">
            <slot />
        </main>
        <Footer></Footer>
    </div>
</template>
