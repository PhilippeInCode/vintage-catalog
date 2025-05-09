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
        sans: ['Vollkorn', ...defaultTheme.fontFamily.sans],
      },

      colors: {
        orange: '#E6A974',
        beige:  '#E7CDB6',
        brown:  '#7D6E60',
        ivory:  '#F2EBE4',
      },
    },
  },

  plugins: [
    forms,
  ],
};
