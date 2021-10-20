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
                "zest-50": "#FCE6D4",
                "zest-100": "#F9D0AE",
                "zest-200": "#F5BA8A",
                "zest-300": "#F0A466",
                "zest-400": "#EA8F43",
                "zest-500": "#E37921",
                "zest-600": "#C0661B",
                "zest-700": "#9B5318",
                "zest-800": "#764014",
                "zest-900": "#522D0F",
            },
            backgroundImage: theme => ({
                'error-banner': "url('/assets/img/error_banner.jpg')",
            }),
        },
    },

    variants: {
        extend: {
            animation: ['hover', 'focus','active','group-hover'],
            backgroundColor: ['hover', 'focus','active','group-hover'],
            backgroundOpacity: ['hover', 'focus','active','group-hover'], 
            borderWidth: ['hover', 'active','group-hover'],
            borderColor: ['hover', 'active','group-hover'],
            borderOpacity: ['hover', 'active','group-hover'],            
            fontWeight: ['hover', 'focus','group-hover'],
            height: ['hover', 'focus'],
            margin: ['hover', 'focus','active'],
            opacity: ['disabled','active','group-hover'],
            outline: ['hover', 'active', 'focus-within', 'focus','group-hover'],            
            ringColor: ['hover', 'active','group-hover'],
            ringOpacity: ['hover', 'active','group-hover'],
            ringWidth: ['hover', 'active','group-hover'],
            scale: ['active', 'group-hover'],
            shadow: ['hover', 'focus','active','focus','group-hover'],
            transition : ['hover', 'focus','group-hover'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
    ],
};
