import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "light-primary": "#FAF1E4",
                "light-second": "#CEDEBD",
                "light-tail-100": "#9EB384",
                "light-tail-500": "#435334",
                "dark-primary": "#040D12",
                "dark-second": "#183D3D",
                "dark-nav-100": "#5C8374",
                "dark-nav-500": "#93B1A6",
            },
            
        },
    },

    plugins: [forms],
};
