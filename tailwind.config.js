/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
  content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
         "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
        '<path-to-vendor>/awcodes/filament-badgeable-column/resources/**/*.blade.php',
  ],
  darkMode: 'class',
  theme: {
    extend: {
            colors: {
                danger: colors.rose,
                primary: colors.cyan,
                success: colors.green,
                warning: colors.yellow,
                "light-gray": "#303640",
				seconds: "rgba(6, 252, 63, 1)",
				minutes: "rgba(252, 230, 0, 1)",
				hours: "rgba(253, 41, 112, 1)",
            },
            fontFamily: {
                main: ["Ubuntu", "sans-serif"],
            },
    },
  },
  plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin')
  ],
}

