/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/*.php",
    "./app/includes/*.{php, html}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    function ({ addVariant }) {
      addVariant("child", "& > *");
    },
  ],
};