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
            backgroundColor: ['hover', 'focus','active'],
            margin: ['hover', 'focus','active'],
            shadow: ['hover', 'focus','active','focus'],
            opacity: ['disabled','active'],
            animation: ['hover', 'focus','active','group-hover'],
            transition : ['hover', 'focus','group-hover'],
            fontWeight: ['hover', 'focus'],
            ringWidth: ['hover', 'active'],
            ringColor: ['hover', 'active'],
            ringOpacity: ['hover', 'active'],
            borderWidth: ['hover', 'active'],
            borderColor: ['hover', 'active'],
            borderOpacity: ['hover', 'active'],
            outline: ['hover', 'active', 'focus-within', 'focus'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
    ],
};
