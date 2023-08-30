<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import FrontendLayout from "@/Layouts/Admin/Frontend.vue";

const props = defineProps({
    categories: {
        type: Object,
        default: () => ({}),
    },
    product: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    name: props.product?.name,
    categories_id: props.product?.categories_id,
    price: props.product?.price,
    image: null,
});

const submit = () => {
    router.post(`/products/${props.product.id}`, {
        _method: "put",
        name: form.name,
        categories_id: form.categories_id,
        image: form.image,
        price: form.price,
    });
};
</script>
<template>
    <Head title="Edit Category"></Head>
    <FrontendLayout>
        <section class="items-center px-8 py-6">
            <div class="container flex justify-center">
                <div class="card w-96 bg-primary text-primary-content">
                    <div class="card-body">
                        <h2 class="card-title">Edit Product</h2>
                        <hr />
                        <form @submit.prevent="submit">
                            <div class="mb-3">
                                <InputLabel
                                    for="category_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Product Categories</InputLabel
                                >
                                <select
                                    id="categories_id"
                                    name="categories_id"
                                    autocomplete="categories_id"
                                    v-model="form.categories_id"
                                    autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                    <option
                                        v-for="category in categories"
                                        :key="category.id"
                                        :value="category.id"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.category"
                                />
                            </div>
                            <div class="mb-3">
                                <InputLabel
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Product Name</InputLabel
                                >
                                <TextInput
                                    type="text"
                                    id="name"
                                    v-model="form.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <InputError class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <InputLabel
                                    for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Product Price</InputLabel
                                >
                                <TextInput
                                    type="text"
                                    id="price"
                                    v-model="form.price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <InputError class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <InputLabel
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Product Image</InputLabel
                                >
                                <TextInput
                                    type="file"
                                    id="name"
                                    @input="form.image = $event.target.files[0]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <InputError class="mt-2" />
                            </div>

                            <div class="card-actions justify-end">
                                <PrimaryButton class="btn"
                                    >Save Changes</PrimaryButton
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>
