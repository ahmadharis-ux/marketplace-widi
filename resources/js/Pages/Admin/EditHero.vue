<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import FrontendLayout from "@/Layouts/Admin/Frontend.vue";

const props = defineProps({
    hero: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    slide: 1,
    label: props.hero?.label,
    deskripsi: props.hero?.deskripsi,
    image: null,
});

const submit = () => {
    router.post(`/heroes/${props.hero.id}`, {
        _method: "put",
        slide: form.slide,
        label: form.label,
        deskripsi: form.deskripsi,
        image: form.image,
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
                        <h2 class="card-title">
                            Edit Slide <u>{{ hero.slide }}</u>
                        </h2>
                        <hr />
                        <form @submit.prevent="submit">
                            <div class="mb-3">
                                <InputLabel
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Hero Label</InputLabel
                                >
                                <TextInput
                                    type="text"
                                    id="name"
                                    v-model="form.label"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <InputError class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <InputLabel
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Hero Deskripsi</InputLabel
                                >
                                <textarea
                                    type="text"
                                    id="name"
                                    v-model="form.deskripsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-52 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <InputError class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <InputLabel
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Hero Image</InputLabel
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
