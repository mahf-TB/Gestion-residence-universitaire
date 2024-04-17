/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    "./node_modules/primevue/**/*.{vue,js,ts,jsx,tsx}"
  ],
  theme: {
    extend: {
      colors: {
        "blue-4": "#0d1829",
        "blue-3": "#2c3e50",
        "blue-2": "#1D48A7",
        "blue-1": "#3C6DC6",
        "blue-0": "#D7E4F5",
        "fotsy": "#FFFFFF",
      },
      fontFamily: {
        Avenir: ["Avenir, Helvetica, Arial, sans-serif"]
      },
    },
  },
  plugins: [
    require("tailwindcss"),
    require("tailwindcss-animated"),
  ],
}

