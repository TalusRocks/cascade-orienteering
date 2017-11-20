<?php
/*
	Template Name: All Events Page
*/
?>


<?php get_header(); ?>

<div class ="row"> 

  <div class="col-lg-12" id="no-pad"> 
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


    	<div class="series text-center sm-mrg-top sm-mrg-bottom">
        	<p><a href="<?php echo get_permalink(253); ?>" class="red">Winter Series</a></p>
        	<p> | </p>
        	<p><a href="<?php echo get_permalink(256); ?>" class="red">School League (WIOL)</a></p>
        	<p> | </p>
        	<p><a href="<?php echo get_permalink(254); ?>" class="red">Ultimate Orienteer</a></p>
        	<p> | </p>
        	<p><a href="<?php echo get_permalink(255); ?>" class="red">Wednesday Evening</a></p>
        	<p> | </p>
        	<p><a href="<?php echo get_permalink(252); ?>" class="red">Choose Your Adventure</a></p>
        </div> 


        <div class="page-header no-margin">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
            <p class="xs-mrg-top"><a href="<?php echo get_permalink(1225); ?>">Add CascadeOC events to your calendar</a></p>
        </div>



        <?php the_content(); ?>

	<?php endwhile; endif; ?>


<div>
	<table class="table table-striped">
	    <tr id="column-titles">
	       <th>DATE</th>
	       <th>EVENT PAGE</th>
	       <th class="hidden-xs">TERRAIN</th>
	       <th class="hidden-xs">ORIENTEERING MAP</th>
	       <th>DIRECTIONS</th>
	       <th>HOST</th>
	    </tr>

		<?php

		
		$query = new WP_Query( array(

			'post_type' => 'event',
			'nopaging' => 'true',
			'meta_key'   => 'event_date',
			'orderby'    => 'meta_value_num',
			'order'      => 'ASC',
			'meta_value'	=> date('Ymd'),
			'meta_compare'	=> '>=',
			'date_query'	=> array(
				array(
						'key' => 'date',
						'value' => date('Ymd'),
						'compare' => '>=', //Greater than
						'type' => 'DATETIME'
					)
				),

			) );

		?>


		<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
			    <tr class="event"> 

			    	<!-- DATE (required) -->
				   	<td class="date"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('D, M j');?>	

				   	<?php if( get_field('until_date') ): ?>
				   		<p id="until-date"> - <?php $date = DateTime::createFromFormat('Ymd', get_field('until_date')); echo $date->format('D, M j');?></p> 	 
				   	<?php endif; ?>
				   </td>

				   	<!-- EVENT PAGE LINK -->
				   	<td class="event-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></td>
				   	

				   	<!-- TERRAIN TYPE -->
				   	<td class="terrain hidden-xs"><?php the_field('terrain'); ?></td>

				   	<!-- MAP PAGE LINK -->
					<?php
					$posts = get_field('map_link');

					if( $posts ): ?>

						<?php foreach( $posts as $p ): ?>
							<?php setup_postdata($post); ?>
								<td class="map-name hidden-xs"><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></td>

						<?php endforeach; ?>

						<?php else: ?>
						<td class="map-name hidden-xs"> – </td>

					<?php endif; ?>

					<!-- DIRECTIONS -->
		  	  		<?php 
		            $directions_link = get_field('directions_link');
		            $directions_name = get_field('location');

		            if( $directions_link != '' ){ ?>

		            <td class="event-location">
		               <a href="<?php echo $directions_link; ?>" 
		               target="_blank" 
		               title="<?php echo $directions_name; ?>"><?php echo $directions_name; ?></a>
		            </td>

		            <?php } else { ?>

		            <td><?php echo $directions_name; ?></td>

		            <?php } ?>

		  	  		<!-- HOST -->
			  		<td class="club-host-name"><?php the_field('host'); ?></td>
			   	
				</tr>
		<?php endwhile; endif; wp_reset_postdata(); ?>

	</table>
</div>


	<div class="col-lg-12" id="no-pad">
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'series-only' ) ); ?>
		</div>


		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'special-only' ) ); ?>
		</div>

		<div class="training-list col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'regional-only' ) ); ?>
		</div>

		<div class="world-list col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'world-only' ) ); ?>
		</div>

	</div>





  </div> <!-- close col-12 -->

</div><!-- close opening row -->

<?php get_footer(); ?>