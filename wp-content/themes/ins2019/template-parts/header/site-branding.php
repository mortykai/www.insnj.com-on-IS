<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<div class="site-branding">
	<div class="header-background" style="background-image:url('<?php echo get_stylesheet_directory_uri(). '/img/Website Header.jpg'; ?>');">
	</div><!-- .header-background -->

	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<nav id="site-navigation" class="main-navigation center-content" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">

			<button class="main-navigation-button">
				<svg preserveAspectRatio="none" viewBox="0 0 17 17">
					<line x2="100%" class="top-line"></line>
					<line x2="100%" class="bottom-line"></line>
					<line x2="100%" class="center-line"></line>
				</svg>
			</button>			
			  
			<div id="site-navigation-container" class="main-navigation-container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_class'     => 'main-menu center-content',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'container_id'	 => 'menu-main-container',
					)
				);
				?>
			</div>

		</nav><!-- #site-navigation -->
	<?php endif; ?>
	
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
					'depth'          => 1,
				)
			);
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>
	
	<div class="site-id">
	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo">
			<?php the_custom_logo(); ?>	
		</div>
			<h6 class="company-name">
				<span><?php bloginfo( 'name' ); ?></span>
			</h6>
			<h6 class="company-phone">
				<div id="phone">973-299-8800</div>
			</h6>
        <style>.site-title, .site-description{ display:none!important}</style>
	<?php endif; ?>
	
	<?php $blog_info = get_bloginfo( 'name' ); ?>
	<?php if ( ! empty( $blog_info ) ) : ?>
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) :
		?>
			<p class="site-description">
				<?php echo $description; ?>
			</p>
	<?php endif; ?>
	</div>

</div><!-- .site-branding -->
<!--	</div>-->
