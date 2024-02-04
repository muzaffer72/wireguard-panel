

/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    "./node_modules/flowbite/**/*.js"
  ],



  plugins: [
    require('flowbite/plugin')({
      charts: true,
    }),
  ]

};
