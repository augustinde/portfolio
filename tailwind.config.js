/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,ts,js}"],
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

