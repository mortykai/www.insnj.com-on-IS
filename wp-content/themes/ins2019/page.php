<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
				
		<?php if( !is_front_page()) : ?>
			<div class="<?php echo $classes; ?>">
				<?php ins2019_the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div><!-- .entry-header -->
			<?php rewind_posts(); ?>
		<?php endif; ?>
					
		<main id="main" class="site-main">
			
			<?php
				have_posts();
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
			?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->

					</article><!-- #post-<?php the_ID(); ?> -->
			<?php
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<section class="featured-image">

			<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
				<div class="site-featured-image">
					<figure class="post-thumbnail">
						<div id="post-<?php the_ID(); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" style="background-image: url( &quot;<?php the_post_thumbnail_url(); ?>&quot;)">
						</div>	
					</figure><!-- .post-thumbnail -->
					<?php
						the_post();
					?>
				</div><!-- .site-featured-image -->
			<?php endif; ?>

	</section> <!-- .featured-image -->

	<section id="widget-area">
		<?php if( is_front_page()){ get_template_part( 'template-parts/footer/footer', 'widgets' );} ?>
	</section><!-- #widget-area -->
	
<?php
get_footer();
