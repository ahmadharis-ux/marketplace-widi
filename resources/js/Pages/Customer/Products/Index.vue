<script setup>
import Layout from "@/Layouts/Customer/Frontend.vue";
import { Link, useForm } from "@inertiajs/vue3";
import ButtonPrimary from "@/Components/PrimaryButton.vue";
import { computed } from "vue";

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
    categories: {
        type: Object,
        default: () => ({}),
    },
    carts: {
        type: Object,
        default: () => ({}),
    },
});
let selectedCategory = null;

const filterProductsByCategory = (categoryId) => {
    selectedCategory = categoryId;
};

const filteredProducts = computed(() => {
    if (!selectedCategory) {
        return Object.values(products);
    }
    return Object.values(products).filter(
        (product) => product.categories_id === selectedCategory
    );
});
</script>
<template>
    <Layout :carts="carts">
        <div
            class="bg-light-primary dark:bg-dark-nav-500 text-light-tail-500 dark:text-dark-second"
        >
            <div
                class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"
            >
                <!-- <h3 class="text-xl font-bold tracking-tight mb-2">
                    Categories :
                </h3> -->
                <!-- <div class="btn-group mb-4">
                    <button class="btn btn-active">All</button>

                    <ButtonPrimary
                        class="btn"
                        v-for="category in categories"
                        :key="category.id"
                        @click="filterProductsByCategory(categor)"
                    >
                        {{ category.name }}
                    </ButtonPrimary>
                </div> -->
                <h2 class="text-2xl font-bold tracking-tight">All Products</h2>

                <div
                    class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
                >
                    <Link
                        v-for="product in products"
                        :key="product.id"
                        class="group relative"
                        :href="route('showProduct', product.id)"
                    >
                        <div
                            class="w-full max-w-sm border border-gray-200 rounded-lg shadow bg-light-second dark:bg-dark-second text-light-tail-500 dark:text-dark-second"
                        >
                            <a href="#">
                                <img
                                    class="p-8 rounded-t-lg"
                                    :src="`/storage/${product.image}`"
                                    :alt="product.name"
                                />
                            </a>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5
                                        class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"
                                    >
                                        {{ product.name }}
                                    </h5>
                                </a>

                                <div
                                    class="flex items-center justify-between mt-5"
                                >
                                    <span
                                        class="text-3xl font-bold text-gray-900 dark:text-white"
                                        >{{ product.price }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </Layout>
</template>
