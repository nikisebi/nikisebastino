<?php
/**
 * Template Name: Blog
 *
 * @package nikisebastino
 */

get_header(); ?>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 data-aos="fade-up" data-aos-duration="1000"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container blog-posts">
		<div class="row">
			<?php $args = array('posts_per_page' => 24, 'paged' => get_query_var('paged') ); ?>
			<?php $query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post();
			$do_not_duplicate = $post->ID; ?>
				<section class="col-md-4 col-sm-6 section-padding">
					<?php //the_post_thumbnail('featured-thumb'); ?>
					<h4 class="sans-serif"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					<p><?php excerpt('30'); ?></p>
				</section>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
	<div class="text-center section-pad sans-serif">
		<?php wp_pagenavi( array( 'query' => $query ) ); ?>
	</div>
</div>

<?php get_footer(); ?>
