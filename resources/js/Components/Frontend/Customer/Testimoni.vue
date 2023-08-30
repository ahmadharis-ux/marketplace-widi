<script setup>
const loops = 3;
</script>
<template>
    <section class="section dark:bg-dark-nav-100 bg-light-primary">
        <div class="container mx-auto">
            <div
                class="flex flex-col items-center text-center dark:text-white text-light-tail-500"
            >
                <h1 class="text-4xl m-5 font-bold">Testimoni</h1>
                <p class="subtitle">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam nam fugiat ullam laudantium natus beatae fugit
                    atque eaque nobis veritatis.
                </p>
            </div>
            <div class="grid grid-cols-3 m-8 mb-0">
                <div class="mb-20 m-3" v-for="loop in loops">
                    <a
                        href="#"
                        class="flex bg-light-tail-500 dark:bg-dark-second rounded-xl"
                    >
                        <div
                            class="items-center text-center m-4 text-white dark:text-gray-400"
                        >
                            <img
                                class="w-24 rounded-full mb-3"
                                src="http://127.0.0.1:8000/img/product.jpg"
                                alt=""
                            />
                            user123
                        </div>
                        <div
                            class="flex flex-col justify-between p-4 leading-normal border-l-4 border-bg-light-primary dark:border-dark-nav-500"
                        >
                            <p
                                class="mb-3 text-sm text-white dark:text-gray-400"
                            >
                                Kerudungnya bagus, bahan lembut dan tidak gerah
                                loh
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
