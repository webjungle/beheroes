<?php
wp_enqueue_style( 'single-standort-style', get_stylesheet_directory_uri() . '/css/single-standorte.css' );

get_header(); ?>

<main id="primary" class="site-main">
	<div class="first-section">
		<div class="cool-box box-big box-main" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.31) 100%), url(<?php the_field('standort_bild') ?>);">
			<a class="badgebutton badge-big badge-detail-location" data-glf-cuid="a82a4cb3-2da5-4d01-9271-0186ef767a84" data-glf-ruid="2a48da76-97b6-4dcb-a686-ccf3e0b01dea" data-glf-reservation="true" style="background-color: <?php the_field('standort_farbe') ?>">
				Tisch reservieren
			</a>
			<h1 style="color:<?php the_field('standort_farbe'); ?>"><?php the_title(); ?></h1>
			<p><?php the_field('standort_intro'); ?></p>
			<?php the_content(); ?>
			<div class="links">
			<?php if( have_rows('standort_menu_karten') ) {
			while( have_rows('standort_menu_karten') ) { the_row();
				$file = get_sub_field('menu_file');
				if( $file ) { ?>
					<a target="_blank" class="button text-button button-white" href="<?php echo $file['url']; ?>"><?php the_sub_field('menu_name') ?></a>
				<?php }; }; } ?>
				<a class="button text-button button-white" href="#kontakt">Öffnungszeiten & Kontakt</a>
				<a class="button text-button button-white" data-glf-cuid="a82a4cb3-2da5-4d01-9271-0186ef767a84" data-glf-ruid="2a48da76-97b6-4dcb-a686-ccf3e0b01dea" data-glf-reservation="true">Tisch reservieren</a>
			</div>
		</div>
	</div>
		
	<div class="swiper restaurantslider">
		<?php $images = get_field('location_img');
		if( $images ): ?>
		<div class="swiper-wrapper">
			<?php foreach( $images as $image ): ?>
			<div class="swiper-slide">
				<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="swiper-pagination"></div>
	  </div>
	 
	  <script>
		  var swiper = new Swiper(".restaurantslider", {
			slidesPerView: 3,
			loop: true,
			spaceBetween: 0,
			freeMode: {
				enabled: true,
				sticky: false,
			},
			autoplay: {
			   delay: 3000,
			},
			breakpoints: {
				'1600': {
				  slidesPerView: 4,
				  spaceBetween: 0,
				},
				'1300': {
				  slidesPerView: 3,
				  spaceBetween: 0,
				},
				'1000': {
				  slidesPerView: 1.2,
				  spaceBetween: 0,
				},
				'100': {
				  slidesPerView: 1.1,
				  spaceBetween: 0,
				},
			  },
		  });
		</script>
	
	<?php include 'template-parts/dealsgrid.php'; ?>
	
	<div id="kontakt" class="contact-section" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.31) 100%), url(<?php the_field('standort_bg_bild') ?>);">
		<div class="grid-1-1">
			<div class="div1">
				<h2 style="color:<?php the_field('standort_farbe'); ?>""><?php the_title(); ?></h2>
				<div class="adresse">
					<span><?php the_field('standort_adresse') ?></span>
				</div>
				<div class="contact">
					<span><?php the_field('standort_telefon_nummer') ?></span>
					<span><?php the_field('standort_mail') ?></span>
				</div>
			</div>
			<div id="kontakt" class="div2">
				<h2>Öffnungszeiten</h2>
				<span><?php the_field('standort_open') ?></span>
			</div>
		</div>
	</div>
	
	<?php include 'template-parts/map.php'; ?>
	<?php include 'template-parts/newsletter.php'; ?>
	
</main>

<?php get_footer(); ?>