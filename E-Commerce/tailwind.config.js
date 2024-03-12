/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'Futura': ['Futura'],
        'Font-Products': ['Product Sans'],
      },
    },
  },
  plugins: [],
}