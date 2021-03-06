<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Travel Insight
 * @since Travel Insight 0.1
 */

get_header(); 
?>
<div class="wrapper page-section no-padding-bottom">
	<div id="primary" class="content-area <?php echo ( false == travel_insight_is_sidebar_enable() ) ? 'col-2' : 'col-1'; ?>">
	  	<main id="main" class="site-main" role="main">
	  		<div class="blog-text clear">
				<?php
				if ( have_posts() ) : 

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 
				
				/**
				* Hook - travel_insight_action_pagination.
				*
				* @hooked travel_insight_pagination
				*/
				do_action( 'travel_insight_action_pagination' ); 
				?>
			</div><!-- .blog-text -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	if ( travel_insight_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div>
<?php
get_footer();
