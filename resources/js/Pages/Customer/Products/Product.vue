<script setup>
import Layout from "@/Layouts/Customer/Frontend.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    },
    carts: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
    product_id: props.product.id,
    qty: 1,
});

const addToCart = () => {
    form.post(route("addToCart"));
};
</script>
<template>
    <Layout :carts="carts">
        <div
            class="min-w-screen min-h-screen bg-light-tail-100 dark:bg-dark-nav-100 flex items-center p-5 lg:p-10 overflow-hidden relative"
        >
            <div
                class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left"
            >
                <div class="md:flex items-center -mx-10">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="relative">
                            <img
                                :src="`/storage/${product.image}`"
                                :alt="product.name"
                                class="w-full relative z-10"
                            />
                            <div
                                class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"
                            ></div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-10">
                        <div class="mb-10">
                            <h1 class="font-bold uppercase text-2xl mb-5">
                                {{ product.name }}
                            </h1>
                            <p class="text-sm">
                                Lorem ipsum dolor sit, amet consectetur
                                adipisicing, elit. Eos, voluptatum dolorum!
                                Laborum blanditiis consequatur, voluptates, sint
                                enim fugiat saepe, dolor fugit, magnam explicabo
                                eaque quas id quo porro dolorum facilis...
                                <a
                                    href="#"
                                    class="opacity-50 text-gray-900 hover:opacity-100 inline-block text-xs leading-none border-b border-gray-900"
                                    >MORE <i class="mdi mdi-arrow-right"></i
                                ></a>
                            </p>
                        </div>
                        <div>
                            <div class="inline-block align-bottom mr-5">
                                <span
                                    class="text-2xl leading-none align-baseline"
                                    >IDR</span
                                >
                                <span
                                    class="font-bold text-5xl leading-none align-baseline"
                                    >{{ product.price }}</span
                                >
                            </div>
                            <div class="align-bottom">
                                <form action="" class="inline-block">
                                    <button
                                        class="bg-light-tail-100 dark:bg-dark-nav-500 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"
                                    >
                                        <i class="mdi mdi-cart -ml-2 mr-2"></i>
                                        BUY NOW
                                    </button>
                                </form>
                                <form
                                    @submit.prevent="addToCart(product.id)"
                                    class="inline-block"
                                >
                                    <button
                                        class="bg-light-tail-100 ms-3 dark:bg-dark-nav-500 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"
                                    >
                                        <i class="mdi mdi-cart -ml-2 mr-2"></i>
                                        Add to cart
                                    </button>
                                </form>
                            </div>

                            <div
                                class="alert alert-success mt-8"
                                v-if="$page.props.flash.message"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="stroke-current shrink-0 h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                <span>{{ $page.props.flash.message }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
