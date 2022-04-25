module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'dmmmsu': "url('https://www.dmmmsu.edu.ph/wp-content/uploads/2019/06/DMMMSU-Logo-Final.png')"
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
