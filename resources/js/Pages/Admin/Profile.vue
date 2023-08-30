<script setup>
import Layout from "@/Layouts/Admin/Frontend.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

</script>
<template>
    <Head title="Profile"></Head>
    <Layout>
        <div class="text-sm breadcrumbs mx-10">
            <ul>
                <li><Link :href="route('admin')">Dashboard</Link></li>
                <li>Profile</li>
            </ul>
        </div>
        <section class="px-12 py-12">
            <div class="card card-side bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="http://127.0.0.1:8000/img/iconProfile.png"
                        alt="Movie"
                    />
                </figure>
                <div class="card-body">
                    <form>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label
                                    for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >First name</label
                                >
                                <input
                                    type="text"
                                    id="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Last name</label
                                >
                                <input
                                    type="text"
                                    id="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Doe"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="company"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Role</label
                                >
                                <input
                                    type="text"
                                    id="company"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Flowbite"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Email</label
                                >
                                <input
                                    type="tel"
                                    id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678"
                                    pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                    required
                                />
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </Layout>
</template>
