const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors : {
                gray: colors.trueGray,
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            animation: ['hover', 'focus'],
            fontWeight: ['hover', 'focus'],
            ringWidth: ['hover', 'active'],
            ringColor: ['hover', 'active'],
            ringOpacity: ['hover', 'active'],
            outline: ['hover', 'active', 'focus-within', 'focus'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
    ],
};
