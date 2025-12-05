import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Helvetica Neue', 'sans-serif', ...defaultTheme.fontFamily.sans],
      },
      // Je définis les couleurs exactement comme demandé pour correspondre à la maquette
      // Note: 'white' est utilisé pour le fond beige, 'black' pour le texte/boutons
      colors: {
        black: '#22201E',
        white: '#F2EADF', // Le beige de la maquette
        red: '#F2614B',
        blue: '#97E5FF',
        yellow: '#F2DF4B',
        green: '#C3F24B',
        orange: '#F2B24B',
        purple: '#F4AEF9'
      }
    },
  },

  plugins: [forms],
};