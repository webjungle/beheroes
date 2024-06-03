<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beheroes
 */

?>

<footer id="colophon" class="site-footer">
   <div class="footer-grid">
      <div class="div1 footerlinks">
      <?php
      if( have_rows('footer_links', 'option') ):
          while( have_rows('footer_links', 'option') ) : the_row();
              $link = get_sub_field('footer_link', 'option');
              if( $link ):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif;
          endwhile;
      endif;
      ?>    
      <a href="#" data-glf-cuid="a82a4cb3-2da5-4d01-9271-0186ef767a84" data-glf-ruid="2a48da76-97b6-4dcb-a686-ccf3e0b01dea" data-glf-reservation="true">Tisch reservieren</a>   
      </div>
      <div class="div2 restinfos">
         <div class="partnerlogos">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/partner/deindeal.png" alt="deindeallogo" title="deindeallogo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/partner/poinz.png" alt="poinzlogo" title="poinzlogo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/partner/tgtg.png" alt="too good to go" title="too good to go">
         </div>
        <div class="paymentlogos">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/maestro.svg" alt="maestro" title="maestro">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/mastercard.svg" alt="mastercard" title="mastercard">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/visa.svg" alt="visa" title="visa">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/vpay.svg" alt="vpay" title="vpay">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/twint.svg" alt="twint" title="twint">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/google.svg" alt="google" title="google">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/paymentlogos/apple.svg" alt="apple" title="apple">
        </div>
      </div>
      <div class="div3 footerlogosection">
         <img class="logofooter" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logodark.png" class="logofooter" />
      </div>      
      <div class="div4 footerhoriz">
         <div class="language">
            <div id="weglot_here"></div>
         </div>
      </div>
      <p class="copy">© 2023 – BE HEROES – Asian Street Food Restaurant</p>
   </div>
   
</footer><!-- #colophon -->
</div><!-- #page -->

<script>
 jQuery(document).ready(function() {
   jQuery("a").on('click', function(event) {
     if (this.hash !== "") {
       event.preventDefault();
       var hash = this.hash;
       jQuery('html, body').animate({
         scrollTop: jQuery(hash).offset().top
       }, 1200, function() {
         window.location.hash = hash;
       });
     }
   });
 });
 jQuery(document).ready(function() {
   jQuery("body").css({opacity : "1"});
 });
</script>
<?php wp_footer(); ?>

</body>
</html>