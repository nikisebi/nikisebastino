<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nikisebastino
 */

get_header(); ?>

<div class="container-fluid">
	<div class="container section-pad">
		<div class="row">
			<section class="col-md-9 section-pad-bottom">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() ); ?>
			<div class="sans-serif">
				<?php the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'nikisebastino' ) . '</span><span aria-hidden="true" class="nav-subtitle small upper pull-left section-margin"><i class="fa fa-caret-left" aria-hidden="true"></i> ' . __( 'Previous', 'nikisebastino' ),
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'nikisebastino' ) . '</span><span aria-hidden="true" class="nav-subtitle small upper pull-right section-margin">' . __( 'Next', 'nikisebastino' ) . ' <i class="fa fa-caret-right" aria-hidden="true"></i>' 
				) ); ?>
				<?php endwhile; // End of the loop.
				?>
			</div>
			</section>
			<section class="col-md-3">
				<?php get_sidebar(); ?>
			</section>
		</div>
	</div>
</div>
<?php get_footer();