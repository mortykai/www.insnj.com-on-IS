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
				
		<div class="entry-header">
			<h1 class="entry-title"><?php echo ins2019_get_the_title(); ?></h1>
			<h2 class="phone">973-299-8800</h2>
		</div><!-- .entry-header -->
		<?php rewind_posts(); ?>
					
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
					<?php
						twentynineteen_post_thumbnail();
						the_post();
					?>
				</div><!-- .site-featured-image -->
			<?php endif; ?>

	</section> <!-- .featured-image -->

	<section id="widget-area">
		<?php if( is_front_page()){ get_template_part( 'template-parts/footer/footer', 'widgets' );} ?>
	</section><!-- #widget-area -->

	<pre style="font-size: 12px">
		Send mail result: 
		<?php //echo wp_mail( "smorton@insnj.com", "Subject", "Message"); ?>
	</pre>	
<?php
get_footer();

