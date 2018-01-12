<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nikisebastino
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php get_template_part('favicon');?>

<?php wp_head(); ?>
<!-- luckyorange -->
<?php if(is_page()) { echo '
<script>
	window.__wtw_lucky_show_chat_box = true; // Show Lucky Orange chat
</script>';
}
?>
<script type='text/javascript'>
window.__lo_site_id = 3590;

	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
</script>
<!-- luckyorange -->

</head>
<body <?php body_class(); ?>>
	<div id="page">
		<div class="container">
			<div class="row text-center box-padding">
				<a class="branding" href="<?php echo get_option('home'); ?>/">
					<h2 class="sr-only"><?php get_bloginfo( 'name' ); ?></h2>
					<img class="logo" src="<?php bloginfo('template_directory'); ?>/assets/images/fatlab-logo-web-support.png" width="150px" alt="managed wordpress hosting by fatlab, llc"/>
				</a>
			</div>
			<div class="col-sm-12">
				<div id="wrapper" class="">
				    <div class="overlay" style="display: none;"></div>
				    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '<ul class="nav sidebar-nav">%3$s</ul>') ); ?>
				    </nav>
				    <div id="page-content-wrapper">
				        <button type="button" class="hamburger animated fadeInRight is-closed" data-toggle="offcanvas">
				            <span class="hamb-top"></span>
				            <span class="hamb-middle"></span>
				            <span class="hamb-bottom"></span>
				        </button>
				    </div>
				</div>
			</div>
		</div>
		<div id="content" class="site-content">
