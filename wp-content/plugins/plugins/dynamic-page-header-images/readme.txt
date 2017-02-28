=== Dynamic Page  Header Images ===
Contributors: praveencrony
Tags: dynamic header images, change header image dynamically, change page header images, dynamic page header images, add header image for pages.
Requires at least: 3.0 or higher
Tested up to: 4.3
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


A very simple and lightweight Plugin for managing custom header images for pages.Dynamically Add & Change Your page Header Images.

== Description ==
A very simple and lightweight Plugin for managing custom header images for pages.Use this plugin you can easy way to add/change/manage your page header images dynamically.

= Features Included =
*Login to wordpress admin
*Go to Pages menu --> Add New
*See Dynamic Header Image meta box.
*Upload your header image and publish post

*Show Page Header Image with img tag, copy and Paste below function to your theme header.php Theme Path: wp-content/themes/your-current-theme/header.php 

<code>
if(function_exists('dhi_get_headerimage_withtag'))
{ 
   echo dhi_get_headerimage_withtag(); 
}
</code>

*Get Page Header Image Url,copy and Paste below function to your theme header.php or where ever you want to get image url use this function.

<code>
if(function_exists('dhi_get_headerimage_url'))
{ 
    echo dhi_get_headerimage_url(); 
}
</code>

*Get Page Header Image Using Shortcode

*Login to your wordpress admin
*Go to Pages -> All Pages
*Click Edit link of any one page
*Paste below shortcode

<code>[dhi_headerimage] --> Get image with image tag </code>

<code>[dhi_headerimage img_tag='false'] -- > Get Image Url Only</code>

= Usage =
* Once install the plugin go to settings menu ->  User Guide- DHI
* Follow the mentioned Steps

= Problems and Support =
To get fastest response use the support page in the plugin area on WordPress.org

= Please Review! =
I would love some feedback. I will try and respond to any issues you might have.

= Comments, Feedback and Request Features =
To send any suggestions, comments, or feedback about this plugin send a [mail to us]
(plugin@phpboys.in). 

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Once install the plugin go to settings menu -> User Guide- DHI


== Changelog ==

= 1.0 =
First Release.

== Upgrade Notice ==

There is no need to upgrade just yet.

== Screenshots ==

1. This screen shot to plugin page corresponds to screenshot-1.(png|jpg|jpeg|gif).
2. This screen shot to settings menu page corresponds to screenshot-2.(png|jpg|jpeg|gif).
3. This screen shot to plugin settings page corresponds to screenshot-3.(png|jpg|jpeg|gif).
4. This screen shot to site preview corresponds to screenshot-4.(png|jpg|jpeg|gif).
5. This screen shot to site preview corresponds to screenshot-5.(png|jpg|jpeg|gif).
6. This screen shot to site preview corresponds to screenshot-6.(png|jpg|jpeg|gif).


