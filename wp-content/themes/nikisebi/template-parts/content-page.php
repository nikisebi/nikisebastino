<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nikisebastino
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-fluid">
		<div class="container section-pad-bottom">
			<div class="row">
				<div class="col-sm-12">
					<h1 data-aos="fade-up" data-aos-duration="1000"><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>