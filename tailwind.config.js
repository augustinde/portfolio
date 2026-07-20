/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.html", "./fude/**/*.html", "./js/**/*.js"],
  theme: {
    extend: {
		fontFamily: {
			'poppins': ['Poppins', 'sans-serif'],
			'mono': ['"Fira Code"', 'ui-monospace', 'SFMono-Regular', 'Menlo', 'monospace'],
		}
	},
  },
  plugins: [],
}
