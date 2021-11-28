const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'media',
    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                gray: colors.trueGray,
            },
        },
    },
    variants: {
        extend: {
            borderRadius: ['focus'],
        },
    },
    plugins: [
        require('@tailwindcss/forms')({ strategy: 'class' }),
    ],
}
