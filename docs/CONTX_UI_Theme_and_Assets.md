# CONTX_UI_Theme_and_Assets
Legend: <span style="background:#9467bd;color:#fff;padding:2px 6px;border-radius:4px">UI</span> <span style="background:#1f77b4;color:#fff;padding:2px 6px;border-radius:4px">CORE</span> <span style="background:#ff7f0e;color:#fff;padding:2px 6px;border-radius:4px">API</span>.

## Core template files
- head.php: loads Google Fonts (Nunito Sans, Montserrat), Bootstrap, OverlayScrollbars, Glide, Intro.js, Select2, DataTables, Plyr, main styles `css/styles.css` and `css/main.css`; includes extensive meta tags for SEO/social.
- head-light.php / head-light2.php / head-sub.php: light/minimal variants for public/login pages.
- nav_bars.php: builds top navigation, user dropdown, notification bell, theme toggles; uses Acorn icon set.
- footer.php / theme_bar.php / theme_color.php / theme_layout.php: manage footer and theme customization controls.
- scripts.php: global JS loader (jQuery 3.7.1, Bootstrap bundle, DataTables, Chart.js, Select2, Intro.js, html2canvas, jsPDF, Glide, Plyr). Adds notification modal, helper printPDF functions, and conditionally loads jQuery UI for task/appointment managers.

## Asset directories
- css/: compiled vendor and custom CSS. 
- js/: vendor and app JS helpers (`js/base/*`, `js/plugins/*`, `js/pages/dashboard.default.js`).
- assets/: misc images (logos, animated gifs), voice scripts (`voice-script4.js`), and search banners.
- theme-1/: full admin theme distribution (CSS, JS, images) with 2689 files; likely Acorn dashboard template customized.
- font/, icon/: icon font packs used by UI.
- images/, img/: additional logos, favicon sizes, marketing imagery.
- media/, uploads/, signatures/, voice_search/: user-generated assets (ensure writable and protected from execution).

## Visual behaviors
- Mobile footer injected in index.php when not APP view; uses Bootstrap icons (acorn) and fixed bottom bar.
- Offcanvas panels (top, left, right) defined in index.php for search, filters, AI suggestions.
- Walkthrough modal loads modules/walkthrough.php when assistant flag enabled.
- Voice search modal uses voice-script assets; records WebM to voice_search/ and triggers server voice_data.php.

## PDF/print UX
- scripts.php defines printPDF/printPDF2 using html2canvas + jsPDF to capture DOM sections into downloadable PDFs (Budget breakdown, client SOS quotation).

## Theming notes
- Color toggle (light/dark) handled via `#colorButton` in nav_bars.php and CSS classes.
- Many style overrides live in css/main.css and theme-1 assets; no build step required because compiled assets are committed.
