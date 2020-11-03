const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
      './resources/views/*.php',
      './resources/views/*/*.php'
  ],
  theme: {
   // colors: defaultTheme.colors,
    extend: {},
    fontFamily:{
      'montserrat': ['Montserrat', 'Helvetica', 'Arial', 'sans-serif']
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ],
}
