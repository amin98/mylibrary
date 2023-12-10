const colors = require("tailwindcss/colors");
// let defaultConfig = require('tailwindcss/defaultConfig')()


module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
        './resources/**/*.js',
    ],
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    },
    theme: {
        extend: {
            screens: {
                'xs': {'min': '425px', 'max': '640px'},
                'sm': {'min': '640px', 'max': '767px'},
                'md': {'min': '768px', 'max': '1024px'},
                'lg': {'min': '1024px', 'max': '1279px'},
                'xl': {'min': '1280px', 'max': '1535px'},
                '2xl': {'min': '1536px'},
            },
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            "blue-gray": colors.blueGray,
            "cool-gray": colors.coolGray,
            gray: colors.gray,
            "true-gray": colors.trueGray,
            "warm-gray": colors.warmGray,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
        },
    },

    plugins: [
        require('@tailwindcss/ui'),
    ]
}
