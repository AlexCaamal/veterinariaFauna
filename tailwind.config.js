/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}",
        "./src/webadmin/**/*.{html,js,php}",
        "./src/webstaff/**/*.{html,js,php}",
        "./src/webclient/**/*.{html,js,php}",
        "./*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily:{
        body:['Dancing Script']
      }
    },
  },
  plugins: [],
  variants: {
    extend: {
        display: ["group-hover"],
    },
  },
}
