<?php get_header(); ?>

<div class ="row"> 

  <div class="col-lg-12" id="no-pad"> 



    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="col-lg-7 col-md-7 col-sm-8 md-mrg-top">
        <h1>Contact <?php the_title(); ?></h1>
        <h4 class="md-mrg-bottom"><?php the_field('club_role'); ?></h4>
        <?php the_content(); ?>

    </div>
        
    <div class="col-lg-5 col-md-5 col-sm-4 md-mrg-bottom">
       
        <?php if( get_the_post_thumbnail() ) : ?>
            <div class="img-container contact-img md-mrg-top">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

    </div>
   


    




	<?php endwhile; else: ?>

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

	<?php endif; ?>

  </div> <!-- close col-12 -->

</div><!-- close opening row -->

<?php get_footer(); ?>