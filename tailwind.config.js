const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors:{
                'green-desa':'#16A085',
                'indigo-inventory':'#0b486b',
                'green-inventory':'#3b8686',
                'blue-inventory':'#79bd9a',
                'celadon-inventory':'#a8dba8',
                'yellow-inventory':'#cff09e',
            },
            fontFamily: {
                sans: [...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
