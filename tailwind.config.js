/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        "poppins" : "Poppins" 
      },
      colors: {
        "primarySD" : "#FF4B43",
        "bodyText" : "#767676",
        "primary" : "#0096ff",
        "placeholder" : "#a3a3a3",
        "primaryInp" : "#c2c2c2",
        "light_blue" : "#f2f5ff"
      },
      screens: {
        'notebook': '930px',
        'small' : '500px'
      },
      gridTemplateRows: {
        '12': 'repeat(12, minmax(0, 1fr))'
      }
    },
  },
  plugins: [],
}