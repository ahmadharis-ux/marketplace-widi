<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    categories: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <section class="section dark:bg-dark-nav-500 bg-light-tail-100">
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl m-5 font-bold text-white">
                    New Categories
                </h1>
                <p class="subtitle text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam nam fugiat ullam laudantium natus beatae fugit
                    atque eaque nobis veritatis.
                </p>
            </div>
            <div class="m-8 mb-0 grid grid-cols-3">
                <div
                    class="m-4 mb-20"
                    v-for="category in categories"
                    :key="category.id"
                >
                    <div
                        class="card w-96 bg-base-100 shadow-xl bg-light-tail-500 dark:bg-dark-second"
                    >
                        <figure>
                            <img
                                :src="`/storage/${category.image}`"
                                :alt="category.name"
                                alt="Shoes"
                            />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ category.name }}!
                                <div class="badge badge-secondary">NEW</div>
                            </h2>
                            <p>
                                If a dog chews shoes whose shoes does he choose?
                            </p>
                            <div class="card-actions justify-end">
                                <Link class="badge badge-outline">Go Shop</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
