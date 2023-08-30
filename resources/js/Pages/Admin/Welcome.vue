<script setup>
import { Head, Link } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/Admin/Frontend.vue";
import Dashboard from "@/Components/Frontend/Admin/Dashboard.vue";

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
    heroes: {
        type: Object,
        default: () => ({}),
    },
    contact: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <Head title="Welcome to admin page" />
    <FrontendLayout>
        <!-- Dashboard -->
        <Dashboard
            :products="products"
            :heroes="heroes"
            :contact="contact"
        ></Dashboard>
    </FrontendLayout>
</template>
