const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue'
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
