<div class="col-lg-3 col-md-3 col-sm-3 sidebar md-mrg-top"> <!-- begin sidebar RIGHT -->
    <div class="sidebar-widgets">
	  	
	  	<?php if ( ! dynamic_sidebar( 'results' ) ): ?>

		    <div class="text-center md-mrg-top">
			    
			 

		    <?php if( get_field('routegadget_link_results') ): ?>  
			<h3 class="md-mrg-top">ANALYZE RESULTS</h3><!-- temp fix until "how to read results" is written" -->
				<!-- RouteGadget link, from ACF text field -->
				<p>
				<?php
				$key = 'routegadget_link_results';
				$themeta = get_post_meta($post->ID, $key, TRUE);
				if($themeta == '') {
				echo 'Check back soon for routes';
				}
				else {
					echo '<a class="red" href="';
					echo the_field('routegadget_link_results');
					echo '">RouteGadget';
					echo '</a>';
				}
				?>
				</p>
			<?php endif; ?>
			

		    	
		    <?php if( get_field('winsplits_link_results') ): ?>  
		    
		    	<!-- WinSplits link, from ACF text field -->
		    	<p>
		    	<?php
				$key = 'winsplits_link_results';
				$themeta = get_post_meta($post->ID, $key, TRUE);
				if($themeta == '') {
				echo 'Check back soon for splits';
				} //currently useless, but will use once "how to read results" is written"
				else {
					echo '<a class="red" href="';
					echo the_field('winsplits_link_results');
					echo '">WinSplits';
					echo '</a>';
				}
				?>
				</p>
			<?php endif; ?>



				<!-- Related season standings AND related team or individual results,
				as ACF relationship field -->
				<p>
				<?php if( get_field('related_result_pages') ): ?>
					<h3 class="md-mrg-top">RELATED RESULTS</h3>
		            <?php

		                $posts = get_field('related_result_pages');

		                if( $posts ) {

		                	
		                	foreach( $posts as $post ):
		                		setup_postdata($post);
		                		echo '<p><a class="red" href="' . get_the_permalink() . '">';
		                		echo get_the_title();
		                		echo '</a></p>';
		                	endforeach;

		                	wp_reset_postdata();
		                }
		                
		            ?>
	        	<?php endif; ?>
	            </p>


			</div> <!-- wrapper div -->


	    <?php endif; ?> <!-- belongs to dynamic sidebar -->
	</div><!-- sidebar widgets -->
</div> <!-- col -->