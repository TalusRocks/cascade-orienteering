<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs sidebar md-mrg-top"> <!-- begin sidebar RIGHT -->
    <div class="sidebar-widgets">
	  	<?php if ( ! dynamic_sidebar( 'news' ) ): ?>
	  	<?php endif; ?>

		<h3 class="md-mrg-top text-center">TOPICS</h3>

	  	<?php 
		  	$args = array (
		  	'taxonomy'					=> 'post_tag',
		  	'smallest'                  => 1, 
			'largest'                   => 1,
			'unit'                      => 'em', 
			'number'                    => 0,  
			'format'                    => 'list',
			'separator'                 => "\n",
			'orderby'                   => 'name', 
			'order'                     => 'ASC',
			'exclude'                   => null,
			//28, 29, 30, 31, 32,
			// excluding Map tags: Central Washington, Seattle, Eastside, North, South 
			'include'                   => null, 
			'topic_count_text_callback' => default_topic_count_text,
			'link'                      => 'view', 
			'taxonomy'                  => 'post_tag', 
			'echo'                      => true,
			);

			wp_tag_cloud( $args );
		?>

	    
	</div>
</div> <!-- close sidebar right -->