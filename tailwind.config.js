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
            },
            backgroundImage: theme => ({
                'error-banner': "url('/assets/img/error_banner.jpg')",
            }),
        },
    },

    variants: {
        extend: {
            backgroundColor: ['hover', 'focus','active','group-hover'],
            backgroundOpacity: ['hover', 'focus','active','group-hover'],
            margin: ['hover', 'focus','active'],
            shadow: ['hover', 'focus','active','focus','group-hover'],
            opacity: ['disabled','active','group-hover'],
            animation: ['hover', 'focus','active','group-hover'],
            transition : ['hover', 'focus','group-hover'],
            fontWeight: ['hover', 'focus','group-hover'],
            ringWidth: ['hover', 'active','group-hover'],
            ringColor: ['hover', 'active','group-hover'],
            ringOpacity: ['hover', 'active','group-hover'],
            borderWidth: ['hover', 'active','group-hover'],
            borderColor: ['hover', 'active','group-hover'],
            borderOpacity: ['hover', 'active','group-hover'],
            outline: ['hover', 'active', 'focus-within', 'focus','group-hover'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
    ],
};
