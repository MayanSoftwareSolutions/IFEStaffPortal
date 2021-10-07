const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                wiggle: {
                    '0%, 100%': {
                        transform: 'rotate(-9deg)'
                    },
                    '50%': {
                        transform: 'rotate(7deg)'
                    },
                }
            },
            animation: {
                wiggle: 'wiggle 0.2s ease-in-out infinite',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['checked'],
        },
    },

    

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),],
};
