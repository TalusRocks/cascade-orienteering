<?php
/*
  Template Name: All Maps Page
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



    <?php
      
      $query = new WP_Query( array(

        'post_type' => 'map',
        'orderby'    => 'title',
        'order'      => 'ASC',
        'nopaging' => 'true',

        ) );

    ?>


    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

      <div class="row lg-mrg-bottom">
        <div class="map-image-sm col-lg-4 col-md-4 col-sm-4">
          <?php the_post_thumbnail('medium'); ?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php the_field('map_location'); ?></p>
            
            <?php if( get_field('permanent_course') ): ?>

              <p><em><?php the_field('permanent_course'); ?></em></p>
              <!-- <a class="red" href="<?php echo get_permalink(518); ?>"> -->

            <?php endif; ?>

        </div>
      </div>

    <?php endwhile; endif; wp_reset_postdata(); ?>




    </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'map' ); ?>

<?php get_footer(); ?>