<?php /* Template Name: Legal */
wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/main.css' );
wp_enqueue_style( 'legal-style', get_stylesheet_directory_uri() . '/css/legal.css' );

get_header(); ?>

<main id="primary" class="site-main">
	<div class="legal-cont">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</main>

<?php get_footer(); ?>