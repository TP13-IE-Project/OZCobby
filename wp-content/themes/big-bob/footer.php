<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Big_Bob
 */

?>
	<?php
	if ( (!is_active_sidebar( 'sidebar-1' ) && is_page())
		|| (is_active_sidebar( 'sidebar-1' ) && is_page() &&
			((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'On') 
				|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Home Only') && is_front_page()) 
				|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Except Home') && !is_front_page()) )  ) ) :
		?>
		<main id="primary" class="site-footer bb-aligncenterstyle bb-wide-footer">
		<?php
	else :
		?>
		<footer id="colophon" class="site-footer bb-aligncenterstyle">
		<?php
	endif;
	?>
		<div class="bb-social-media-icons">
			<?php 
			if (get_theme_mod('big_bob_footer_url_LinkedIn') != "") {
                $big_bob_url = get_theme_mod('big_bob_footer_url_LinkedIn');
			?>
				<a href="<?php echo esc_url_raw($big_bob_url);?>">
				<i class="fab fa-linkedin"  alt="linked in"></i>
				</a>
			<?php
			}
			if (get_theme_mod('big_bob_footer_url_Twitter') != "") {
                $big_bob_url = get_theme_mod('big_bob_footer_url_Twitter');
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fab fa-twitter"  alt="twitter"></i>
					</a>
			<?php
			}
			if (get_theme_mod('big_bob_footer_url_YouTube') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_YouTube');//sanitized by mod
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fab fa-youtube" alt="youtube"></i>
					</a>
			<?php
			}
			if (get_theme_mod('big_bob_footer_url_GitHub') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_GitHub');//sanitized by mod
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fab fa-github" alt="github"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_footer_url_Instagram') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_Instagram');//sanitized by mod
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fab fa-instagram" alt="instagram"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_footer_url_WordPress') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_WordPress');//sanitized by mod
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fab fa-wordpress" alt="wordpress"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_footer_url_Facebook') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_Facebook');//sanitized by mod 
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fab fa-facebook"  alt="facebook"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_footer_url_GooglePlus') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_GooglePlus');//sanitized by mod 
				?>
					<a href="<?php echo esc_url_raw($big_bob_url);?>">
					<i class="fab fa-google-plus-g" alt="google plus"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_footer_url_Yelp') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_Yelp');//sanitized by mod 
				?>
					<a href="<?php echo esc_url_raw($big_bob_url);?>">
					<i class="fab fa-yelp" alt="yelp"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_footer_url_Pinterest') != "") {
				$big_bob_url = get_theme_mod('big_bob_footer_url_Pinterest');//sanitized by mod 
				?>
					<a href="<?php echo esc_url_raw($big_bob_url);?>">
					<i class="fab fa-pinterest" alt="pinterest"></i>
					</a>
				<?php
			}
			if (get_theme_mod('big_bob_email_address') != "") {
				$big_bob_url = get_theme_mod('big_bob_email_address');//sanitized by mod
				?>
					<a href="mailto:<?php echo esc_attr($big_bob_url); ?>">
					<i class="fas fa-envelope-square"  alt="email"></i>
					</a>
				<?php
			}
			?>
		</div><!--Social Media Icons-->
		<div class="bb-social-media-icons">
		<?php
			if ((get_theme_mod('big_bob_address_line_1') != "") ||  (get_theme_mod('big_bob_address_line_2') != "") || (get_theme_mod('big_bob_address_line_3') != "")){
				?>
				<p>
			<?php
			}
			if (get_theme_mod('big_bob_address_line_1') != "") {
				$big_bob_AL = get_theme_mod('big_bob_address_line_1');//sanitized by mod
					echo esc_html($big_bob_AL);?><br/>
				<?php
			}
			if (get_theme_mod('big_bob_address_line_2') != "") {
				$big_bob_AL = get_theme_mod('big_bob_address_line_2');//sanitized by mod
					echo esc_html($big_bob_AL);?><br/>
				<?php
			}
			if (get_theme_mod('big_bob_address_line_3') != "") {
				$big_bob_AL = get_theme_mod('big_bob_address_line_3');//sanitized by mod
					echo esc_html($big_bob_AL);?><br/>
				<?php
			}if ((get_theme_mod('big_bob_address_line_1') != "") ||  (get_theme_mod('big_bob_address_line_2') != "") || (get_theme_mod('big_bob_address_line_3') != "")){
				?>
				</p>
			<?php
			}
			if (get_theme_mod('big_bob_google_maps_address') != "") {
				$big_bob_url = get_theme_mod('big_bob_google_maps_address');//sanitized by mod
				?>
					<a href="<?php echo esc_url_raw($big_bob_url); ?>">
					<i class="fa fa-map-marked-alt"></i>
					</a>
				<?php
			}
			?>
			
		</div>
		<?php get_sidebar('footer-1'); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'big-bob' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Powered by %s', 'big-bob' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'big-bob' ), '<a href="https://wordpress.org/themes/big-bob/">big-bob</a>', '<a href="https://bigbobnetwork.com/">BigBobNetwork</a>' );
				?>
		</div><!-- .site-info -->
		<a id="bb-back-to-top" href="#" class="btn btn-light btn-lg bb-back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
