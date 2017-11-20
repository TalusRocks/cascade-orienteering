<?php
/*
  Template Name: Newcomers Page
*/
?>

<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->

<!-- <div class ="row"> 

  <div class="col-lg-12" id="no-pad">  -->

    <div class="splash shadow">
        <?php 

        $image = get_field('banner_image');

        if( !empty($image) ): ?>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        <?php endif; ?>
    </div>

    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
        </div>

        <!-- wysiwig content -->
        <?php the_content(); ?>

        <!-- anchor menu -->
        <div class="lg-mrg-bottom">
        <?php

        if( have_rows('info_block') ):

            while ( have_rows('info_block') ) : the_row();

                echo '<h3>';
                echo '<a href="#';
                the_sub_field('block_heading');
                echo '">';
                the_sub_field('block_heading');
                echo '</a>';
                echo '</h3>';


            endwhile;

        else :

            // no rows found

        endif;

        ?>
        </div>
        

        <!-- repeating fields -->


        <?php

        if( have_rows('info_block') ):

            while ( have_rows('info_block') ) : the_row();

                // sub-heading
                echo '<div class="md-mrg-top">';
                echo '<a name="';
                the_sub_field('block_heading');
                echo '">';
                echo '<h3>';
                the_sub_field('block_heading');
                echo '</h3>';
                echo '</a>';

                // text content
                the_sub_field('block_content');
                echo '</div>';

            endwhile;

        else :

            // no rows found

        endif;

        ?>



	<?php endwhile; else: ?> <!-- end main loop -->

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

	<?php endif; ?>




        </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->

<?php get_sidebar( 'newcomers' ); ?>

</div> <!-- close content LEFT row -->




<!--   </div>  --><!-- close col-12 -->

<!-- </div> --><!-- close opening row -->

<?php get_footer(); ?>