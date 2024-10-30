import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                beige: {
                    light: '#f5f5dc',  // Light beige
                    DEFAULT: '#f0e5c9', // Main beige
                    dark: '#e0d4b8',    // Darker beige
                },
                gold: {
                    light: '#ffd700',   // Light gold
                    DEFAULT: '#daa520', // Main gold
                    dark: '#b8860b',    // Darker gold
                },
            },
        },
    },

    plugins: [forms],
};

