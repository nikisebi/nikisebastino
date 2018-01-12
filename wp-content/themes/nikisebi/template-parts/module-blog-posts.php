<?php
	if(is_front_page()){
		$title = 'From the Blog';
		$args = array(
			'posts_per_page' => 3
		);
	} elseif(is_page('website-maintenance-services')){
		$title = 'From the Blog';
		$args = array(
			'posts_per_page' => 3,
			'cat' => 37 // pulls from services blog category
		);
	} elseif(is_page('website-maintenance-plans')){
		$title = 'From the Blog';
		$args = array(
			'posts_per_page' => 3,
			'cat' => 38 // pulls from Website Maintenance blog category
		);
	} elseif(is_page('agency-website-support')){
		$title = 'From the Blog';
		$args = array(
			'posts_per_page' => 3,
			'cat' => 39 // pulls from Website Maintenance blog category
		);
	} elseif(is_page('nonprofit-web-support')){
		$title = 'From the Blog';
		$args = array(
			'posts_per_page' => 3,
			'cat' => 40 // pulls from Website Nonprofits blog category
		);
	} elseif(is_page('website-maintenance-company')){
		$title = 'From the Blog';
		$args = array(
			'posts_per_page' => 3,
			'cat' => 3 // pulls from Website Company Stuff blog category
		);
	} else  {
		$title = 'Related Blog Posts';
		$args = array(
			'posts_per_page' => 3
		);
	}

	$my_query = new WP_Query( $args );
	$post_count = $my_query->post_count;
	if($post_count < 1){
		// override title with blank so blogs don't show
		$title = '';
	}
?>
<div class="container-fluid bg-light">
	<div class="container box-padding">
		<div class="row">
			<section class="col-sm-12 text-center">
				<h3><?php echo $title;?></h3>
			</section>
			<div class="blog-posts">
					<?php
					while ( $my_query->have_posts() ) : $my_query->the_post();
					$do_not_duplicate = $post->ID; ?>
					<div class="post-item col-md-4 box-padding">
						<?php //the_post_thumbnail('featured-thumb'); ?>
						<article class="post-content main-border">
							<div class="post-info-container">
								<div class="post-info">
									<h3 class="sans-serif"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								</div>
							</div>
							<div class="hover-container">
								<div class="hover-content">
									<?php excerpt('25'); ?>
								</div>
							</div>
						</article>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>

			</div>
		</div>
	</div>
</div>