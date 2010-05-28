=== Sort Query by Post In ===
Contributors: Jacob M Goldman (C. Murray Consulting)
Donate link: http://www.cmurrayconsulting.com/software/wordpress-sort-query-by-post-in/
Tags: post query, query, wp query, developer, orderby, order
Requires at least: 2.7
Tested up to: 3.0-beta2
Stable tag: 1.1

A very simple plug-in that allows post queries to sort the results by the order specified in the "post__in" parameter.

== Description ==

Sort Query by Post In is a very light weight (about 4-7 lines of code, version specific!) plug-in intended for developers 
executing custom post queries. You're welcome to include it in your theme and redistribute - just offer us some credit, please!

When constructing a WordPress post query in your theme template files or plug-in, WordPress offers the option to explicitly 
specify the posts to retrieve using the `post__in` parameter. Unfortunately, the `orderby` parameter does not offer an option 
that will sort the result by the exact order passed in the post__in parameter. This plug-in adds a `post__in` option for the 
`orderby` parameter that will order the result by the exact order specified in the `post__in` parameter.

And don't worry about the plug-in being deactivated - your post queries with the new `post__in` value used for `orderby` 
will simply gracefully fall back to the default date sorting.


== Installation ==

1. Install easily with the WordPress plugin control panel or manually download the plugin and upload the extracted
folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Modify the appropriate post queries with the `orderby` parameter set to `post__in`

= Example =

`query_posts( array( 'post__in' => array(20,10,106),  'orderby' => 'post__in' ) );`

That will retrieve posts with IDs 20, 10, and 106 in that order!