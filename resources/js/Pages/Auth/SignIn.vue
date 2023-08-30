<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    email: "",
    password: "",
});
const submit = () => {
    form.post(route("signin"));
};
</script>
<template>
    <section class="px-12 py-12 bg-light-primary dark:bg-dark-primary h-screen">
        <div class="mx-auto text-center m-8">
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-light-tail-100 md:text-5xl lg:text-6xl dark:text-dark-nav-100"
            >
                W&A Hijab
            </h1>
            <p
                class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
            >
                Sign in to your account
            </p>
        </div>
        <form
            @submit.prevent="submit"
            class="w-80 rounded border p-5 rounded-lg mx-auto bg-light-second dark:bg-dark-second"
        >
            <div class="mb-6">
                <InputLabel
                    for="email"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Your email</InputLabel
                >
                <TextInput
                    type="email"
                    id="email"
                    v-model="form.email"
                    class="bg-light-tail-100 dark:bg-dark-nav-100 border border-light-tail-500 dark:border-dark-nav-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-dark-nav-500 block w-full p-2.5 dark:border-dark-nav-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-dark-nav-500"
                    placeholder="name@flowbite.com"
                    required
                    autofocus
                />
            </div>
            <div class="mb-6">
                <InputLabel
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Your password</InputLabel
                >
                <TextInput
                    type="password"
                    id="password"
                    v-model="form.password"
                    class="bg-light-tail-100 dark:bg-dark-nav-100 border border-light-tail-500 dark:border-dark-nav-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-dark-nav-500"
                    required
                />
            </div>
            <div class="">
                <PrimaryButton
                    type="submit"
                    class="text-white bg-light-tail-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-dark-nav-100 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Submit
                </PrimaryButton>
                <Link :href="route('signup')" class="ms-6"
                    ><u>Create new account?</u></Link
                >
            </div>
        </form>
    </section>
</template>
