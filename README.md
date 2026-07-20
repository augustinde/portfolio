# Portfolio
This is a portfolio of my work. It includes a variety of projects that I have worked on.

Static HTML/CSS/JS site styled with Tailwind CSS (no framework).

## Development
```
npm install
npm run watch   # rebuilds css/styles.css on change
```
Then open `index.html` directly in a browser, or serve the folder with any static file server.

## Build
```
npm run build
```
Compiles and minifies `css/input.css` into `css/styles.css`.

## Deploy
Pushing to `main` triggers `.github/workflows/deploy.yml`, which builds the CSS and publishes to GitHub Pages.

v2.0.0
