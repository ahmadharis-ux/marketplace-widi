<script setup>
import { ref, computed } from "vue";
import { Link, useForm, router } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const showMobileMenu = ref("false");

const props = defineProps({
    carts: {
        type: Object,
        default: () => ({}),
    },
    auth: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <div class="navbar bg-light-second dark:bg-dark-second sticky top-0 z-50">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16"
                        />
                    </svg>
                </label>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52"
                >
                    <li><Link :href="route('index')">Dashboard</Link></li>
                    <li>
                        <Link :href="route('productsForCustomer')"
                            >Products</Link
                        >
                    </li>
                    <li>
                        <Link :href="route('admin.categories')"
                            >Categories</Link
                        >
                    </li>
                </ul>
            </div>
            <a class="btn btn-ghost normal-case text-xl">W&A Hijab</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><Link :href="route('index')">Dashboard</Link></li>
                <li>
                    <Link :href="route('productsForCustomer')">Products</Link>
                </li>
                <li>
                    <Link :href="route('admin.categories')">Categories</Link>
                </li>
                <li><Link>Transaction</Link></li>
            </ul>
        </div>

        <div class="navbar-end">
            <div class="indicator">
                <div class="drawer drawer-end">
                    <input
                        id="my-drawer-4"
                        type="checkbox"
                        class="drawer-toggle"
                    />
                    <div class="drawer-content">
                        <!-- Page content here -->
                        <label for="my-drawer-4">
                            <span class="indicator-item badge badge-primary">{{
                                carts.length
                            }}</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mt-2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                />
                            </svg>
                        </label>
                    </div>
                    <div class="drawer-side z-50">
                        <label for="my-drawer-4" class="drawer-overlay"></label>
                        <ul
                            class="menu p-4 w-auto min-h-full bg-light-tail-100 dark:bg-dark-nav-100 text-base-content"
                        >
                            <!-- Sidebar content here -->
                            <li
                                v-for="cart in carts"
                                :key="cart.id"
                                class="border-b-2"
                            >
                                <a>
                                    <div class="flex w-80 pb-2">
                                        <div
                                            class="grid w-1 h-20 flex-grow card place-items-center"
                                        >
                                            <input
                                                v-model="cart.isChecked"
                                                type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            />
                                        </div>
                                        <div
                                            class="grid w-52 h-20 flex-grow card"
                                        >
                                            <div class="flex w-full">
                                                <div
                                                    class="grid h-20 flex-grow"
                                                >
                                                    <div class="avatar">
                                                        <div
                                                            class="w-min rounded"
                                                        >
                                                            <img
                                                                :src="`/storage/${cart.product.image}`"
                                                                alt="Tailwind-CSS-Avatar-component"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="grid h-20 flex-grow ms-2"
                                                >
                                                    <label
                                                        class="text-light-primary dark:text-dark-primary font-bold"
                                                        >{{
                                                            cart.product.name
                                                        }}</label
                                                    >
                                                    <label for=""
                                                        >Rp
                                                        {{
                                                            cart.product.price
                                                        }}</label
                                                    >
                                                    <div
                                                        class="inline-flex shadow-sm"
                                                    >
                                                        <Link
                                                            :href="
                                                                route(
                                                                    'removeqty',
                                                                    cart.id
                                                                )
                                                            "
                                                            v-if="cart.qty > 1"
                                                            aria-current="page"
                                                            class="h-5 px-1 text-xs font-medium text-blue-700 bg-white border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                                                        >
                                                            -
                                                        </Link>
                                                        <input
                                                            type="text"
                                                            readonly
                                                            :value="cart.qty"
                                                            class="h-5 px-1 text-xs text-center w-10 text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                                                        />
                                                        <Link
                                                            :href="
                                                                route(
                                                                    'newqty',
                                                                    cart.id
                                                                )
                                                            "
                                                            class="h-5 px-1 text-xs font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                                                        >
                                                            +
                                                        </Link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <Link
                                    :href="route('deleteInChart', cart.id)"
                                    class="flex p-3"
                                    >Hapus</Link
                                >
                            </li>
                        </ul>
                        <div
                            class="p-4 bg-light-second dark:bg-dark-second w-96"
                            style="position: fixed; bottom: 0"
                        >
                            <div
                                class="flex justify-between items-center"
                                v-if="totalAmount > 0"
                            >
                                <span class="text-base-content"
                                    >Total: ${{ totalAmount }}</span
                                >
                                <button
                                    class="px-4 py-2 bg-light-tail-100 dark:bg-dark-nav-100 text-white rounded"
                                >
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-center lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li tabindex="0">
                        <details>
                            <summary>Ahmad Harius</summary>
                            <ul class="p-2">
                                <li><a>Logout</a></li>
                                <li><a>Profile</a></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>

            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="http://127.0.0.1:8000/img/iconProfile.png" />
                </div>
            </label>
        </div>
        <!-- <div class="navbar-end">
            <div class="navbar-center lg:flex">
                <Link
                    :href="route('signin')"
                    class="btn hover:bg-light-second dark:hover:bg-dark-second rounded-xl bg-light-tail-100 text-dark-second dark:bg-dark-nav-100 dark:text-light-second mx-4"
                    >Sign In</Link
                >
                <Link
                    :href="route('signup')"
                    class="btn hover:bg-light-second dark:hover:bg-dark-second rounded-xl bg-light-tail-100 text-dark-second dark:bg-dark-nav-100 dark:text-light-second"
                    >Sign Up</Link
                >
            </div>
        </div> -->
    </div>
</template>
