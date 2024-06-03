<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beheroes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PC45RHK7');</script>
	<!-- End Google Tag Manager -->
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">	
	<script src="https://www.fbgcdn.com/embedder/js/ewm2.js" defer async ></script>
	<script async type="text/javascript" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=YAftXm"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PC45RHK7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'beheroes' ); ?></a>
	<div class="header">
		
		<?php if (wp_is_mobile()) { ?>
		<a class="logomobile" href="<?php echo get_home_url(); ?>" title="gotohome">	
			<img class="logomobile" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logoface.png" title="logo" alt="logo"/>
		</a>
		<div class="menu-wrap">
			<input type="checkbox" class="toggler">
			<div class="hamburger"><div></div></div>
			<div class="menu">
			  <div>
				<div>
					<a class="logo" href="<?php echo get_home_url(); ?>" title="gotohome">
						<img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logowhite.png" title="logo" alt="logo"/>
					</a>
					<div class="languages">
						<div id="weglot_here"></div>
					</div>
					<div class="menu-grid">
						<div class="main-menu">
							<ul>
							<?php $placesloop = new WP_Query(
							array(
								'post_type' => 'standort',
								'posts_per_page' => -1,
								)
							);
							while ( $placesloop->have_posts() ) : $placesloop->the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; wp_reset_postdata(); ?>	
							</ul>
						</div>
						<!--
						<div class="deals-menu">
							<ul>
							<?php $placesloop = new WP_Query(
							array(
								'post_type' => 'angebot',
								'posts_per_page' => -1,
								)
							);
							while ( $placesloop->have_posts() ) : $placesloop->the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; wp_reset_postdata(); ?>	
							</ul>
						</div>
						-->
					</div>
					<div class="footer-menu">
					<?php wp_nav_menu(array(
							'theme_location' => 'menu-1',
							'container'		=> false,
							'menu_class'=> false,
						)
					);?>
					</div>
				</div>
			  </div>
			</div>
		</div>
		<?php } else { ?>
			<div class="menudeskcont">
			<a class="logodesk" href="<?php echo get_home_url(); ?>" title="gotohome">
				<img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logofacedark.png" title="logo" alt="logo"/>
			</a>
			<ul>
			<?php $placesloop = new WP_Query(
			array(
				'post_type' => 'standort',
				'posts_per_page' => -1,
				)
			);
			while ( $placesloop->have_posts() ) : $placesloop->the_post(); ?>
				<li class="location"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; wp_reset_postdata(); ?>	
			</ul>
			<?php wp_nav_menu(array(
				'theme_location' => 'menu-1',
				'container'		=> false,
				'menu_class'=> 'menudesk',
				)
			); ?>
				<div class="language">
					<div id="weglot_here"></div>
				</div>
			</div>
			<?php } ?>
	</div>
	</header><!-- #masthead -->