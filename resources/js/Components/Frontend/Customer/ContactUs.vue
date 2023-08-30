<script setup>
const props = defineProps({
    contact: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <section class="section dark:bg-dark-nav-500 bg-light-tail-100">
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="text-4xl m-5 font-bold text-white">Contact Me</h2>
                <p class="subtitle text-white">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Neque, vero dolorum sapiente ratione enim tenetur assumenda
                    beatae error totam saepe aliquid reprehenderit repudiandae
                    commodi nesciunt!
                </p>
            </div>
            <div class="flex flex-col lg:flex-row lg:gap-x-8 mt-10">
                <div
                    class="flex flex-1 flex-col items-start space-y-8 mb-12 lg:mb-0 lg:pt-2"
                >
                    <div
                        class="flex flex-col lg:flex-row gap-x-4 text-white dark:text-black"
                    >
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-2xl"
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
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Have a questions?
                            </h4>
                            <p class="mb-1 text-paragraph">
                                i am here to help you
                            </p>
                            <p class="mb-1 text-paragraph">
                                {{ contact[0]["email"] }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col lg:flex-row gap-x-4 text-white dark:text-black"
                    >
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-2xl"
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
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Current Location
                            </h4>
                            <p class="mb-1 text-paragraph">
                                {{ contact[0]["city"] }},
                                {{ contact[0]["province"] }}
                            </p>
                            <p class="mb-1 text-paragraph">
                                Serving clients wordwide
                            </p>
                        </div>
                    </div>
                </div>
                <form
                    @submit.prevent="submit"
                    class="space-y-8 w-full max-w-md"
                >
                    <div class="flex gap-8">
                        <input
                            type="text"
                            class="bg-light-primary dark:bg-dark-second border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Name"
                        />
                        <span class="text-sm m-2 text-red-400"></span>
                    </div>
                    <textarea
                        class="block p-2.5 w-full text-sm text-gray-900 bg-light-primary dark:bg-dark-second rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Message"
                        spellcheck="false"
                        id=""
                        cols="30"
                        rows="10"
                    ></textarea>
                    <span class="text-sm m-2 text-red-400"></span>
                    <button class="btn bg-light-primary dark:bg-dark-second">
                        Send Message
                    </button>
                    <div></div>
                </form>
            </div>
        </div>
    </section>
</template>
