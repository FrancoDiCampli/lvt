module.exports = {
  purge: [],
  theme: {
    fontFamily: {
        montserrat:['Montserrat'],
        roboto:['Roboto'],
        rubik:['Rubik']
    },
    pagination: theme => ({
        // Customize the color only. (optional)
        color: theme('colors.primary.400'),
        link: 'bg-white px-3 py-1 border-r border-t border-b text-gray-700 no-underline',
        linkDisabled: 'bg-gray-300',

    }),
    extend: {
        colors: {
            // 'primary': '#028C84',
            primary: {
                '100': '#3CC1BB',
                '200': '#02B5AC',
                '300': '#01827C',
                '400': '#028C84',
                '500': '#1C5956'
            },
            // 'secondary': '#1E5E7F',
            secondary: {
                '100': '#68A4C1',
                '200': '#2B87B5',
                '300': '#1F6182',
                '400': '#1E5E7F',
                '500': '#1D2D36'
            },
            // 'blue': '#2D8DBF',
            blue: {
                '100': '#75B6D9',
                '200': '#3299D1',
                '300': '#2D8DBF',
                '400': '#26749E',
                '500': '#2C4452'
            },
            // 'blue-dark': '#0E2A3F',
            bluedark: {
                '100': '#74B1DF',
                '200': '#2C84C7',
                '300': '#216294',
                '400': '#2E4759',
                '500': '#0E2A3F'
            },
            // 'green': '#00A17E'
            green: {
                '100': '#40D5B4',
                '200': '#00CCA0',
                '300': '#00A17E',
                '400': '#009978',
                '500': '#174D41'
            }
        }
    },
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination'),
  ],
}
