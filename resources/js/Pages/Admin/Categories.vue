<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
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
});
const form = useForm({
    name: "",
    image: null,
});

const submit = () => {
    form.post(route("categories.store"));
};
</script>
<template>
    <Head title="Categories"></Head>
    <FrontendLayout>
        <section class="py-12 px-12">
            <!-- flash Message -->
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

            <!-- Modal -->
            <button class="btn mb-3" onclick="my_modal_1.showModal()">
                create category
            </button>
            <dialog id="my_modal_1" class="modal">
                <form @submit.prevent="submit" class="modal-box">
                    <div class="mb-3">
                        <InputLabel
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Category Name</InputLabel
                        >
                        <TextInput
                            type="text"
                            v-model="form.name"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mb-3">
                        <InputLabel
                            for="image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Category Image</InputLabel
                        >
                        <TextInput
                            type="file"
                            id="image"
                            @input="form.image = $event.target.files[0]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <PrimaryButton
                            class="btn"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            >Save</PrimaryButton
                        >
                    </div>
                </form>
            </dialog>
            <!-- table products -->
            <div class="container">
                <div class="relative overflow-x-auto">
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-2 py-3">
                                    Category Displays
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Products Amount
                                </th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                v-for="category in categories"
                                :key="category.id"
                            >
                                <td class="px-2 py-4">
                                    <div class="avatar">
                                        <div class="w-8 rounded">
                                            <img
                                                :src="`/storage/${category.image}`"
                                                :alt="category.name"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ category.name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ category.product.length }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route(
                                                'categories.edit',
                                                category.id
                                            )
                                        "
                                        >Edit</Link
                                    >/<Link
                                        :href="
                                            route(
                                                'categories.destroy',
                                                category.id
                                            )
                                        "
                                        method="delete"
                                        as="button"
                                        type="button"
                                        >Delete</Link
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>
