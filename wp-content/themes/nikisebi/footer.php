<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nikisebastino
 */

?>

	</div><!-- #content -->
	<div class="container-fluid border-top">
		<div class="container">
			<div class="row">
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div class="site-info">
						<?php
						$site_title = get_bloginfo( 'name' );
						$site_description = get_bloginfo( 'description' );
						$privacy = get_page_by_title('Privacy Policy');
						$terms = get_page_by_title('Terms and Conditions');
						$contact = get_page_by_title('Contact');
						$policies = get_page_by_title('General Policies');
						$resources = get_page_by_title('Client Resources');

						$privacy_link = ($privacy) ? '<a href="'.get_permalink($privacy->ID).'">'.$privacy->post_title.'</a>' : '';
						$terms_link = ($terms) ? '<a href="'.get_permalink($terms->ID).'">'.$terms->post_title.'</a>' : '';
						$contact_link = ($contact) ? '<a href="'.get_permalink($contact->ID).'">'.$contact->post_title.'</a>' : '';
						$policies_link = ($policies) ? '<a href="'.get_permalink($policies->ID).'">'.$policies->post_title.'</a>' : '';
						$resources_link = ($resources) ? '<a href="'.get_permalink($resources->ID).'">'.$resources->post_title.'</a>' : '';
						?>
						<p class="text-center-mobile">&copy; <?php echo date('Y')?> <a href="https://www.fatlabwebsupport.com/" target="_blank">FatLab, LLC</a> &#124; <?php echo $site_description; ?>. &#124; A Virginia, USA Company  &#124; 888.742.2131 &#124; 703.662.5792 &#124; <?php echo $contact_link ?></p>
						<p class="text-center-mobile"><?php echo $terms_link ?> &#124; <?php echo $privacy_link ?> &#124; <?php echo $policies_link ?> &#124; <?php echo $resources_link ?></p>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
    AOS.init({
    	easing: 'ease-in-out-sine'
    });
</script>

</body>
</html>