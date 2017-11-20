<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->



    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        
    <article class="post md-mrg-top">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

        <p class="post-info"><?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?></p>
        <p class="tag"><?php the_tags( ' ' ); ?></p>

        <?php if( get_the_post_thumbnail() ) : ?>
            <div class="img-container md-mrg-top md-mrg-bottom">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
       
        <p><?php the_content(); ?></p>

        <!-- <?php the_category( ' ' ); ?> -->

    </article>



	<?php endwhile; else: ?>

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

	<?php endif; ?>


    </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'news' ); ?>

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>