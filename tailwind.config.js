/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/*.php", "./app/components/*.{php, html}"],
  theme: {
    extend: {},
  },
  plugins: [
    function ({ addVariant }) {
      addVariant("child", "& > *");
    },
  ],
};
