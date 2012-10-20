<?php
/**
 Plugin Name: Sort Query by Post In
 Plugin URI: http://10up.com/plugins/sort-query-by-post-in-wordpress/
 Description: Allows post queries to sort the results by the order specified in the <em>post__in</em> parameter. Just set the <em>orderby</em> parameter to <em>post__in</em>! 
 Version: 1.2.3
 Author: Jake Goldman, 10up, Oomph
 Author URI: http://10up.com
 License: GPLv2 or later
*/

if ( version_compare( floatval( get_bloginfo( 'version' ) ), '3.5', '>=' ) ) {

	add_action( 'admin_init', 'sort_query_by_post_in_deactivate' );
	add_action( 'admin_notices', 'sort_query_by_post_in_admin_notice' );

	function sort_query_by_post_in_deactivate() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	function sort_query_by_post_in_admin_notice() {
		echo '<div class="updated"><p><strong>Sort Query by Post In plug-in</strong> was folded into WordPress core in 3.5; the plug-in has been <strong>deactivated</strong>.</p></div>';
		if ( isset( $_GET['activate'] ) )
			unset( $_GET['activate'] );
	}

} else {

	add_filter( 'posts_orderby', 'sort_query_by_post_in', 10, 2 );

	function sort_query_by_post_in( $sortby, $thequery ) {
		if ( !empty($thequery->query['post__in']) && isset($thequery->query['orderby']) && $thequery->query['orderby'] == 'post__in' )
			$sortby = "find_in_set(ID, '" . implode( ',', $thequery->query['post__in'] ) . "')";

		return $sortby;
	}

}