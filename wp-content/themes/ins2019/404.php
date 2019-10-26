<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
				
			<div class="<?php echo $classes; ?>">
				<h1 class="entry-title"><?php _e( 'Page not found', 'twentynineteen' ); ?></h1>
			</div><!-- .entry-header -->
					
		<main id="main" class="site-main">
			<article class="error-404 not-found page type-page status-publish has-post-thumbnail hentry entry">
				<div class="page-content">
					<h3 style="text-align: center;"><?php _e( 'Sorry, that page was not found.', 'twentynineteen' ); ?></h1>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</article><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

	<section class="featured-image">

				<div class="site-featured-image">
					<figure class="post-thumbnail">
						<div id="404-page" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" style="background-image: url( &quot;/wp-content/uploads/2019/07/homepage-cropped.jpg&quot;)">
						</div>	
					</figure><!-- .post-thumbnail -->
				</div><!-- .site-featured-image -->

	</section> <!-- .featured-image -->
	
<?php
get_footer();
