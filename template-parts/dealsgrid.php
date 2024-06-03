<div class="deals-section">
	<div class="grid-deals">		
		<?php $locationloop = new WP_Query(
			array(
				'post_type' => 'angebot',
				'posts_per_page' => -1,
				'orderby' => 'rand',
			)
		);
		while ( $locationloop->have_posts() ) : $locationloop->the_post(); ?>
			<div class="cool-box box-small" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.31) 100%), url(<?php the_field('deal_img'); ?>);">
				<?php if (get_field('deal_limit_day')) { ?>
					<p class="deal-day"><?php the_field('deal_limit_day'); ?></p>
				<?php } ?>
				<?php if (get_field('deal_titel')) { ?>
					<h3 class="deal-title"><?php the_field('deal_titel'); ?></h3>
				<?php } ?>
				<h2><?php the_title(); ?></h2>
				<?php if (get_field('deal_limit_text')) { ?>
					<p class="deal-text"><?php the_field('deal_limit_text'); ?></p>
				<?php } ?>
				<a data-glf-cuid="a82a4cb3-2da5-4d01-9271-0186ef767a84" data-glf-ruid="2a48da76-97b6-4dcb-a686-ccf3e0b01dea" data-glf-reservation="true">
					<li class="badgebutton buttonpink hvr-grow-rotate">
						Tisch reservieren
					</li>
				</a>
			</div>
		
		<?php endwhile; wp_reset_postdata(); ?>
	
		<?php if (!is_front_page() ) { ?>
		</div>
		<div class="div4 cool-box box-small" style="background: linear-gradient(74.83deg, rgba(0, 0, 0, 0.85) 0.73%, rgba(0, 0, 0, 0.31) 100%), url(<?php the_field('newsletter_bg','option'); ?>);">
			<h2 style="color:<?php the_field('standort_farbe') ?>">Take Away<br>& Delivery</h2>
			<div class="badge-buttons-section">
				<ul class="badge-buttons">
					<a data-glf-cuid="a82a4cb3-2da5-4d01-9271-0186ef767a84" data-glf-ruid="2a48da76-97b6-4dcb-a686-ccf3e0b01dea">							
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
			<?php } ?>
	</div>
</div>
