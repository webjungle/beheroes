<?php /* Template Name: Home */

wp_enqueue_style( 'mapboxcss', get_stylesheet_directory_uri() . '/assets/mapbox/mapbox-gl.css' );
wp_enqueue_script( 'mapboxjs', get_stylesheet_directory_uri() . '/assets/mapbox/mapbox-gl.js' );

wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
wp_enqueue_style( 'hover', get_stylesheet_directory_uri() . '/assets/css/hover.css' );
wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/main.css' );
wp_enqueue_style( 'home-style', get_stylesheet_directory_uri() . '/css/home.css' );

get_header(); ?>

<main id="primary" class="site-main">
	<div class="first-section">
		<div class="grid-master">
			<div class="div1 cool-box box-big box-main" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.6) 100%), url(<?php the_field('home_intro_bg'); ?>);">
				<h2><?php the_field('home_intro_titel'); ?></h2>
				<h1>BE HEROES - authentische asiatische Fusionsküche</h1>
				<p><?php the_field('home_intro_text'); ?></p>
				<?php 
				$link = get_field('home_intro_link');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="button text-button hvr-skew button-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
			<?php $locationloop = new WP_Query(
			array(
				'post_type' => 'standort',
				'posts_per_page' => -1,
				)
			);
			while ( $locationloop->have_posts() ) : $locationloop->the_post(); ?>
			<div class="cool-box box-small" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.6) 100%), url(<?php the_field('standort_bg_bild'); ?>);">
				<p class="location">Standort</p>
				<h2 style="color:<?php the_field('standort_farbe'); ?>"><?php the_title(); ?></h2>
				<p><?php the_field('standort_intro'); ?></p>
				<a class="button text-button hvr-skew button-white" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Restaurant ansehen</a>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
	
	<div id="order" class="order-section" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.31) 100%), url(<?php the_field('bg_delivery_take_away'); ?>);">
		<div class="grid-1-1">
			<div class="div1">
				<h2 class="white">Take Away & Delivery</h2>
				<div class="badge-buttons-section">
					<ul class="badge-buttons">
						<a data-glf-cuid="6feb9392-e0f6-4fc0-96e0-2afe04cfab46" data-glf-ruid="58dbcaff-2b0e-49bd-9f59-5362a25e1b5f">							
							<li class="badgebutton buttonpink hvr-grow-rotate">
								<i class="fa-sharp fa-light fa-bag-shopping"></i>
								Take-Away
							</li>
						</a>
						<a href="https://www.just-eat.ch/speisekarte/be-heroes" target="_blank">
							<li class="badgebutton buttonorange hvr-grow-rotate">
								<i class="fa-regular fa-pot-food"></i>
								Delivery<br>(Eat.ch)
							</li>
						</a>
						<a href="https://www.ubereats.com/ch/store/be-heroes-schlieren/opkhoYiQTTaOZ5Szltob1w" target="_blank">
							<li class="badgebutton buttonuber hvr-grow-rotate">
								<i class="fa-sharp fa-light fa-bicycle"></i>
								Delivery<br>(UberEats)
							</li>
						</a>
						<a href="https://www.mosi.ch/de/Restaurant/BeHeroesSchlieren/857" target="_blank">
							<li class="badgebutton buttomosi hvr-grow-rotate">
								<i class="fa-sharp fa-regular fa-sushi"></i>
								Delivery<br>(mosi.ch)
							</li>
						</a>	
					</ul>
				</div>
			</div>
			<div class="div2">
				<h2 class="white">Tisch Reservieren</h2>
				<div class="places-badhes">
					<a data-glf-cuid="a82a4cb3-2da5-4d01-9271-0186ef767a84" data-glf-ruid="2a48da76-97b6-4dcb-a686-ccf3e0b01dea" data-glf-reservation="true">
						<li class="badgebutton buttonpink hvr-grow-rotate">
							<i class="fa-solid fa-table-picnic"></i>
							Schlieren Bahnhof
						</li>
					</a>
				</div>
			</div>		
		</div>
	</div>
	
	<!--
	<div id="videobgv">
		<iframe id="bg" src="https://player.vimeo.com/video/945240127?background=1" width="auto" height="auto" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	-->
	
	<?php include 'template-parts/newsletter.php'; ?>
	<?php include 'template-parts/dealsgrid.php'; ?>
	
	<!--
	<div class="socialsection">
		<div class="socialtextbox">
			<h3>Folge uns auf Instagram</h3>
			<h4>@beheroes.ch</h4>
		</div>	
	</div>
	-->
	
	<?php include 'template-parts/map.php'; ?>

	<!--
	<div class="partnersection">
		<h2>Wir sind stolz auf unsere partner!</h2>
		<img src="" class="logo" alt="" title=""/>
	</div>
	--->
</main>

<?php get_footer(); ?>