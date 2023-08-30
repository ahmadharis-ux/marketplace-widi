<script setup>
const props = defineProps({
    heroes: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <section>
        <div class="carousel w-full">
            <div id="slide1" class="carousel-item relative w-full">
                <div
                    class="hero min-h-screen dark:bg-dark-nav-100 bg-light-primary"
                >
                    <div class="hero-content flex-col lg:flex-row-reverse">
                        <img
                            :src="`/storage/${heroes[0].image}`"
                            class="max-w-sm rounded-lg shadow-2xl mr-6"
                        />
                        <div class="m-10 dark:text-white text-light-tail-500">
                            <h1 class="text-5xl font-bold">
                                {{ heroes[0]["label"] }}
                            </h1>
                            <p class="py-6">
                                {{ heroes[0]["deskripsi"] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2"
                >
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <div
                    class="hero min-h-screen bg-base-200 dark:bg-dark-nav-100 bg-light-primary"
                >
                    <div class="hero-content flex-col lg:flex-row-reverse">
                        <img
                            :src="`/storage/${heroes[1].image}`"
                            class="max-w-sm rounded-lg shadow-2xl mr-6"
                        />
                        <div class="m-10 dark:text-white text-light-tail-500">
                            <h1 class="text-5xl font-bold">
                                {{ heroes[1]["label"] }}
                            </h1>
                            <p class="py-6">
                                {{ heroes[1]["deskripsi"] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2"
                >
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <div
                    class="hero min-h-screen bg-base-200 dark:bg-dark-nav-100 bg-light-primary"
                >
                    <div class="hero-content flex-col lg:flex-row-reverse">
                        <img
                            :src="`/storage/${heroes[2].image}`"
                            class="max-w-sm rounded-lg shadow-2xl mr-6"
                        />
                        <div class="m-10 dark:text-white text-light-tail-500">
                            <h1 class="text-5xl font-bold">
                                {{ heroes[2]["label"] }}
                            </h1>
                            <p class="py-6">
                                {{ heroes[2]["deskripsi"] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2"
                >
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                </div>
            </div>
        </div>
    </section>
</template>
