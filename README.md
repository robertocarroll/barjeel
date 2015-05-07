barjeel
=======

The WordPress theme for the Barjeel website. Uses SASS and Gridset. Includes lots of things to do with custom taxonomies.  

## Home title 
1. Pages > Home
2. SEO Title
3. Meta description

## Upgrade process
1. Backup the site - Run the backup in BackWPup - "Barjeel to Dropbox - (Rob) - sending to s.barjeel"
2. Test the backup locally
3. Turn off Quick Cache
4. Update plugins 
5. Update WordPress
6. Reactivate caching plugin
7. Check the site

## Update local / dev version
1. Download BackWPup zip
2. Copy the wp-config.php file from the local version
2. Overwrite the WordPress folder 
3. Rename wp-config.php to wp-config-live-version.php
4. Paste the wp-config.php file in (this is the local version)
5. Go to phpMyAdmin 
6. Click "Databases" and select the database that you will be importing your data into. 
7. Check the name is the same as the backup
8. Import
9. Browse 
10. SQL format
11. Click go
12. Log in to WordPress
13. Update the site url to http://localhost:8888/barjeel