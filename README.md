The WordPress theme for the Barjeel website. Uses SASS and Gridset. Includes lots of things to do with custom taxonomies.

### Templates
* catalogue.php - For the round image with truncated title. Loaded in to category-collection.php via get_template_part
* news.php - Template for the news posts. Loaded in to category-news.php via get_template_part
* no-results.php - Template for the no results. Loaded in to archive.php and search.php via get_template_part
* yarpp-template-thumbs.php - for the related posts shown using the YARPP plugin

### Category layouts
* category-collection.php - Main layout for the collection. Loads catalogue.php as template for images
* category-exhibitions.php - Main layout for exhibitions. A custom function in functions.php changes the number of posts per page to 8.
* category-news.php - Main layout for news and press. News themes load this file as a template.
* category-non-arab-art.php - Main layout for private collection. No links in this layout.

### Single layouts
* content-aside.php - Single exhibition - Format - Exhibitions. Category - Exhibitions
* content-image.php - Single artwork from collection. Format - Image. Category - Collection
* content-page.php - page.php loads this file as a template
* content-link.php - Single artwork from private collection. Format - Link. Category - non-Arab art. This layout is only used in search. No link from category-non-arab-art.php
* content-single.php - The default for posts, e.g. news (single.php has an if statement in to point the post format at the correct template)

### Pages
* page-artist.php - list of artists A-Z (link from side of collections layout)
* page-contact.php - Google Maps. All the rest of the content is hard-coded in the content of the page called "contact & about"
* page-country.php - list of countries and artists A-Z (link from side of collections layout)
* page-home.php - landing layout of the website, ie barjeelartfoundation.org
* page-news-categories.php - lists all news categories (link from see more on news themes)
* page-random.php - powers the random button at the top of the image layout
* page-wide.php - Takes up all the columns. Used on the Visit Sharjah page

### Taxonomy layouts
* taxonomy-artist.php - used for artists and countries with a conditional check
* taxonomy-news-themes.php - loads category-news.php as a template
* taxonomy.php - loads category-collection.php as a template. Used for Movements, Themes, Medium
* taxonomy-non-arab-artist.php - Loads category-non-arab-art.php as a template. Get to it from links to artists from the private collection page.

### Standard WP layouts
* content.php - standard WP file. Not in use as far as I can tell
* footer.php - standard WP file
* header.php - standard WP file
* index.php - standard WP file. Not in use as far as I can tell

### Search
* search.php
* seachform.php

### Menus
* curated selections - controls the links on the top of the collections layout
* artists - controls the list on the side of the collections layout
* country - controls the list on the side of the collections layout
* medium - controls the list on the side of the collections layout
* news and press - controls the list on the top of the news and press layout

## More notes on different posts
### Artworks are posts
CATEGORY: Collection
Taxonomies: Country > Artist, Movement, Theme, Medium
Format: Image
TEMPLATE: content-image.php
NOTES: Use custom field Name <exhibitions> Value <a href="/wordpress/exhibitions/peripheral-vision/">Peripheral Vision</a> to add links to the exhibitions the artwork features in.

### Countries are terms in taxonomy artist
TEMPLATE: taxonomy-artist.php (with conditional to check if parent)

### Artists are terms in taxonomy artist
TEMPLATE: taxonomy-artist.php (with conditional to check if child)

### Movements, Themes, Medium are taxonomies
TEMPLATE: taxonomy.php

### Exhibitions are posts
CATEGORY: Exhibitions
Taxonomies: Theme, country, artist?
Format: Exhibitions
TEMPLATE: content-aside.php for single and category-exhibitions.php for posts
NOTES:
In content-aside.php:
Use custom field Name <artists> Value <a href="/wordpress/artist/lebanon/zena-assi/">Zena Assi</a> to add links to the artists in the exhibition

In category-exhibitions.php
Three loops on the page:
One to feature a post - use sticky
One selects future posts - Published [not restricted to category Exhibitions at the moment]
One gets all the rest of the exhibitions [past not in sticky]

### Press releases are posts
CATEGORY: News
Taxonomies: Theme, country, artist?
Format: Standard
TEMPLATE: content-single.php

### Downloads
CATEGORY: Downloads
Format: downloads
Attach a cropped image
Add a custom field 'pdflink' with the link to the pdf

## Home title
1. Pages > Home
2. SEO Title
3. Meta description

## Icons
SVG with a png backup implemented using Modernizr .no-svg class.

1. Put an SVG and an SVG-hover in images/original
2. Run Grunt build
3. svgmin will trim all the rubbish off the SVGs and put them in images/svg
4. svg2png will create PNGs
5. Add the classes to CSS
6. <div class="icon icon-12 facebook">
7. Different sizes: icon-12, icon-24, icon-48, icon-72, icon-96

For an inline icon use: <span class="icon icon-24 press-1 inline-icon"></span>

## Site scan
[Site check](https://sitecheck.sucuri.net/)

## Upgrade process
1. Backup the site - Replaced BackWPup with UpdraftPlus. Still goes to Dropbox but in a different folder.
2. Test the backup locally
3. Turn off Quick Cache
4. Update plugins
5. Update WordPress
6. Reactivate caching plugin
7. Check the site

## Update local / dev version
1. Download BackWPup zip
2. Copy the wp-config.php file from the local version
3. Copy the barjeel themes folder (these are the working files - git repo)
4. Overwrite the WordPress folder
5. Rename wp-config.php to wp-config-live-version.php
6. Paste the wp-config.php file in (this is the local version)
7. Go to phpMyAdmin
8. Click "Databases" and select the database that you will be importing your data into.
9. Check the name is the same as the backup
10. Import
11. Browse
12. SQL format
13. Click go
14. Log in to WordPress
15. Update the site url to http://localhost:8888/barjeel
