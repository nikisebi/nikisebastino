			<!-- intro section -->
			<section class="slideshow">
				<div class="slideset">
					<?php
					$features = get_field('hs_homepage_rotator');
					if($features) {
						$i = 0;
						foreach($features as $feature) {
						$i++;
					?>
					<div class="slide section-pad">
						<div class="text-block col-sm-8">
							<?php if($feature['hs_rotator_title']):?>
								<h1><?php echo $feature['hs_rotator_title']?></h1>
							<?php endif;?>
							<?php if($feature['hs_rotator_text']):?>
								<p class="text-orange"><?php echo $feature['hs_rotator_text']?></p>
							<?php endif;?>
						</div>
						<div class="col-sm-4 text-center section-pad-top-large">
							<img src="/wp-content/uploads/2017/11/guinness-beach-sq.jpg" alt="website maintenance, support and hosting services">
						</div>
					</div>
					<?php
						}
					}
					?>
				</div>
			</section>