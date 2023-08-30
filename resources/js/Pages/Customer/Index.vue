<script setup>
import Layout from "@/Layouts/Customer/Frontend.vue";
import Hero from "@/Components/Frontend/Customer/Hero.vue";
import Categories from "@/Components/Frontend/Customer/Categories.vue";
import Testimoni from "@/Components/Frontend/Customer/Testimoni.vue";
import Contact from "@/Components/Frontend/Customer/ContactUs.vue";

const props = defineProps({
    categories: {
        type: Object,
        default: () => ({}),
    },
    carts: {
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
    auth: {
        typeof: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <Layout :carts="carts" :auth="auth">
        <!-- Hero -->
        <Hero :heroes="heroes"></Hero>
        <!-- Kategori -->
        <Categories :categories="categories"></Categories>
        <!-- Testimoni -->
        <Testimoni></Testimoni>
        <!-- Contact Us -->
        <Contact :contact="contact"></Contact>
    </Layout>
</template>
