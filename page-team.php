<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php
 
$args = array(
    // Arguments for your query.
    'category_name' => 'founder'
);
 
// Custom query.
$query = new WP_Query( $args );
 var_dump($query);
// Check that we have query results.
if ( $query->have_posts() ) {
 
    // Start looping over the query results.
    while ( $query->have_posts() ) {
 
        $query->the_post();
 		print get_the_title();
        // Contents of the queried post results go here.
 
    }
 
}
 
// Restore original post data.
wp_reset_postdata();
 
?>

		
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
