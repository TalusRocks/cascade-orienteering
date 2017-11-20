<?php get_header(); ?>

<div class ="row"> 

  <div class="col-lg-12" id="no-pad"> 
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
            <h3><?php the_field('map_location'); ?>
                <span class="pull-right"><a href="<?php the_field('map_legend');?>">MAP LEGEND</a></span>
            </h3>
            <?php if( get_field('permanent_course') ): ?>
                <h4><em><?php the_field('permanent_course'); ?></em></h4>
                <!-- <a class="red" href="<?php echo get_permalink(518); ?>"> -->
            <?php endif; ?>
        </div>

        
    <div class="row">
        <div class="col-lg-12">
            <?php the_field('map_description'); ?>
        </div>
    </div>


    <!-- begin permanent course box area -->
    <div class="row perm-course sm-mrg-top no-margin">
        <?php

        $perm = get_field('permanent_course_help');

        if ( !empty($perm) ): ?>

            <div class="col-lg-12 some-pad">
                <?php the_field('permanent_course_help'); ?>
            </div>
        <?php endif; ?>
    </div>


    <!-- begin gray box area -->
    <div class="row two-maps add-pad md-mrg-top no-margin">
        <div class="col-lg-6 col-md-6 col-sm-6 map-image-md"><!-- Full Map Preview -->  

            <?php 

            $image = get_field('map_preview');

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>



            <p class="text-center sm-mrg-top">
            <?php 

            $file = get_field('map_pdf');

            if( $file ): ?>
                
                <a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file['filename']; ?>Large map PDF</a>

            <?php endif; ?>
            </p>
            <p class="text-center">
            <?php 

            $file = get_field('control_description');

            if( $file ): ?>
                
                <a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file['filename']; ?>Control Descriptions</a>

            <?php endif; ?>
            </p>


        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 map-image-md"><!-- Zoomed in Map -->
            <?php the_post_thumbnail('full'); ?>
            <p class="sm-mrg-top"><?php the_field('map_disclaimer'); ?></p>
        </div>

    </div><!-- end gray area -->



    <div class="row lg-mrg-top">
        <div class="col-lg-12">
            <?php the_field('describe_ratings');?>
        </div>
    </div>

    <!-- begin green box area -->
    <div class="row venue-rating sm-mrg-top no-margin">
        <div class="col-lg-6">
            <h3>Navigational Challenge Rating: <?php the_field('nav_rating');?></h3>
            <?php the_field('nav_rating_description'); ?>
        </div>
        <div class="col-lg-6">
            <h3>Physical Challenge Rating: <?php the_field('physical_rating');?></h3>
            <?php the_field('physical_rating_description'); ?>
        </div>
    </div>


    <div class="row no-margin" id="no-pad">
        <div class="hidden-lg hidden-md hidden-sm lg-mrg-top">
            <!-- <h3>Turn-by-turn directions:</h3> -->
            <?php the_field('written_directions'); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 lg-mrg-top" id="no-pad">
            <?php the_field('embed_directions'); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs lg-mrg-top more-pad-left">
            <!-- <h3>Turn-by-turn directions:</h3> -->
            <?php the_field('written_directions'); ?>
        </div>
    </div>
    <!-- end green box area -->


    <?php endwhile; endif; ?>


  </div> <!-- close col-12 -->
</div><!-- close opening row -->


<?php get_footer(); ?>