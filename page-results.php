<?php
/*
	Template Name: All Results
*/
?>


<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
        </div>

        <?php the_content(); ?>

	<?php endwhile; endif; ?>


<div>
	<table class="table table-striped">
	    <tr id="column-titles">
	       <th>DATE</th>
	       <th>RESULTS</th>
	       <th>SPLITS</th>
	       <th>ROUTES</th>
	      
	    </tr>

		<?php
		
		$query = new WP_Query( array(

			'post_type' => 'result',
			'posts_per_page' => 100,
		    //'paged'          => $paged,
			'meta_key'   => 'event_date_results',
			'orderby'    => array( 'meta_value_num' => 'DESC', 'post_date' => 'DESC'),
			//'order'      => 'DESC',
			'meta_value'	=> date('Ymd'),
			'meta_compare'	=> '<=',
			'date_query'	=> array(
				array(
						'key' => 'date',
						'value' => date('Ymd'),
						'compare' => '<', //less than
						'type' => 'DATETIME'
					)
				),

			) );

		?>

		<tr class="event">
		
	   	    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>


	   	    <!-- DATE -->
				<td class="date">
					<?php if( get_field('event_date_results') ): ?>
						<?php $date = DateTime::createFromFormat('Ymd', get_field('event_date_results')); echo $date->format('M j, Y');?>
					<?php endif; ?>
					
				</td>


			<!-- RESULTS PAGE -->
				<td class="event-name">
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</td>

	   	    
	   	    <!-- SPLITS -->
				<td class="splits">
					<?php if( get_field('winsplits_link_results') ): ?>
						<a href="<?php the_field('winsplits_link_results'); ?>">WinSplits</a>
					<?php endif; ?>
					
				</td>


			<!-- ROUTES -->
				<td class="routegadget">
					<?php if( get_field('routegadget_link_results') ): ?>
						<a href="<?php the_field('routegadget_link_results'); ?>">Routegadget</a>
					<?php endif; ?>
					
				</td>

		</tr>

		    <?php endwhile; ?>
		</table>

<!-- pagination will go here -->

<?php wp_pagenavi(); ?>
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

			<?php endif; wp_reset_postdata(); ?>
  			   	
</div><!-- close table div -->

<p><a href="http://classic.cascadeoc.org/results-list">Results 2009-2016</a></p>
<p><a href="http://www.old.cascadeoc.org/">Results 2000-2009</a></p>


	</div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'allresults' ); ?>

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>