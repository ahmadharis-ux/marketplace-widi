<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
const showMobileMenu = ref("false");
</script>
<template>
    <div class="navbar bg-base-100 sticky top-0 z-50">
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
                    <li><Link :href="route('admin')">Dashboard</Link></li>
                    <!-- <li>
                        <Link></Link>>Parent</a>
                        <ul class="p-2">
                            <li><Link></Link>>Submenu 1</a></li>
                            <li><Link></Link>>Submenu 2</a></li>
                        </ul>
                    </li> -->
                    <li>
                        <Link :href="route('admin.products')">Products</Link>
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
                <li><Link :href="route('admin')">Dashboard</Link></li>
                <li>
                    <Link :href="route('admin.products')">Products</Link>
                </li>
                <li>
                    <Link :href="route('admin.categories')">Categories</Link>
                </li>
                <li><Link>Transaction</Link></li>
            </ul>
        </div>

        <div class="navbar-end">
            <div class="navbar-center lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li tabindex="0">
                        <details>
                            <summary>{{ $page.props.auth.user.name }}</summary>
                            <ul class="p-2">
                                <li>
                                    <Link :href="route('logout')">Logout</Link>
                                </li>
                                <li><Link :href="route('profile.admin')">Profile</Link></li>
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
    </div>
</template>
