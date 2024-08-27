import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontSize: {
            sm: '1rem',
            base: '1.2rem',
            xl: '1.45rem',
            '2xl': '1.763rem',
            '3xl': '2.153rem',
            '4xl': '2.641rem',
            '5xl': '3.252rem',
        },
        extend: {

            dropShadow: {
                glow: [
                    "0 0px 20px rgba(255,255, 255, 0.35)",
                    "0 0px 65px rgba(255, 255,255, 0.2)"
                ]
            },
            fontFamily: {
                sans: ['Cairo', ...defaultTheme.fontFamily.sans],
                // sans: ['Cairo', sans-serif;],
                // sans: ['Figtree', sans-serif;],
            },
            colors:{
                primary: "#086bd6"
            }
        },
    },

    plugins: [forms, typography],
};
