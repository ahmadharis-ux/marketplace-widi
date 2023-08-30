<script setup></script>
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
            class="w-80 rounded border p-5 rounded-lg mx-auto bg-light-second dark:bg-dark-second"
        >
            <div class="mb-6">
                <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Name</label
                >
                <input
                    type="text"
                    id="name"
                    class="bg-light-tail-100 dark:bg-dark-nav-100 border border-light-tail-500 dark:border-dark-nav-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-dark-nav-500 block w-full p-2.5 dark:border-dark-nav-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-dark-nav-500"
                    required
                />
            </div>
            <div class="mb-6">
                <label
                    for="email"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Email</label
                >
                <input
                    type="email"
                    id="email"
                    class="bg-light-tail-100 dark:bg-dark-nav-100 border border-light-tail-500 dark:border-dark-nav-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-dark-nav-500 block w-full p-2.5 dark:border-dark-nav-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-dark-nav-500"
                    required
                />
            </div>
            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Password</label
                >
                <input
                    type="password"
                    id="password"
                    class="bg-light-tail-100 dark:bg-dark-nav-100 border border-light-tail-500 dark:border-dark-nav-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-dark-nav-500"
                    required
                />
            </div>
            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Confirm password</label
                >
                <input
                    type="password"
                    id="password"
                    class="bg-light-tail-100 dark:bg-dark-nav-100 border border-light-tail-500 dark:border-dark-nav-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-dark-nav-500"
                    required
                />
            </div>
            <div class="">
                <button
                    type="submit"
                    class="text-white bg-light-tail-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-dark-nav-100 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Submit
                </button>
                <a href="" class="ms-9"><u>Already registered?</u></a>
            </div>
        </form>
    </section>
</template>
