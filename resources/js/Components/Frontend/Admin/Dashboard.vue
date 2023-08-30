<script setup>
import { Link, useForm, router } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
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
const form = useForm({
    phone: props.contact?.phone,
    email: props.contact?.email,
    city: props.contact?.city,
    province: props.contact?.province,
});
const submit = () => {
    router.post(`/contact/1`, {
        _method: "put",
        phone: form.phone,
        email: form.email,
        city: form.city,
        province: form.province,
    });
};
</script>
<template>
    <section class="px-12 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-6 card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">All Transactions</h2>
                    <p class="text-xs md:text-2xl">IDR. 0,-</p>
                </div>
            </div>

            <div class="col-6 card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Product</h2>
                    <p class="text-xs md:text-2xl">{{ products.length }},-</p>
                </div>
            </div>

            <div class="col-6 card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Customer</h2>
                    <p class="text-xs md:text-2xl">0</p>
                </div>
            </div>
        </div>
    </section>
    <!-- flash Message -->
    <section class="px-12 ">
        <div
            class="alert alert-success mb-4"
            v-if="$page.props.flash.message"
            role="alert"
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
            <span> {{ $page.props.flash.message }} </span>
        </div>
    </section>
    <section class="px-12 mb-2">
        <details class="collapse bg-base-200">
            <summary class="collapse-title text-xl font-medium">
                CMS Hero
            </summary>
            <div class="collapse-content">
                <div v-for="hero in heroes" :key="hero.id">
                    <label for="" class="inline-block"
                        >Slide {{ hero.slide }}</label
                    >
                    <Link
                        class="ms-6 inline-block"
                        :href="route('heroes.edit', hero.id)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                            />
                        </svg>
                    </Link>
                    <div
                        class="hero min-h-80 dark:bg-dark-nav-100 bg-light-primary"
                    >
                        <div class="hero-content flex-col lg:flex-row-reverse">
                            <img
                                :src="`/storage/${hero.image}`"
                                class="max-w-sm rounded-lg shadow-2xl"
                            />
                            <div>
                                <h1 class="text-5xl font-bold">
                                    {{ hero.label }}
                                </h1>
                                <p class="py-6">
                                    {{ hero.deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-8" />
                </div>
            </div>
        </details>
    </section>
    <section class="px-12 mb-2">
        <details class="collapse bg-base-200">
            <summary class="collapse-title text-xl font-medium">
                CMS Contact
            </summary>
            <div class="collapse-content">
                <form
                    class="w-80 mx-auto border-2 rounded-lg p-5"
                    @submit.prevent="submit"
                >
                    <div class="mb-6">
                        <InputLabel
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Email</InputLabel
                        >
                        <TextInput
                            type="text"
                            id="email"
                            v-model="form.email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required
                        />
                    </div>
                    <div class="mb-6">
                        <InputLabel
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Phone</InputLabel
                        >
                        <TextInput
                            type="text"
                            id="email"
                            v-model="form.phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required
                        />
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <InputLabel
                                for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >City</InputLabel
                            >
                            <TextInput
                                type="text"
                                id="first_name"
                                v-model="form.city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required
                            />
                        </div>
                        <div>
                            <InputLabel
                                for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Province</InputLabel
                            >
                            <TextInput
                                type="text"
                                id="last_name"
                                v-model="form.province"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required
                            />
                        </div>
                    </div>

                    <PrimaryButton
                        type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Save Changes
                    </PrimaryButton>
                </form>
            </div>
        </details>
    </section>
</template>
