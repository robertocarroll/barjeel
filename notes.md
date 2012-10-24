Technical notes

**Artworks are posts** 
CATEGORY: Collection 
Taxonomies: Country > Artist, Movement, Theme, Medium
Format: Image
TEMPLATE: content-image.php
NOTES: Use custom field Name <exhibitions> Value <a href="/wordpress/exhibitions/peripheral-vision/">Peripheral Vision</a> to add links to the exhibitions the artwork features in.

**Countries are terms in taxonomy artist**
TEMPLATE: taxonomy-artist.php (with conditional to check if parent)

**Artists are terms in taxonomy artist**
TEMPLATE: taxonomy-artist.php (with conditional to check if child)

**Movements, Themes, Medium are taxonomies** 
TEMPLATE: taxonomy.php 

**Exhibitions are posts**
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
 



**Press releases are posts**
CATEGORY: Press releases
Taxonomies: Theme, country, artist?
Format: Standard
TEMPLATE: content-single.php



**Plugins**

WPML - Translation 
WordPress SEO
WP No Category Base - WPML compatible
Geo Mashup
Geo Mashup Custom


 